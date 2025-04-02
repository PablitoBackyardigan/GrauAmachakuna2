<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        // Traemos los cartItems con los productos específicos que necesitas
        $cartItems = Auth::user()->cartItems()
                                ->with('producto:id,name,description,category,price,file_uri')  // Traemos solo los campos que necesitas
                                ->get();

        return view('shopcart', compact('cartItems'));
    }


    public function addToCart(Request $request, $productoId)
    {
        $producto = Producto::findOrFail($productoId);
        
        // Obtener la cantidad del formulario, con valor por defecto 1 si no se proporciona
        $cantidad = $request->input('cantidad', 1);
        
        // Convertir a entero para asegurar que sea un número válido
        $cantidad = max(1, intval($cantidad));
        
        $cartItem = CartItem::where('user_id', Auth::id())
                            ->where('producto_id', $productoId)
                            ->first();
    
        if ($cartItem) {
            // Incrementar por la cantidad seleccionada en lugar de solo 1
            $cartItem->cantidad += $cantidad;
            $cartItem->save();
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'producto_id' => $productoId,
                'cantidad' => $cantidad // Usar la cantidad seleccionada
            ]);
        }
    
        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito');
    }

    public function update(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        
        if ($request->action == 'increase') {
            $cartItem->cantidad += 1;
        } else if ($request->action == 'decrease' && $cartItem->cantidad > 1) {
            $cartItem->cantidad -= 1;
        }
        
        $cartItem->save();
        
        return redirect()->back()->with('success', 'Cantidad actualizada');
    }

    public function removeFromCart($id)
    {
        $cartItem = CartItem::findOrFail($id);
        
        if ($cartItem->user_id === Auth::id()) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito');
    }
}
