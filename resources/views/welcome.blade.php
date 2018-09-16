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
</head>
<body class="bg-white font-sans font-normal antialiased">
    <div class="flex flex-col">
        <div class="min-h-screen flex items-center justify-center">
            <div class="flex flex-col justify-around h-full items-center">
                <h1 class="text-grey-darker text-center font-thin tracking-wide text-5xl mb-6">
                    Laravel Discount
                </h1>
                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 512 512" class="fill-current text-grey-darker w-32" >
                    <path d="M209.4 185.96A20.63 20.63 0 0 0 196.33 212a20.64 20.64 0 0 0 26.05 13.06 20.63 20.63 0 0 0 13.06-26.04 20.63 20.63 0 0 0-26.04-13.06zm9.83 29.61a10.61 10.61 0 1 1-3.35-20.66 10.62 10.62 0 0 1 3.35 20.66z"/>
                    <path d="M301.76 228.7a20.63 20.63 0 0 0-26.05-13.05 20.63 20.63 0 0 0-12.34 27.88h-20.76l35.89-71.55-8.94-4.48-38.14 76.03h-52.96v10h160.33v-10h-37.73c2.01-4.54 2.37-9.79.7-14.82zm-29.62 9.84a10.62 10.62 0 0 1 20.13-6.69 10.54 10.54 0 0 1-3.52 11.69h-13.08c-1.63-1.28-2.87-3.01-3.53-5zM237 369.92l-7.08-7.07 77.37-77.37 7.07 7.07zM244.38 284.07a20.63 20.63 0 0 0-20.6 20.6c0 11.37 9.23 20.61 20.6 20.61s20.6-9.24 20.6-20.6c0-11.36-9.25-20.6-20.6-20.6zm0 31.2a10.62 10.62 0 0 1 0-21.2 10.61 10.61 0 0 1 0 21.2zM277.36 353.74c0 11.36 9.24 20.6 20.6 20.6s20.6-9.24 20.6-20.6c0-11.36-9.23-20.6-20.6-20.6s-20.6 9.24-20.6 20.6zm31.2 0a10.61 10.61 0 0 1-21.2 0 10.61 10.61 0 0 1 21.2 0z"/>
                    <path d="M70.06 253.53h44.33c11.48 0 20.82 12.17 20.82 27.13h10c0-14.96 9.34-27.13 20.83-27.13v-10c-11.49 0-20.83-12.17-20.83-27.13h-10c0 14.96-9.34 27.13-20.82 27.13H60.06v45.85l-25.72-77.5 42.07-13.96-3.15-9.5-51.56 17.11 38.36 115.6v93.72H338.8v-10H70.06V253.53zm70.15-16.9a34.45 34.45 0 0 0 10.4 11.9 34.46 34.46 0 0 0-10.4 11.9 34.46 34.46 0 0 0-10.4-11.9 34.45 34.45 0 0 0 10.4-11.9zM370.01 404.86h26.94v10h-26.94zM485.3 297.02h5v-53.49H370.01v10h110.3v33.79a41.62 41.62 0 0 0-36.57 41.27c0 21.23 16 38.8 36.56 41.27v35h-19.04c-11.48 0-20.83-12.18-20.83-27.14h-10c0 14.96-9.34 27.13-20.82 27.13v10c11.48 0 20.82 12.18 20.82 27.13h10c0-14.94 9.33-27.1 20.8-27.12h29.07v-54.7h-5a31.6 31.6 0 0 1-31.56-31.58 31.6 31.6 0 0 1 31.56-31.56zm-49.87 124.73a34.47 34.47 0 0 0-10.4-11.9 34.44 34.44 0 0 0 10.4-11.9 34.46 34.46 0 0 0 10.4 11.9 34.46 34.46 0 0 0-10.4 11.9zM349.12 378.53h10v11h-10zM349.12 312.53h10v11h-10zM349.12 334.53h10v11h-10zM349.12 400.53h10v11h-10zM349.12 356.53h10v11h-10zM349.12 246.53h10v11h-10zM349.12 268.53h10v11h-10zM349.12 290.53h10v11h-10z"/>
                    <path d="M386.69 344.24h10v19.9h-10zM386.69 290.64h10v43.6h-10zM404.61 290.64h10v73.5h-10zM111.46 297.85h88.91v10h-88.91zM89.78 297.85h11.68v10H89.78zM89.78 352.99h77.41v10H89.78zM185.03 325.42h15.34v10h-15.34zM89.78 325.42h87.35v10H89.78zM286.26 117.75l3.15 9.5-152.17 50.48-3.15-9.5zM423.7 82.66l10.64 32.06a41.25 41.25 0 0 0-19.4 18.96 41.29 41.29 0 0 0-2.3 31.72 41.31 41.31 0 0 0 20.8 24.07 41.26 41.26 0 0 0 26.9 3.6l12.6 37.95 9.49-3.15-15.65-47.16-4.75 1.57a31.35 31.35 0 0 1-24.1-1.75 31.37 31.37 0 0 1-15.8-18.28c-2.66-8-2.04-16.55 1.74-24.09s10.27-13.15 18.27-15.8l4.75-1.58L430.04 70l-114.17 37.9 3.15 9.49L423.7 82.66zM316.87 145.51l-9.5 3.15-3.46-10.44 9.5-3.15zM335.1 232.17l-3.47-10.44 9.49-3.15 3.46 10.44zM306.48 114.18l3.47 10.44-9.5 3.15-3.46-10.44zM334.2 197.7l3.46 10.44-9.49 3.15-3.46-10.44zM314.33 169.54l-3.47-10.44 9.5-3.15 3.46 10.44zM327.28 176.82l3.46 10.44-9.49 3.15-3.46-10.44zM362.56 198.52l9.5-3.15 6.26 18.89-9.5 3.15zM345.68 147.64l9.49-3.15 13.73 41.38-9.5 3.15z"/>
                    <path d="M396.19 208.32l-9.5 3.15-23.14-69.76 9.5-3.15z"/>
                </svg>
            </div>
        </div>
    </div>
</body>
</html>
