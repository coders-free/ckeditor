<x-app-layout>

    <link rel="stylesheet" href="{{asset('vendor/prismjs/prism.css')}}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Artículos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <figure>
                <img src="{{$post->image}}" alt="" class="w-full aspect-[16/9]">
            </figure>

            <div class="mt-6">
                <h1 class="text-4xl font-semibold">
                    {{$post->title}}
                </h1>
            </div>

            <div class="mt-4">
                {!!$post->body!!}
            </div>

        </div>
    </div>

    <script src="{{asset('vendor/prismjs/prism.js')}}"></script>
</x-app-layout>