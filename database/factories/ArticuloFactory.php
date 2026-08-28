<?php

namespace Database\Factories;

use App\Models\Articulo;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Articulo>
 */
class ArticuloFactory extends Factory
{
    protected $model = Articulo::class;

    public function definition(): array
    {
        $titulo = fake()->unique()->sentence(5);

        return [
            'categoria_id' => Categoria::factory(),
            'titulo' => $titulo,
            'slug' => Str::slug($titulo),
            'descripcion' => fake()->sentence(),
            'contenido' => implode(PHP_EOL.PHP_EOL, fake()->paragraphs(4)),
            'imagen' => null,
        ];
    }
}
