@extends('layouts.admin')

@section('title', 'Crear artículo')

@section('content')

<div class="mx-auto max-w-3xl">

    <div class="mb-8">

        <a
            href="{{ route('admin.articulos.index') }}"
            class="text-sm text-slate-500 hover:text-slate-900"
        >
            ← Volver a artículos
        </a>

        <h1 class="mt-4 text-3xl font-bold">
            Crear artículo
        </h1>

        <p class="mt-2 text-slate-500">
            Completa la información de la nueva publicación.
        </p>

    </div>

    <form
        method="POST"
        action="{{ route('admin.articulos.store') }}"
        enctype="multipart/form-data"
        class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8"
    >

        @csrf

        @include('admin.articulos._form')

        <div class="mt-8 flex justify-end gap-3 border-t border-slate-200 pt-6">

            <a
                href="{{ route('admin.articulos.index') }}"
                class="rounded-lg px-5 py-3 text-sm font-medium text-slate-600 hover:bg-slate-100"
            >
                Cancelar
            </a>

            <button
                type="submit"
                class="rounded-lg bg-slate-900 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-700"
            >
                Crear artículo
            </button>

        </div>

    </form>

</div>

@endsection
