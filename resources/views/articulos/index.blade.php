@extends('layouts.app')

@section('title', 'Artículos')

@section('content')
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">

        <header class="mb-8">
            <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600">
                Publicaciones
            </p>

            <h1 class="mt-2 text-3xl font-bold text-slate-900 sm:text-4xl">
                Artículos
            </h1>

            <p class="mt-3 max-w-2xl text-slate-600">
                Explora las publicaciones y filtra el contenido por categoría.
            </p>
        </header>

        <nav class="mb-10 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"
            aria-label="Filtrar artículos por categoría">
            <div class="flex items-center justify-between gap-4">
                <h2 class="font-semibold text-slate-900">
                    Filtrar por categoría
                </h2>

                @if ($selectedCategoria !== '')
                    <a href="{{ route('articulos.index') }}"
                        class="text-sm font-semibold text-indigo-600 hover:text-indigo-800">
                        Limpiar filtro
                    </a>
                @endif
            </div>

            <div class="mt-4 flex flex-wrap gap-2">
                <a href="{{ route('articulos.index') }}" @class([
                    'rounded-full px-4 py-2 text-sm font-semibold transition',
                    'bg-slate-900 text-white' => $selectedCategoria === '',
                    'border border-slate-300 bg-white text-slate-700 hover:border-indigo-500 hover:text-indigo-700' =>
                        $selectedCategoria !== '',
                ])
                    @if ($selectedCategoria === '') aria-current="page" @endif>
                    Todas
                </a>

                @foreach ($categorias as $categoria)
                    <a href="{{ route('articulos.index', ['categoria' => $categoria->slug]) }}" @class([
                        'rounded-full px-4 py-2 text-sm font-semibold transition',
                        'bg-indigo-600 text-white' => $selectedCategoria === $categoria->slug,
                        'border border-slate-300 bg-white text-slate-700 hover:border-indigo-500 hover:text-indigo-700' =>
                            $selectedCategoria !== $categoria->slug,
                    ])
                        @if ($selectedCategoria === $categoria->slug) aria-current="page" @endif>
                        {{ $categoria->nombre }}
                    </a>
                @endforeach
            </div>
        </nav>

        @if ($articulos->isNotEmpty())
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($articulos as $articulo)
                    <article
                        class="group flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <a href="{{ route('articulos.show', $articulo) }}" class="block overflow-hidden"
                            aria-label="Leer {{ $articulo->titulo }}">
                            <img src="{{ $articulo->featured_image_url }}" alt="Imagen destacada de {{ $articulo->titulo }}"
                                width="640" height="360" loading="lazy"
                                class="aspect-video w-full object-cover transition duration-300 group-hover:scale-105">
                        </a>

                        <div class="flex flex-1 flex-col p-6">
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-2 text-sm">
                                @if ($articulo->categoria)
                                    <span class="font-semibold text-indigo-600">
                                        {{ $articulo->categoria->nombre }}
                                    </span>
                                @endif

                                <time datetime="{{ $articulo->created_at->toDateString() }}" class="text-slate-500">
                                    Publicado el {{ $articulo->created_at->format('d/m/Y') }}
                                </time>
                            </div>

                            <h2 class="mt-3 text-xl font-bold text-slate-900">
                                <a href="{{ route('articulos.show', $articulo) }}"
                                    class="transition hover:text-indigo-700">
                                    {{ $articulo->titulo }}
                                </a>
                            </h2>

                            <p class="mt-3 text-sm leading-6 text-slate-600">
                                {{ Str::limit(strip_tags($articulo->contenido), 120) }}
                            </p>

                            <div class="mt-auto pt-5">
                                <a href="{{ route('articulos.show', $articulo) }}"
                                    class="inline-flex items-center gap-2 font-semibold text-indigo-600 transition hover:text-indigo-800">
                                    Leer artículo
                                    <span aria-hidden="true">→</span>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $articulos->links() }}
            </div>
        @else
            <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-12 text-center">
                <h2 class="text-xl font-semibold text-slate-900">
                    No encontramos artículos
                </h2>

                <p class="mt-2 text-slate-500">
                    No existen publicaciones para la categoría seleccionada.
                </p>

                @if ($selectedCategoria !== '')
                    <a href="{{ route('articulos.index') }}"
                        class="mt-6 inline-flex rounded-lg bg-slate-900 px-5 py-3 font-semibold text-white transition hover:bg-slate-700">
                        Ver todos los artículos
                    </a>
                @endif
            </div>
        @endif

    </div>
@endsection
