@push('styles')
    @vite(['resources/css/createOpinion.css'])
@endpush

<h2 class="form-title"> Agregar Reseña </h2>

<form action="{{ route('opiniones.store') }}" method="POST" enctype="multipart/form-data" class="formCrearOpinion">
    @csrf

    <div class="formCrearOpinion-Container">
      <div class="form-group">
        <textarea name="opiniontext" class="form-control" placeholder="Descripción" rows="5"></textarea>
      </div>
      
      <div class="form-group">
          <div class="rating">
            <input type="radio" id="star5" name="estrellas" value="5" /><label for="star5" title="5 estrellas"></label>
            <input type="radio" id="star4" name="estrellas" value="4" /><label for="star4" title="4 estrellas"></label>
            <input type="radio" id="star3" name="estrellas" value="3" /><label for="star3" title="3 estrellas"></label>
            <input type="radio" id="star2" name="estrellas" value="2" /><label for="star2" title="2 estrellas"></label>
            <input type="radio" id="star1" name="estrellas" value="1" /><label for="star1" title="1 estrella"></label>
          </div>
      </div>
      
      <div class="form-group">
        <button type="submit" class="btn submit-btn">Enviar Formulario</button>
      </div>
      

    </div>

</form>
