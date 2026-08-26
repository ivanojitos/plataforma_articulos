<div class="space-y-6">

    {{-- Título --}}
    <div>

        <label
            for="titulo"
            class="block text-sm font-medium text-slate-700"
        >
            Título
        </label>

        <input
            type="text"
            name="titulo"
            id="titulo"
            value="{{ old('titulo', $articulo->titulo ?? '') }}"
            class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-900 focus:ring-slate-900"
            placeholder="Ej. Cómo construir una aplicación con Laravel"
        >

        @error('titulo')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Categoría --}}
    <div>

        <label
            for="categoria_id"
            class="block text-sm font-medium text-slate-700"
        >
            Categoría
        </label>

        <select
            name="categoria_id"
            id="categoria_id"
            class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-900 focus:ring-slate-900"
        >

            <option value="">
                Selecciona una categoría
            </option>

            @foreach ($categorias as $categoria)

                <option
                    value="{{ $categoria->id }}"
                    @selected(old('categoria_id', $articulo->categoria_id ?? '') == $categoria->id)
                >
                    {{ $categoria->nombre }}
                </option>

            @endforeach

        </select>

        @error('categoria_id')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Extracto --}}
    <div>

        <label
            for="descripcion"
            class="block text-sm font-medium text-slate-700"
        >
            Descripción
        </label>

        <textarea
            name="descripcion"
            id="descripcion"
            rows="3"
            class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-900 focus:ring-slate-900"
            placeholder="Breve descripción del artículo"
        >{{ old('descripcion', $articulo->descripcion ?? '') }}</textarea>

        @error('descripcion')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Contenido --}}
    <div>

        <label
            for="contenido"
            class="block text-sm font-medium text-slate-700"
        >
            Contenido
        </label>

        <textarea
            name="contenido"
            id="contenido"
            rows="12"
            class="mt-2 block w-full rounded-lg border-slate-300 shadow-sm focus:border-slate-900 focus:ring-slate-900"
            placeholder="Escribe el contenido completo..."
        >{{ old('contenido', $articulo->contenido ?? '') }}</textarea>

        @error('contenido')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>

    {{-- Imagen --}}
    <div>

        <label
            for="imagen"
            class="block text-sm font-medium text-slate-700"
        >
            Imagen destacada
        </label>

        @if (!empty($articulo?->imagen))

            <div class="mb-4 mt-3">

                <img
                    src="{{ Storage::url($articulo->imagen) }}"
                    alt="{{ $articulo->titulo }}"
                    class="h-48 w-full rounded-xl object-cover sm:w-96"
                >

            </div>

        @endif

        <input
            type="file"
            name="imagen"
            id="imagen"
            accept="imagen/jpeg,imagen/png,imagen/webp"
            class="mt-2 block w-full text-sm text-slate-600"
        >

        <p class="mt-2 text-xs text-slate-500">
            JPG, PNG o WEBP. Máximo 2 MB.
        </p>

        @error('imagen')
            <p class="mt-2 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>



</div>
