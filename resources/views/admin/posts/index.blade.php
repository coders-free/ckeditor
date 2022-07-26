<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Artículos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            

            <div class="flex justify-end mb-6">
                <a href="{{route('admin.posts.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear post</a>
            </div>

            <div class="space-y-6">
                @foreach ($posts as $post)
                    
                    <div class="grid grid-cols-2 gap-6">

                        <figure>
                            <img class="aspect-[16/9]" src="{{$post->image}}" alt="">
                        </figure>

                        <div>
                            <a href="{{route('admin.posts.edit', $post)}}">
                                <h1 class="text-2xl font-semibold">
                                    {{$post->title}}
                                </h1>

                            </a>

                            <div class="mb-4">
                                {{Str::limit(strip_tags($post->body), 100)}}
                            </div>

                            <a href="{{route('admin.posts.edit', $post)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Editar
                            </a>
                        </div>

                    </div>

                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>