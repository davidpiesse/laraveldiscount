<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
</head>
<body class="bg-white font-sans font-normal antialiased">
    <div class="flex flex-col">
        <div class="min-h-screen flex items-center justify-center">
            <div class="flex flex-col justify-around h-full items-center">
                <h1 class="text-grey-darker text-center font-thin tracking-wide text-5xl mb-6">
                    Laravel Discount
                </h1>
                @php
                    $message = "Hi X"; 
                @endphp
                
                <my-alert type="error" message="{{ $message }}" />
            </div>
        </div>
    </div>
</body>
</html>
