@extends('layouts.app')

@section('title', $articulo->titulo)

@section('content')
    <div class="min-h-screen bg-slate-50">
        <article class="mx-auto max-w-4xl px-4 py-10 sm:px-6 lg:px-8">

            <a href="{{ route('articulos.index') }}"
                class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 transition hover:text-indigo-700">
                <span aria-hidden="true">←</span>
                Volver a los artículos
            </a>

            <header class="mt-8">
                <div class="flex flex-wrap items-center gap-x-3 gap-y-2 text-sm">
                    @if ($articulo->categoria)
                        <a href="{{ route('articulos.index', ['categoria' => $articulo->categoria->slug]) }}"
                            class="rounded-full bg-indigo-100 px-3 py-1 font-semibold text-indigo-700 transition hover:bg-indigo-200">
                            {{ $articulo->categoria->nombre }}
                        </a>
                    @endif

                    <time datetime="{{ $articulo->created_at->toDateString() }}" class="text-slate-500">
                        Publicado el {{ $articulo->created_at->format('d/m/Y') }}
                    </time>
                </div>

                <h1 class="mt-5 text-3xl font-bold tracking-tight text-slate-900 sm:text-5xl">
                    {{ $articulo->titulo }}
                </h1>
            </header>

            <div class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                <img src="{{ $articulo->featured_image_url }}" alt="Imagen destacada de {{ $articulo->titulo }}"
                    width="1200" height="675" class="aspect-video w-full object-cover">
            </div>

            <div class="mt-8 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-10">
                <div class="prose prose-slate max-w-none leading-8 text-slate-700">
                    {!! nl2br(e($articulo->contenido)) !!}
                </div>
            </div>

            <footer class="mt-8 border-t border-slate-200 pt-6">
                <a href="{{ route('articulos.index') }}"
                    class="inline-flex rounded-lg bg-slate-900 px-5 py-3 font-semibold text-white transition hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Ver más artículos
                </a>
            </footer>

        </article>
    </div>
@endsection
