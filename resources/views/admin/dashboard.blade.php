@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

    <div>
        <p class="text-sm font-medium text-slate-500">
            Panel administrativo
        </p>

        <h1 class="mt-1 text-3xl font-bold">
            Dashboard
        </h1>
    </div>

    <a
        href="{{ route('admin.articulos.create') }}"
        class="inline-flex items-center justify-center rounded-lg bg-slate-900 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-700"
    >
        Crear artículo
    </a>

</div>

<div class="mt-8 grid gap-5 sm:grid-cols-3">

    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
        <p class="text-sm text-slate-500">Total artículos</p>
        <p class="mt-2 text-3xl font-bold">
            {{ $articulosCount }}
        </p>
    </div>

    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
        <p class="text-sm text-slate-500">Publicados</p>
        <p class="mt-2 text-3xl font-bold">
            {{ $publishedCount }}
        </p>
    </div>

    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
        <p class="text-sm text-slate-500">Categorías</p>
        <p class="mt-2 text-3xl font-bold">
            {{ $categoriasCount }}
        </p>
    </div>

</div>

<div class="mt-8 rounded-2xl bg-white shadow-sm ring-1 ring-slate-200">

    <div class="border-b border-slate-200 px-6 py-5">

        <div class="flex items-center justify-between">

            <h2 class="font-semibold">
                Últimos artículos
            </h2>

            <a
                href="{{ route('admin.articulos.index') }}"
                class="text-sm font-medium"
            >
                Ver todos →
            </a>

        </div>

    </div>

    <div class="divide-y divide-slate-100">

        @forelse ($latestArticulos as $articulo)

            <div class="flex items-center justify-between px-6 py-4">

                <div>

                    <p class="font-medium">
                        {{ $articulo->titulo }}
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        {{ $articulo->categoria->nombre }}
                    </p>

                </div>

                <a
                    href="{{ route('admin.articulos.edit', $articulo) }}"
                    class="text-sm font-medium"
                >
                    Editar
                </a>

            </div>

        @empty

            <div class="p-8 text-center text-slate-500">
                Todavía no existen artículos.
            </div>

        @endforelse

    </div>

</div>

@endsection
