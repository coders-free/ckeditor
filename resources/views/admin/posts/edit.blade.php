<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar post <i>"{{ $post->title }}"</i>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <form action="{{ route('admin.posts.update', $post) }}" method="POST">

                @csrf
                @method('PUT')

                <figure>
                    <img id="imgPreview" class="aspect-[16/9] w-full object-cover object-center" src="{{ $post->image }}"
                        alt="">
                </figure>

                <div class="bg-white rounded-lg shadow">

                    <div class="px-6 py-8">

                        <x-jet-validation-errors class="mb-4" />

                        <div class="mb-4">

                            <x-jet-label>
                                Imagen
                            </x-jet-label>

                            <input onchange="previewImage(event, '#imgPreview')" type="file" accept="image">
                        </div>

                        <div class="mb-4">
                            <x-jet-label>
                                Título
                            </x-jet-label>

                            <x-jet-input class="block mt-1 w-full" type="text" name="title"
                                value="{{ old('title', $post->title) }}" />
                        </div>

                        <div class="mb-4">
                            <x-jet-label>
                                Contenido
                            </x-jet-label>

                            <textarea id="editor"
                                class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                name="body">{{ old('body', $post->body) }}</textarea>
                        </div>

                        <div class="flex justify-end">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Actualizar artículo
                            </button>
                        </div>
                    </div>

                </div>

            </form>

        </div>
    </div>

    @push('js')
        <script src="{{ asset('vendor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    simpleUpload: {
                        // The URL that the images are uploaded to.
                        uploadUrl: "{{ route('image.upload') }}",
                    }
                })
                .catch(error => {
                    console.error(error);
                });

            function previewImage(event, querySelector) {

                //Recuperamos el input que desencadeno la acción
                const input = event.target;

                //Recuperamos la etiqueta img donde cargaremos la imagen
                $imgPreview = document.querySelector(querySelector);

                // Verificamos si existe una imagen seleccionada
                if (!input.files.length) return

                //Recuperamos el archivo subido
                file = input.files[0];

                //Creamos la url
                objectURL = URL.createObjectURL(file);

                //Modificamos el atributo src de la etiqueta img
                $imgPreview.src = objectURL;

            }
        </script>
    @endpush

</x-app-layout>
