<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar post <i>"{{$post->title}}"</i>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <form action="{{route('admin.posts.update', $post)}}" method="POST" class="bg-white rounded-lg shadow">

                @csrf
                @method('PUT')

                <div class="px-6 py-8">

                    <div class="mb-4">
                        <x-jet-label>
                            Título
                        </x-jet-label>

                        <x-jet-input class="block mt-1 w-full" type="text" name="title" value="{{old('title', $post->title)}}" />
                    </div>

                    <div class="mb-4">
                        <x-jet-label>
                            Contenido
                        </x-jet-label>

                        <textarea id="editor" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="body">{{old('body', $post->body)}}</textarea>
                    </div>

                    <div class="flex justify-end">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Crear artículo
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>

    @push('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    @endpush

</x-app-layout>