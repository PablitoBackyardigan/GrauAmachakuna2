@push('styles')
    @vite(['resources/css/createProduct.css'])
@endpush

<h2 class="form-title"> Agregar Reseña </h2>

<form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="formCrearProducto">
    @csrf

    <div class="form-row">
      <!-- Columna izquierda -->
      <div class="form-column">
        <div class="form-group">
          <input type="text" name="name" class="form-control" placeholder="Nombre" autocomplete="off">
        </div>
        
        <div class="form-group">
          <textarea name="description" class="form-control" placeholder="Descripción" rows="5"></textarea>
        </div>
        
        <div class="form-group">
          <div class="input-container">
            <span class="currency">S/</span>
            <input type="number" name="price" class="form-control price-input" placeholder="Precio" autocomplete="off">
          </div>
        </div>
      </div>
      
    </div>
    
    <button type="submit" class="btn submit-btn">Enviar Formulario</button>
</form>
