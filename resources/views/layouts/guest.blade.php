<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
        <link rel="mask-icon" href="{{ asset('images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">

        <title>{{ config('app.name', 'Installs Direct') }}</title>

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
        

        <!-- Scripts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/form-validate.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.0/build/js/intlTelInput.js"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
    @include('elements.partials.header')
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-20 pb-20 mx-2">
            <!-- <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div> -->

            <div class="w-full sm:max-w-lg  lg:px-10 px-6 lg:py-12 py-6 md:border  bg-gray-color overflow-hidden rounded-xl md:mt-20 mt-10">
                {{ $slot }}
            </div>
        </div>
        @include('elements.partials.footer')

       

        
    </body>
</html>
