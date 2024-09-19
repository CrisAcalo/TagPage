<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        
          <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body class="antialiased">
        <div class="relative min-h-screen bg-dots-lighter bg-center bg-gray-100 light:bg-dots-lighter light:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 light:text-gray-400 light:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 light:text-gray-400 light:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 light:text-gray-400 light:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                {{-- contenedor que imprimirá una lista de los errores con un foreach --}}

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                

                <div class="flex justify-center">
                    <h1 class="text-7xl font-bold text-red-500 [text-shadow:_4px_4px_15px_rgb(239_68_68_/_0.6)]">Tag Page</h1>
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
                         <div class="scale-100 p-6 bg-white light:bg-gray-800/50 light:bg-gradient-to-bl from-gray-700/50 via-transparent light:ring-1 light:ring-inset light:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 light:shadow-none 
                        ">
                            <div>
                               
                                <h2 class="mt-2 text-xl font-semibold text-gray-900 light:text-white">New Tag</h2>

                            </div>

                            <form action="{{route('tags.store')}}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="flex md:h-12 my-4 w-full md:w-1/2 mx-auto flex-col md:flex-row">
                                    <input type="text" name="name" id="name" class="px-6 py-3 w-full bg-light rounded-lg border-solid border-2 border-gray-100/40 shadow-md shadow-gray-300 light:shadow-none focus:outline focus:outline-2 focus:outline-red-500 h-full
                                    md:rounded-none md:rounded-l-lg" placeholder="Tag name">
                                    <input type="submit" value="Submit" class="text-white font-semibold bg-red-500 rounded-lg shadow-md shadow-red-300 hover:bg-red-500/90 hover:shadow-lg hover:shadow-red-300 hover:cursor-pointer mt-2 h-12 w-full
                                    md:rounded-none md:rounded-r-lg md:mt-0 md:h-full md:w-24 duration-200">
                                </div>
                            </form>
                        </div>

                        <div class="p-6 bg-white light:bg-gray-800/50 light:bg-gradient-to-bl from-gray-700/50 via-transparent light:ring-1 light:ring-inset light:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 light:shadow-none">
                            <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Tag name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Slug
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                OP
                                            </th>
                                        </tr>
                                    </thead>

                                    @forelse ($tags as $tag)
                                        
                                        <tr class="bg-white border-b">
                                            <td class="px-6 py-4">{{$tag->name}}</td>
                                            <td class="px-6 py-4">{{$tag->slug}}</td>
                                            <td class="px-6 py-4">
                                                <form action="{{route('tags.destroy', $tag->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="Delete" class="text-white font-semibold bg-red-500 rounded-lg shadow-md shadow-red-300 hover:bg-red-500/90 hover:shadow-lg hover:shadow-red-300 hover:cursor-pointer p-2 duration-200">
                                                </form>
                                            </td>
                                        </tr>

                                    @empty

                                    <tr>
                                        <td>
                                            <p>..:: No hay etiquetas ::..</p>
                                        </td>
                                    </tr>
                                        
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
