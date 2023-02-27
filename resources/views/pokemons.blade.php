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

<body class=" bg-gradient-to-r from-red-400 to-gray-400">


    <div class="flex items-center justify-around mt-5 text-center">
        <a style="" href="{{ url('/') }}"
            class="p-1 bg-white border border-black rounded-full border-1 hover:animate-reverse-spin">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 ">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
            </svg>
        </a>

        <form action="{{route('pokemon.searchByName')}}" class="flex">
            <input required type="text" name="query" placeholder="Busque aquí por nombre"
                class="max-w-[500px] max-h-[50px] bg-gray-50 border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <input type="submit"
                class="transition-all px-4 py-2  text-white bg-violet-400 max-h-[40px] hover:bg-violet-300 active:text-opacity-70 active:text-white hover:text-violet-500"
                value="Buscar">
        </form>


        <form action="{{route('pokemon.searchByType')}}" class="flex gap-2">
            <label class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo/s:
                <div onclick="document.querySelector('#tipos').classList.toggle('hidden')"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 ">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                    </svg>
                </div>


                <div id="tipos" multiple name="types[]"
                    class=" hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <div class="absolute z-10 grid grid-cols-4 gap-1 p-3 bg-white rounded">
                        Bicho<input type="radio" name="type" id="" value="7">
                        Siniestro<input type="radio" name="type" id="" value="17">
                        Dragón<input type="radio" name="type" id="" value="16">
                        Eléctrico<input type="radio" name="type" id="" value="13">
                        Hada<input type="radio" name="type" id="" value="18">
                        Lucha<input type="radio" name="type" id="" value="2">
                        Fuego<input type="radio" name="type" id="" value="10">
                        Volador<input type="radio" name="type" id="" value="3">
                        Fantasma<input type="radio" name="type" id="" value="8">
                        Planta<input type="radio" name="type" id="" value="12">
                        Tierra<input type="radio" name="type" id="" value="5">
                        Hielo<input type="radio" name="type" id="" value="15">
                        Normal<input type="radio" name="type" id="" value="1">
                        Veneno<input type="radio" name="type" id="" value="4">
                        Psíquico<input type="radio" name="type" id="" value="14">
                        Roca<input type="radio" name="type" id="" value="6">
                        Acero<input type="radio" name="type" id="" value="9">
                        Agua<input type="radio" name="type" id="" value="11">
                    </div>
                </div>
            </label>

            <input type="submit"
                class="transition-all px-4 py-2 rounded text-white bg-violet-400 max-h-[40px] hover:bg-violet-300 active:text-opacity-70 active:text-white hover:text-violet-500"
                value="Buscar">
        </form>

        
        <form action="{{ route('pokemons') }}" class="mt-5">





    </div>
    </form>





    <main class="flex flex-wrap justify-center mt-3 mb-3 ">
        @if (isset($raw))
            @for ($i = 0; $i < 1008; $i++)
                <a href="{{ route('pokemon', ['nombre' => $raw[$i]->name, 'id' => $i]) }} "
                    class="p-[25px] hover:animate-bounce">
                    <div
                        class="border-2 border-yellow-400 flex flex-col justify-center p-4 bg-white rounded shadow-lg min-w-[160px] max-w-[160px] min-h-[170px] max-h-[170px] ">
                        <small class="mt-3 font-sans text-xs text-center uppercase ">{{ $raw[$i]->name }}</small>
                        <img class=""
                            src="{{ 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/' . ($i + 1) . '.png' }}" />
                        <p class="mb-1 text-xs text-center"> #<span class="font-bold">{{ $i + 1 }}</span></p>
                    </div>
                </a>
            @endfor
        @endif
        @if (isset($row))
        @for ($i = 0; $i < count($row->pokemon); $i++)
        <a href="{{ route('pokemon', ['nombre' => $row->pokemon[$i]->pokemon->name, 'id' => $i]) }} "
            class="p-[25px] hover:animate-bounce">
            <div
                class="border-2 border-yellow-400 flex flex-col justify-center p-4 bg-white rounded shadow-lg min-w-[160px] max-w-[160px] min-h-[170px] max-h-[170px] ">
                <small class="mt-3 font-sans text-xs text-center uppercase ">{{ $row->pokemon[$i]->pokemon->name }}</small>
                <img class=""
                    src="https://img2.freepng.es/20171217/d5b/question-mark-png-5a3698322ab363.8566429715135273461749.jpg" />
                <p class="mb-1 text-xs text-center"> #<span class="font-bold">{{ $i + 1 }}</span></p>
            </div>
        </a>
    @endfor
        @endif
    </main>


    <a href='#' class="flex justify-center px-4 py-2 m-12 text-white rounded bg-violet-500">Go to top ⇧</a>

</body>

</html>
