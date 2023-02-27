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

<body class="flex items-center justify-center h-screen bg-gradient-to-r from-red-400 to-gray-400">


    <div class="relative bg-white rounded shadow-lg">
        <div
            class="p-3 lg:min-w-[500px] lg:max-w-[500px] lg:min-h-[500px] lg:max-h-[500px] min-w-[250px] max-w-[250px] min-h-[250px] max-h-content ">
            <p class="font-semibold text-center uppercase ">{{ $raw->forms[0]->name }}</p>
            <main class="flex justify-center">
                <img class="object-contain w-2/6 h-auto" src="{{ $raw->sprites->front_default }}" alt="">
            </main>

            <section>
                <div class="flex flex-col gap-[1px]">
                   <span class="capitalize ">{{ $raw->stats[0]->stat->name }}: {{ $raw->stats[0]->base_stat }}</span> 
                    <p class=" text-xs h-[10px] text-white bg-green-500 w-[{{ $raw->stats[0]->base_stat }}px]"></p>

                    <span class="capitalize ">{{ $raw->stats[1]->stat->name }}: {{ $raw->stats[1]->base_stat }}</span> 
                    <p class=" text-xs h-[10px] text-white bg-red-500 w-[{{ $raw->stats[1]->base_stat }}px]"></p>
                

                    <span class="capitalize ">{{ $raw->stats[2]->stat->name }}: {{ $raw->stats[2]->base_stat }}</span> 
                    <p class=" text-xs h-[10px] text-white bg-blue-500 w-[{{ $raw->stats[2]->base_stat }}px]"></p>
                

                    <span class="capitalize ">{{ $raw->stats[3]->stat->name }}: {{ $raw->stats[3]->base_stat }}</span> 
                    <p class=" text-xs h-[10px] text-white bg-orange-500 w-[{{ $raw->stats[3]->base_stat }}px]"></p>
                

                    <span class="capitalize ">{{ $raw->stats[4]->stat->name }}: {{ $raw->stats[4]->base_stat }}</span> 
                    <p class=" text-xs h-[10px] text-white bg-indigo-500 w-[{{ $raw->stats[4]->base_stat }}px]"></p>
                

                    <span class="capitalize ">{{ $raw->stats[5]->stat->name }}: {{ $raw->stats[5]->base_stat }}</span> 
                    <p class=" text-xs h-[10px] text-white bg-violet-500 w-[{{ $raw->stats[5]->base_stat }}px]"></p>
                
                </div>

                <aside class="flex justify-center">Type/s:
                    @foreach ($raw->types as $type)
                        {{ $type->type->name }}
                    @endforeach
                </aside>
            </section>
        </div>
        <footer class="absolute bottom-0 flex justify-around w-full m-1">
            <a href="{{ url('/') }}"
                class="px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-400 active:bg-gray-600">Back to Menu</a>
                <form method="POST" action="{{ route('pokemon.add', $raw->forms[0]->name ) }}">
                    @csrf
                    <input type="hidden" name="imagePkm" value="{{$raw->sprites->front_default}}">
                    <button class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-400 active:bg-red-600">Add to my pokedex</button>
                </form>
        </footer>
    </div>


</body>


</html>
