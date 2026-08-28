@extends('layouts.app')

@section('title', $articulo->titulo)

@section('content')
<div class="min-h-screen bg-slate-50">
    <article class="mx-auto max-w-4xl px-4 py-10 sm:px-6 lg:px-8">

        <a
            href="{{ route('articulos.index') }}"
            class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 transition hover:text-indigo-700"
        >
            <span aria-hidden="true">←</span>
            Volver a los artículos
        </a>

        <header class="mt-8">
            <div class="flex flex-wrap items-center gap-x-3 gap-y-2 text-sm">
                @if ($articulo->categoria)
                    <a
                        href="{{ route('articulos.index', ['categoria' => $articulo->categoria->slug]) }}"
                        class="rounded-full bg-indigo-100 px-3 py-1 font-semibold text-indigo-700 transition hover:bg-indigo-200"
                    >
                        {{ $articulo->categoria->nombre }}
                    </a>
                @endif

                <time
                    datetime="{{ $articulo->created_at->toDateString() }}"
                    class="text-slate-500"
                >
                    Publicado el {{ $articulo->created_at->format('d/m/Y') }}
                </time>
            </div>

            <h1 class="mt-5 text-3xl font-bold tracking-tight text-slate-900 sm:text-5xl">
                {{ $articulo->titulo }}
            </h1>
        </header>

        <div class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            @if ($articulo->imagen)
                <img
                    src="{{ asset('storage/'.$articulo->imagen) }}"
                    alt="Imagen destacada de {{ $articulo->titulo }}"
                    width="1200"
                    height="675"
                    class="aspect-video w-full object-cover"
                >
            @else
                <div
                    class="flex aspect-video w-full flex-col items-center justify-center gap-3 bg-gradient-to-br from-slate-100 to-indigo-100 text-slate-500"
                    role="img"
                    aria-label="Artículo sin imagen destacada"
                >
                    <svg
                        class="h-16 w-16"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5"
                        aria-hidden="true"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 19.5h16.5A1.5 1.5 0 0 0 21.75 18V6A1.5 1.5 0 0 0 20.25 4.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Z"
                        />
                    </svg>

                    <span class="text-sm font-semibold">
                        Sin imagen destacada
                    </span>
                </div>
            @endif
        </div>

        <div class="mt-8 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-10">
            <div class="prose prose-slate max-w-none leading-8 text-slate-700">
                {!! nl2br(e($articulo->contenido)) !!}
            </div>
        </div>

        <footer class="mt-8 border-t border-slate-200 pt-6">
            <a
                href="{{ route('articulos.index') }}"
                class="inline-flex rounded-lg bg-slate-900 px-5 py-3 font-semibold text-white transition hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                Ver más artículos
            </a>
        </footer>

    </article>
</div>
@endsection
