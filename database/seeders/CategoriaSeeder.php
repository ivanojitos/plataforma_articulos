<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Categoria;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Tecnología',
            'Diseño',
            'Negocios',
        ];

        foreach ($categorias as $nombre) {
            Categoria::updateOrCreate(
                ['slug' => Str::slug($nombre)],
                ['nombre' => $nombre]
            );
        }
    }
}
