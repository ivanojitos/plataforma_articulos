<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Artículos')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-900">

<header class="border-b border-slate-200 bg-white">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">

        <a
            href="{{ route('articulos.index') }}"
            class="text-xl font-bold tracking-tight"
        >
            Artículos
        </a>

        <nav class="flex items-center gap-4">
            <a
                href="{{ route('articulos.index') }}"
                class="text-sm font-medium text-slate-600 hover:text-slate-900"
            >
                Publicaciones
            </a>

            @auth
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="text-sm font-medium text-slate-600 hover:text-slate-900"
                >
                    Administración
                </a>
            @else
                <a
                    href="{{ route('login') }}"
                    class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700"
                >
                    Iniciar sesión
                </a>
            @endauth
        </nav>

    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="mt-16 border-t border-slate-200 bg-white">
    <div class="mx-auto max-w-7xl px-4 py-8 text-center text-sm text-slate-500">
        © {{ date('Y') }} Artículos
    </div>
</footer>

</body>
</html>
