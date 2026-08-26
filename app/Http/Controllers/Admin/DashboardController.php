<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Categoria;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'articulosCount' => Articulo::count(),
            'publishedCount' => Articulo::whereNotNull('created_at')->count(),
            'categoriasCount' => Categoria::count(),
            'latestArticulos' => Articulo::with('categoria')
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}
