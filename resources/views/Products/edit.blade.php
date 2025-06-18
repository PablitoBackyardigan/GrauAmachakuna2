<h2 class="form-title"> Editar {{$producto->name}} </h2>

<form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data" class="formCrearProducto">
    @csrf
    @method('PUT')

    <div class="form-row">
        <!-- Columna izquierda -->
        <div class="form-column">
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ old('name', $producto->name) }}" placeholder="Nombre" autocomplete="off" required minlength="3" maxlength="100">
            </div>

            <div class="form-group">
                <textarea name="description" class="form-control" placeholder="Descripción" rows="5" required minlength="10" maxlength="1000">{{ old('description', $producto->description) }}</textarea>
            </div>      

        </div>

        <!-- Columna derecha -->
        <div class="form-column">
            <div class="file-upload">
                <svg class="upload-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke="#20c997" stroke-width="2" fill="none"/>
                    <line x1="12" y1="8" x2="12" y2="16" stroke="#20c997" stroke-width="2"/>
                    <line x1="8" y1="12" x2="16" y2="12" stroke="#20c997" stroke-width="2"/>
                </svg>
                <p class="upload-text">Subir imagen</p>
                <input type="file" id="fileInput" class="fileInput" name="productImage" accept=".png, .jpg, .jpeg, .webp, .svg" style="display:none;">
                <button type="button" class="btn btn-light btnSelectFile">
                    Seleccionar archivo .jpg, .jpeg, .png
                </button>
                <div class="preview-container"></div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn submit-btn">Enviar Formulario</button>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const fileInput = document.querySelector(".fileInput");
        const btnSelectFile = document.querySelector(".btnSelectFile");
        const previewContainer = document.querySelector(".preview-container");

        if (!fileInput || !btnSelectFile) return;

        btnSelectFile.addEventListener("click", function () {
            fileInput.value = ""; 
            fileInput.click();
        });

        fileInput.addEventListener("change", function () {
            if (!fileInput.files || fileInput.files.length === 0) return;

            const file = fileInput.files[0];
            const reader = new FileReader();
            reader.onload = function (e) {
                previewContainer.innerHTML = ''; 
                const previewImage = document.createElement("img");
                previewImage.id = "previewImage";
                previewImage.style.maxWidth = "350px";
                previewImage.style.borderRadius = "10px";
                previewImage.style.display = "block";
                previewImage.src = e.target.result;
                previewContainer.appendChild(previewImage);
            };
            reader.readAsDataURL(file);
        });
    });
</script>