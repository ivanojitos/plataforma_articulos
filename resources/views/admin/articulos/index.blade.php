@extends('layouts.admin')

@section('title', 'Artículos')

@section('content')

<div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

    <div>
        <h1 class="text-3xl font-bold">
            Artículos
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Administra las publicaciones de tu sitio.
        </p>
    </div>

    <a
        href="{{ route('admin.articulos.create') }}"
        class="inline-flex items-center justify-center rounded-lg bg-slate-900 px-5 py-3 text-sm font-semibold text-white hover:bg-slate-700"
    >
        + Nuevo artículo
    </a>

</div>

<div class="mt-8 overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-200">

    <div class="overflow-x-auto">

        <table class="w-full min-w-[700px] text-left">

            <thead class="border-b border-slate-200 bg-slate-50">

                <tr>

                    <th class="px-6 py-4 text-xs font-semibold uppercase text-slate-500">
                        Artículo
                    </th>

                    <th class="px-6 py-4 text-xs font-semibold uppercase text-slate-500">
                        Categoría
                    </th>

                    <th class="px-6 py-4 text-xs font-semibold uppercase text-slate-500">
                        Publicación
                    </th>

                    <th class="px-6 py-4 text-right text-xs font-semibold uppercase text-slate-500">
                        Acciones
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-slate-100">

                @forelse ($articulos as $articulo)

                    <tr class="hover:bg-slate-50">

                        <td class="px-6 py-4">

                            <p class="font-medium">
                                {{ $articulo->titulo }}
                            </p>

                            <p class="mt-1 max-w-md truncate text-sm text-slate-500">
                                {{ $articulo->descripcion }}
                            </p>

                        </td>

                        <td class="px-6 py-4">

                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium">
                                {{ $articulo->categoria->nombre }}
                            </span>

                        </td>

                        <td class="px-6 py-4 text-sm text-slate-500">

                            @if ($articulo->created_at)

                                {{ $articulo->created_at->format('d/m/Y') }}

                            @else

                                <span class="text-amber-600">
                                    No publicado
                                </span>

                            @endif

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-end gap-3">

                                <a
                                    href="{{ route('admin.articulos.edit', $articulo) }}"
                                    class="text-sm font-medium text-slate-700 hover:text-slate-900"
                                >
                                    Editar
                                </a>

                                <form
                                    method="POST"
                                    action="{{ route('admin.articulos.destroy', $articulo) }}"
                                    onsubmit="return confirm('¿Estás seguro de eliminar este artículo?');"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="text-sm font-medium text-red-600 hover:text-red-800"
                                    >
                                        Eliminar
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="4"
                            class="px-6 py-12 text-center"
                        >

                            <p class="font-medium">
                                No existen artículos.
                            </p>

                            <a
                                href="{{ route('admin.articulos.create') }}"
                                class="mt-3 inline-block text-sm font-medium"
                            >
                                Crear el primer artículo →
                            </a>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<div class="mt-6">
    {{ $articulos->links() }}
</div>

@endsection
