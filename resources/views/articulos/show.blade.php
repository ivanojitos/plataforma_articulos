@extends('layouts.public')

@section('title', $articulo->titulo)

@section('content')

<article class="mx-auto max-w-4xl px-4 py-12 sm:px-6 lg:px-8">

    <a
        href="{{ route('articulos.index') }}"
        class="text-sm font-medium text-slate-500 hover:text-slate-900"
    >
        ← Volver a artículos
    </a>

    <div class="mt-8">

        <div class="flex flex-wrap items-center gap-3">

            <span class="rounded-full bg-slate-100 px-3 py-1 text-sm font-medium">
                {{ $articulo->categoria->nombre }}
            </span>

            <time class="text-sm text-slate-500">
                {{ $articulo->created_at->format('d/m/Y') }}
            </time>

        </div>

        <h1 class="mt-5 text-4xl font-bold tracking-tight sm:text-5xl">
            {{ $articulo->titulo }}
        </h1>

        @if ($articulo->descripcion)
            <p class="mt-5 text-xl leading-8 text-slate-600">
                {{ $articulo->descripcion }}
            </p>
        @endif

        @if ($articulo->imagen)

            <div class="mt-10 overflow-hidden rounded-2xl">
                <img
                    src="{{ Storage::url($articulo->imagen) }}"
                    alt="{{ $articulo->titulo }}"
                    class="w-full object-cover"
                >
            </div>

        @endif

        <div class="prose prose-slate mt-10 max-w-none">
            {!! nl2br(e($articulo->contenido)) !!}
        </div>

    </div>

</article>

@endsection
