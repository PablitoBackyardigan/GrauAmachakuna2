@extends('layouts.plantilla')

@section('title', $producto->name)

@section('titulo', 'PRODUCTOS')

@push('styles')
    @vite(['resources/css/showProduct.css', 'resources/css/createProduct.css'])
@endpush

@section('content')

    <section class="filters">
        <!-- Botón para abrir el modal -->
        @can('productos.edit')
            <button class="btn" id="openModal" data-producto-id="{{ $producto->id }}">Editar Producto</button>
        @endcan

        <!-- Modal vacía donde cargaremos el formulario -->
        <div id="modalCrearProducto" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div id="modalBody"></div> <!-- Se llenará con el formulario de edición -->
            </div>
        </div>        
    </section>

    <a href="{{ Route('productos.index') }}">Volver a productos</a>

    <section class="contenido">
        <div class="producto-container">
            <!-- Contenedor de imágenes -->
            <div class="imagenes-producto">
                <div class="imagen-principal">
                    <img src="{{ asset($producto->file_uri) }}">
                </div>
            </div>
    
            <!-- Descripción del producto -->
            <div class="descripcion-producto">
                <h1 class="titulo-producto">{{ $producto->name }}</h1>
                <p class="marca">Marca: Dulces Delicias</p>
                <p class="precio">S/{{ $producto->price }}</p>
                <p>{{ $producto->description }}</p>
    
                <!-- Selector de cantidad -->
                <div class="cantidad-container">
                    <button>-</button>
                    <input type="number" value="1" min="1">
                    <button>+</button>
                </div>
    
                <!-- Botón Agregar al Carrito -->
                <button class="boton-agregar">Agregar al Carrito</button>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("modalCrearProducto");
            const closeModal = document.querySelector(".close");
            const btnOpenModal = document.getElementById("openModal");
        
            // Asegurarse de que el modal esté inicialmente oculto
            modal.classList.remove("show");
        
            // Verificar si el botón de abrir el modal existe
            if (!btnOpenModal) return;
        
            // Abrir el modal cuando el botón es presionado
            btnOpenModal.addEventListener("click", function (event) {
                event.preventDefault();
                sessionStorage.setItem("modalAbierto", "true");
                modal.classList.add("show");
        
                // Obtener el ID del producto desde el atributo data-producto-id
                const productoId = btnOpenModal.getAttribute("data-producto-id");
        
                // Solicitar el formulario de edición para ese producto
                fetch(`public/productos/${productoId}/edit`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`Error: ${response.statusText}`);
                        }
                        return response.text(); // Obtener el contenido como HTML
                    })
                    .then(html => {
                        console.log(html); // Verifica el HTML que se está recibiendo
                        document.getElementById("modalBody").innerHTML = html; // Inyectar en el modal
                        
                        // Ahora, una vez que el formulario está cargado, aplicar los eventos
                        const fileInput = document.querySelector("#fileInput"); // Cambié de .fileInput a #fileInput
                        const btnSelectFile = document.querySelector(".btnSelectFile");
                        const previewContainer = document.querySelector(".preview-container");

                        if (fileInput && btnSelectFile && previewContainer) {
                            btnSelectFile.addEventListener("click", function () {
                                console.log("Botón presionado, abriendo el selector de archivos...");
                                fileInput.click(); // Abre el selector de archivos
                            });

                            fileInput.addEventListener("change", function () {
                                console.log("Archivo seleccionado:", fileInput.files);

                                if (!fileInput.files || fileInput.files.length === 0) {
                                    console.log("No se seleccionó ningún archivo.");
                                    return;
                                }

                                const file = fileInput.files[0]; // Obtiene el archivo seleccionado
                                const reader = new FileReader(); // Usamos FileReader para leer el archivo

                                reader.onload = function (e) {
                                    console.log("Imagen cargada con éxito.");
                                    previewContainer.innerHTML = ''; // Limpiar contenedor de vista previa
                                    const previewImage = document.createElement("img");
                                    previewImage.id = "previewImage";
                                    previewImage.style.maxWidth = "350px";
                                    previewImage.style.borderRadius = "10px";
                                    previewImage.style.display = "block";
                                    previewImage.src = e.target.result; // Asignamos el resultado de la carga de la imagen
                                    previewContainer.appendChild(previewImage); // Agregamos la imagen al contenedor
                                };

                                reader.readAsDataURL(file); // Leemos el archivo como una URL de datos
                            });
                        }
                    })
                    .catch(error => {
                        console.log('Error al cargar el formulario:', error);
                    });
            });
        
            // Cerrar el modal cuando el usuario hace clic en la X
            closeModal.addEventListener("click", function () {
                modal.classList.remove("show");
                sessionStorage.removeItem("modalAbierto");
            });
        
            // Cerrar el modal si el usuario hace clic fuera del modal
            window.addEventListener("click", function (event) {
                if (event.target === modal) {
                    modal.classList.remove("show");
                    sessionStorage.removeItem("modalAbierto");
                }
            });
        });
    </script>

@endsection
