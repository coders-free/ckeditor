<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="https://www.google.com/recaptcha/api.js?render=6Le-BUEhAAAAAAgSGFVzuDNL9EcxA4B9xywe006P"></script>

        <script>
            document.addEventListener('submit', function(e){
                e.preventDefault();
                grecaptcha.ready(function() {
                    grecaptcha.execute('6Le-BUEhAAAAAAgSGFVzuDNL9EcxA4B9xywe006P', {action: 'submit'}).then(function(token) {
                        
                        let form = e.target;

                        let input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'g-recaptcha-response';
                        input.value = token;

                        form.appendChild(input);

                        form.submit();

                    });
                });
            });
        </script>
    </head>
    <body class="font-sans antialiased text-gray-700">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @stack('js')

        @livewireScripts
    </body>
</html>
