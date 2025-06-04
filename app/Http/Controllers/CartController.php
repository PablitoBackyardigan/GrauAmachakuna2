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
        if (Auth::check()) {
            $cartItems = Auth::user()->cartItems()->with('producto')->get();
        } else {
            $sessionCart = session()->get('cart', []);
            $cartItems = collect();

            foreach ($sessionCart as $productoId => $item) {
                $producto = Producto::find($productoId);
                if ($producto) {
                    $cartItems->push((object)[
                        'id' => $productoId,
                        'producto' => $producto,
                        'cantidad' => $item['cantidad'] ?? 1 // Por si no existe la clave
                    ]);
                }
            }

        }

        return view('shopcart', compact('cartItems'));
    }

    public function addToCart(Request $request, $productoId)
    {
        $cantidad = max(1, intval($request->input('cantidad', 1)));
        $producto = Producto::findOrFail($productoId);

        if (Auth::check()) {
            $cartItem = CartItem::where('user_id', Auth::id())
                                ->where('producto_id', $productoId)
                                ->first();

            if ($cartItem) {
                $cartItem->cantidad += $cantidad;
                $cartItem->save();
            } else {
                CartItem::create([
                    'user_id' => Auth::id(),
                    'producto_id' => $productoId,
                    'cantidad' => $cantidad
                ]);
            }
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$productoId])) {
                $cart[$productoId]['cantidad'] += $cantidad;
            } else {
                $cart[$productoId] = [
                    'name' => $producto->name,
                    'description' => $producto->description,
                    'price' => $producto->price,
                    'file_uri' => $producto->file_uri,
                    'cantidad' => $cantidad
                ];
            }
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito');
    }

    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            $cartItem = CartItem::findOrFail($id);

            if ($cartItem->user_id !== Auth::id()) {
                abort(403); // Prohibido
            }

            if ($request->action == 'increase') {
                $cartItem->cantidad += 1;
            } elseif ($request->action == 'decrease' && $cartItem->cantidad > 1) {
                $cartItem->cantidad -= 1;
            }

            $cartItem->save();

        } else {
            // Usuario no autenticado → trabajar con sesión
            $cart = session()->get('cart', []);

            if (!isset($cart[$id])) {
                return redirect()->back()->with('error', 'Producto no encontrado en el carrito');
            }

            if ($request->action == 'increase') {
                $cart[$id]['cantidad'] += 1;
            } elseif ($request->action == 'decrease' && $cart[$id]['cantidad'] > 1) {
                $cart[$id]['cantidad'] -= 1;
            }

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cantidad actualizada');
    }


    public function removeFromCart($id)
    {
        if (Auth::check()) {
            $cartItem = CartItem::findOrFail($id);

            if ($cartItem->user_id !== Auth::id()) {
                abort(403); // Prohibido
            }

            $cartItem->delete();

        } else {
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito');
    }

}
