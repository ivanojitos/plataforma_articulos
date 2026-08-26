<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArticuloController extends Controller
{
    public function index(): View
    {
        $articulos = Articulo::with('categoria')
            ->latest('created_at')
            ->paginate(10);

        return view('admin.articulo.index', [
            'articulos' => $articulos,
        ]);
    }

    public function create(): View
    {
        $categorias = Categoria::orderBy('nombre')->get();

        return view('admin.articulo.create', [
            'categorias' => $categorias,
        ]);
    }

    public function store(ArticleRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['slug'] = $this->generateUniqueSlug($data['titulo']);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request
                ->file('imagen')
                ->store('articulos', 'public');
        }

        Articulo::create($data);

        return redirect()
            ->route('admin.articulos.index')
            ->with('success', 'Artículo creado correctamente.');
    }

    public function edit(Articulo $articulo): View
    {
        $categorias = Categoria::orderBy('nombre')->get();

        return view('admin.articulos.edit', [
            'articulo' => $articulo,
            'categorias' => $categorias,
        ]);
    }

    public function update(
        ArticleRequest $request,
        Articulo $articulo
    ): RedirectResponse {
        $data = $request->validated();

        if ($articulo->titulo !== $data['titulo']) {
            $data['slug'] = $this->generateUniqueSlug(
                $data['titulo'],
                $articulo->id
            );
        }

        if ($request->hasFile('imagen')) {
            if ($articulo->imagen) {
                Storage::disk('public')->delete($articulo->imagen);
            }

            $data['imagen'] = $request
                ->file('imagen')
                ->store('articulos', 'public');
        }

        $articulo->update($data);

        return redirect()
            ->route('admin.articulos.index')
            ->with('success', 'Artículo actualizado correctamente.');
    }

    public function destroy(Articulo $articulo): RedirectResponse
    {
        if ($articulo->imagen) {
            Storage::disk('public')->delete($articulo->imagen);
        }

        $articulo->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Artículo eliminado correctamente.');
    }

    private function generateUniqueSlug(
        string $titulo,
        ?int $ignoreId = null
    ): string {
        $slug = Str::slug($titulo);
        $originalSlug = $slug;
        $counter = 1;

        while (
            Articulo::where('slug', $slug)
            ->when(
                $ignoreId,
                fn($query) => $query->where('id', '!=', $ignoreId)
            )
            ->exists()
        ) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }

        return $slug;
    }
}
