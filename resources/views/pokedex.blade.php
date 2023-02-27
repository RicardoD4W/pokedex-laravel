<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Styles -->

</head>

<body class=" bg-gradient-to-r from-yellow-400 to-gray-400">
    <div class="flex gap-5 m-5">

        <a style="" class="relative" href="{{ url('/') }}"
           >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 ">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
            </svg>
        </a>

        <div class="relative" onclick="document.querySelector('#info').classList.toggle('hidden')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
            </svg>

            <div id="info"
                class="absolute w-[150px] h-auto hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500   p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <p>Si desea consultar las stats de sus pkms haga click en ellos</p>
                <hr class="m-1">
                <p>E.Pkm ⇨ Eliminar Pokemon</p>
                <hr class="m-1">
                <p>c.Mote ⇨ Cambiar Mote</p>
            </div>

        </div>


    </div>
    <div class="container flex flex-wrap items-center justify-center gap-5 mx-auto text-center md:justify-start ">

        @foreach ($raw as $pkm)
            <div class="">
                <a href="{{ route('pokemon', ['nombre' => $pkm->name]) }} " class="">
                    @if ($pkm->mote !== '')
                    @endif
                    <div
                        class=" text-center items-center border-2 border-yellow-400 flex flex-col justify-center p-4 bg-white rounded shadow-lg min-w-[160px] max-w-[160px] min-h-[230px] max-h-[230px] ">
                        <small class="mt-3 font-sans text-xs text-center uppercase ">{{ $pkm->name }}</small>
                        <img class="mb-3 hover:animate-bounce" src="{{ $pkm->imagePkm }}" />
                        <div class="flex flex-col gap-1">
                            <p><a class="p-1 text-white bg-red-700 rounded hover:bg-red-600 active:bg-red-800"
                                    href="{{ route('pokemon.delete', ['id' => $pkm->id]) }}">E.Pkm</a></p>
                            <p><a class="p-1 text-white bg-green-700 rounded hover:bg-green-600 active:bg-green-800"
                                    href="{{ route('pokemon.changeMote', ['id' => $pkm->id]) }}">C.Mote</a></p>
                            <p class="max-w-[140px] overflow-x-auto"> {{ $pkm->mote }} </p>
                        </div>

                    </div>
                </a>
            </div>
        @endforeach

    </div>
</body>

</html>
