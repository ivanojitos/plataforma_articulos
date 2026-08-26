<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Administración')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-slate-100 text-slate-900">

<div class="min-h-screen">

    <header class="border-b border-slate-200 bg-white">

        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">

            <div>
                <a
                    href="{{ route('admin.dashboard') }}"
                    class="text-xl font-bold"
                >
                    Administración
                </a>
            </div>

            <div class="flex items-center gap-4">

                <a
                    href="{{ route('articulos.index') }}"
                    target="_blank"
                    class="text-sm text-slate-600 hover:text-slate-900"
                >
                    Ver sitio
                </a>

                <span class="text-sm text-slate-500">
                    {{ auth()->user()->nombre }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button
                        type="submit"
                        class="text-sm font-medium text-red-600 hover:text-red-800"
                    >
                        Cerrar sesión
                    </button>
                </form>

            </div>

        </div>

    </header>

    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

        @if (session('success'))

            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                {{ session('success') }}
            </div>

        @endif

        @yield('content')

    </main>

</div>

</body>
</html>
