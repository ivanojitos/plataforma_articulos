<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Categoria;

use Illuminate\View\View;

class ArticuloController extends Controller
{
    public function index(): View
    {
        $category = request('categoria');

        $articles = Articulo::with('categoria')
            ->whereNotNull('created_at')
            ->when($category, function ($query) use ($category) {
                $query->whereHas('categoria', function ($query) use ($category) {
                    $query->where('slug', $category);
                });
            })
            ->latest('created_at')
            ->paginate(9)
            ->withQueryString();

        $categorias = Categoria::orderBy('nombre')->get();


        return view('articulos.index', [
            'articulos' => $articles,
            'categorias' => $categorias,
            'selectedCategoria' => $category,
        ]);
    }

    public function show(Articulo $articulo): View
    {
        abort_unless($articulo->created_at !== null, 404);

        $articulo->load('categoria');

        return view('articulos.show', [
            'articulo' => $articulo,
        ]);
    }
}
