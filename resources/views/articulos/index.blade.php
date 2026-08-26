@extends('layouts.app')

@section('title', 'Artículos')

@section('content')

<div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">

    <div class="mb-10">

        <h1 class="text-3xl font-bold text-slate-900">
            Artículos
        </h1>

        <p class="mt-2 text-slate-600">
            Explora nuestras publicaciones.
        </p>

    </div>


    @if ($articulos->count() > 0)

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            @foreach ($articulos as $articulo)

                <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    @if ($articulo->imagen)

                        <img
                            src="{{ asset('storage/' . $articulo->imagen) }}"
                            alt="{{ $articulo->titulo }}"
                            class="h-52 w-full object-cover"
                        >

                    @endif


                    <div class="p-6">

                        @if ($articulo->categoria)

                            <span class="text-xs font-semibold uppercase tracking-wide text-slate-500">
                                {{ $articulo->categoria->nombre }}
                            </span>

                        @endif


                        <h2 class="mt-2 text-xl font-bold text-slate-900">
                            {{ $articulo->titulo }}
                        </h2>


                        <p class="mt-3 text-sm text-slate-600">
                            {{ Str::limit(strip_tags($articulo->contenido), 120) }}
                        </p>


                        <div class="mt-5">

                            <a
                                href="{{ route('articulos.show', $articulo) }}"
                                class="font-semibold text-slate-900 hover:text-slate-600"
                            >
                                Leer artículo →
                            </a>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

    @else

        <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-12 text-center">

            <h2 class="text-xl font-semibold text-slate-900">
                No hay artículos disponibles
            </h2>

            <p class="mt-2 text-slate-500">
                Actualmente no existen publicaciones para mostrar.
            </p>

        </div>

    @endif

</div>

@endsection
