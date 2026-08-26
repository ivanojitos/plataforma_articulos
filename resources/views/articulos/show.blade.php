@extends('layouts.app')

@section('content')

<div class="bg-gray-50 min-h-screen">

    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- Regresar --}}
        <div class="mb-8">

            <a
                href="{{ route('articulos.index') }}"
                class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition"
            >
                ← Volver a artículos
            </a>

        </div>


        {{-- Encabezado --}}
        <header class="mb-8">

            {{-- Categoría --}}
            @if ($articulo->categoria)

                <div class="mb-4">

                    <span
                        class="inline-flex items-center rounded-full bg-gray-900 px-3 py-1 text-sm font-medium text-white"
                    >
                        {{ $articulo->categoria->nombre }}
                    </span>

                </div>

            @endif


            {{-- Título --}}
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-gray-900 leading-tight">
                {{ $articulo->titulo }}
            </h1>


            {{-- Fecha --}}
            <div class="mt-5 flex items-center gap-2 text-sm text-gray-500">

                <span>
                    Publicado el
                </span>

                <time>
                    {{ $articulo->created_at->format('d/m/Y') }}
                </time>

            </div>

        </header>


        {{-- Imagen principal --}}
        @if ($articulo->imagen)

            <div class="mb-10 overflow-hidden rounded-2xl">

                <img
                    src="{{ asset('storage/' . $articulo->imagen) }}"
                    alt="{{ $articulo->titulo }}"
                    class="w-full max-h-[500px] object-cover"
                >

            </div>

        @endif


        {{-- Contenido --}}
        <div class="rounded-2xl bg-white p-6 sm:p-8 lg:p-10 shadow-sm border border-gray-100">

            <div class="prose prose-lg max-w-none text-gray-700">

                {!! nl2br(e($articulo->contenido)) !!}

            </div>

        </div>


        {{-- Navegación inferior --}}
        <div class="mt-10 pt-8 border-t border-gray-200">

            <a
                href="{{ route('articulos.index') }}"
                class="inline-flex items-center rounded-lg bg-gray-900 px-5 py-3 text-sm font-semibold text-white hover:bg-gray-700 transition"
            >
                ← Ver todos los artículos
            </a>

        </div>

    </article>

</div>

@endsection
