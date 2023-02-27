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

<body class=" bg-gradient-to-r from-violet-400 to-pink-400">


    <form action="{{route('pokemon.actualizarMote')}}">

        <div class="flex flex-col items-center justify-center h-screen ">
            <div>
                
                <label for="name-with-label" class="text-lg text-gray-600 ">
                    Mote
                </label>
                <div class="flex gap-3 ">
                    <input type="text" id="name-with-label"  required
                    class="flex-1 w-full px-4 py-2 text-base text-gray-700 placeholder-gray-400 bg-white border border-transparent border-gray-300 rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    name="mote" placeholder="Nuevo mote para {{$name}}" />
                    <input type="hidden" name="id" value="{{$id}}"/>
                    <input class="px-4 text-white rounded bg-violet-400 hover:bg-violet-300 active:bg-violet-500" type="submit"/>
                    <a href="{{url('/pokedex')}}" class="flex items-center justify-center px-4 text-white bg-red-400 rounded hover:bg-red-300 active:bg-red-500" >Cancelar</a>
                </div>
                
            </div>
        </div>


    </form>
</body>

</html>
