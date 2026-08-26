<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Category;
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

        $categories = Categoria::orderBy('nombre')->get();

        return view('articulos.index', [
            'articulos' => $articles,
            'categorias' => $categories,
            'selectedCategoria' => $category,
        ]);
    }

    public function show(Articulo $article): View
    {
        abort_unless($article->created_at !== null, 404);

        $article->load('categoria');

        return view('articulos.show', [
            'articulo' => $article,
        ]);
    }
}
