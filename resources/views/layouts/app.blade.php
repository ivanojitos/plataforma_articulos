<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Plataforma de artículos y publicaciones">

    <link rel="icon" type="image/png" href="{{ asset('IA.JPG') }}">

    <title>
        @yield('title', 'Artículos')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="min-h-screen bg-slate-50 text-slate-900">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <header class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="flex h-16 items-center justify-between">

                {{-- Logo --}}
                <a href="{{ route('articulos.index') }}" class="flex items-center gap-3">

                    <div
                        class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-900 text-sm font-bold text-white">
                        A
                    </div>

                    <div class="hidden sm:block">

                        <span class="block text-base font-bold tracking-tight text-slate-900">
                            Artículos
                        </span>

                        <span class="block text-xs text-slate-500">
                            Plataforma de publicaciones
                        </span>

                    </div>

                </a>


                {{-- Navegación --}}
                <nav class="flex items-center gap-2 sm:gap-5">

                    {{-- Publicaciones --}}
                    <a href="{{ route('articulos.index') }}"
                        class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                        Publicaciones
                    </a>


                    @auth

                        {{-- Administración --}}
                        <a href="{{ route('admin.dashboard') }}"
                            class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-100 hover:text-slate-900">
                            Administración
                        </a>


                        {{-- Usuario --}}
                        <div class="hidden h-6 w-px bg-slate-200 sm:block"></div>

                        <div class="hidden items-center gap-3 sm:flex">

                            <div class="text-right">

                                <p class="text-xs font-semibold text-slate-900">
                                    {{ auth()->user()->nombre }}
                                </p>

                                <p class="text-xs text-slate-500">
                                    Administrador
                                </p>

                            </div>

                        </div>


                        {{-- Logout --}}
                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <button type="submit"
                                class="rounded-lg px-3 py-2 text-sm font-medium text-slate-500 transition hover:bg-red-50 hover:text-red-600">
                                Salir
                            </button>

                        </form>
                    @else
                        {{-- Login --}}
                        <a href="{{ route('login') }}"
                            class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-700">
                            Iniciar sesión
                        </a>

                    @endauth

                </nav>

            </div>

        </div>

    </header>


    {{-- ========================================================= --}}
    {{-- MENSAJES DE SESIÓN --}}
    {{-- ========================================================= --}}

    <div class="mx-auto max-w-7xl px-4 pt-6 sm:px-6 lg:px-8">

        @if (session('success'))
            <div class="flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-800"
                role="alert">

                <div class="flex-1">

                    <p class="text-sm font-semibold">
                        Operación exitosa
                    </p>

                    <p class="mt-1 text-sm">
                        {{ session('success') }}
                    </p>

                </div>

            </div>
        @endif


        @if (session('error'))
            <div class="flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-red-800"
                role="alert">

                <div class="flex-1">

                    <p class="text-sm font-semibold">
                        Ocurrió un problema
                    </p>

                    <p class="mt-1 text-sm">
                        {{ session('error') }}
                    </p>

                </div>

            </div>
        @endif

    </div>


    {{-- ========================================================= --}}
    {{-- CONTENIDO --}}
    {{-- ========================================================= --}}

    <main>

        @yield('content')

    </main>


    {{-- ========================================================= --}}
    {{-- FOOTER --}}
    {{-- ========================================================= --}}

    <footer class="mt-20 border-t border-slate-200 bg-white">

        <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">

            <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">

                <div>

                    <p class="text-sm font-semibold text-slate-900">
                        Artículos
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        Plataforma de publicaciones
                    </p>

                </div>


                <div class="flex items-center gap-5 text-sm">

                    <a href="{{ route('articulos.index') }}" class="text-slate-500 transition hover:text-slate-900">
                        Publicaciones
                    </a>

                    @guest

                        <a href="{{ route('login') }}" class="text-slate-500 transition hover:text-slate-900">
                            Administración
                        </a>

                    @endguest

                </div>

            </div>


            <div class="mt-8 border-t border-slate-100 pt-6 text-center">

                <p class="text-xs text-slate-400">
                    © {{ date('Y') }} Artículos. Todos los derechos reservados.
                </p>

            </div>

        </div>

    </footer>


</body>

</html>
