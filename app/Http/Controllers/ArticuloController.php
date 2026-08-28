<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticuloController extends Controller
{
    public function index(Request $request): View
    {
        $selectedCategoria = $request->string('categoria')
            ->trim()
            ->toString();

        $articulos = Articulo::query()
            ->with('categoria')
            ->when(
                $selectedCategoria !== '',
                fn ($query) => $query->whereRelation(
                    'categoria',
                    'slug',
                    $selectedCategoria
                )
            )
            ->latest()
            ->paginate(9)
            ->withQueryString();

        $categorias = Categoria::query()
            ->orderBy('nombre')
            ->get();

        return view('articulos.index', [
            'articulos' => $articulos,
            'categorias' => $categorias,
            'selectedCategoria' => $selectedCategoria,
        ]);
    }

    public function show(Articulo $articulo): View
    {
        $articulo->load('categoria');

        return view('articulos.show', [
            'articulo' => $articulo,
        ]);
    }
}
