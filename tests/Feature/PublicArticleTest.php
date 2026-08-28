<?php

namespace Tests\Feature;

use App\Models\Articulo;
use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_article_list_is_accessible(): void
    {
        $categoria = Categoria::factory()->create([
            'nombre' => 'Desarrollo web',
            'slug' => 'desarrollo-web',
        ]);

        $articulo = Articulo::factory()
            ->for($categoria, 'categoria')
            ->create([
                'titulo' => 'Artículo público de prueba',
            ]);

        $this->get(route('articulos.index'))
            ->assertOk()
            ->assertSee($articulo->titulo)
            ->assertSee($categoria->nombre)
            ->assertSee('Filtrar por categoría');
    }

    public function test_articles_can_be_filtered_by_category(): void
    {
        $laravel = Categoria::factory()->create([
            'nombre' => 'Laravel',
            'slug' => 'laravel',
        ]);

        $diseno = Categoria::factory()->create([
            'nombre' => 'Diseño',
            'slug' => 'diseno',
        ]);

        $articuloLaravel = Articulo::factory()
            ->for($laravel, 'categoria')
            ->create([
                'titulo' => 'Construyendo aplicaciones con Laravel',
            ]);

        $articuloDiseno = Articulo::factory()
            ->for($diseno, 'categoria')
            ->create([
                'titulo' => 'Principios de diseño visual',
            ]);

        $this->get(route('articulos.index', ['categoria' => 'laravel']))
            ->assertOk()
            ->assertSee($articuloLaravel->titulo)
            ->assertDontSee($articuloDiseno->titulo)
            ->assertSee('Limpiar filtro');
    }

    public function test_article_card_displays_featured_image_and_date(): void
    {
        $articulo = Articulo::factory()->create([
            'titulo' => 'Artículo con imagen',
            'imagen' => 'articulos/imagen-prueba.jpg',
            'created_at' => '2026-08-15 10:00:00',
        ]);

        $this->get(route('articulos.index'))
            ->assertOk()
            ->assertSee('storage/articulos/imagen-prueba.jpg', false)
            ->assertSee('Imagen destacada de ' . $articulo->titulo)
            ->assertSee('Publicado el 15/08/2026');
    }

    public function test_article_detail_is_accessible_by_slug(): void
    {
        $categoria = Categoria::factory()->create([
            'nombre' => 'Programación',
            'slug' => 'programacion',
        ]);

        $articulo = Articulo::factory()
            ->for($categoria, 'categoria')
            ->create([
                'titulo' => 'Buenas prácticas en Laravel',
                'slug' => 'buenas-practicas-en-laravel',
                'contenido' => 'Contenido seguro del artículo.',
                'created_at' => '2026-08-20 10:00:00',
            ]);

        $this->get(route('articulos.show', $articulo))
            ->assertOk()
            ->assertSee($articulo->titulo)
            ->assertSee($categoria->nombre)
            ->assertSee('Publicado el 20/08/2026')
            ->assertSee('Contenido seguro del artículo.');
    }

    public function test_article_without_uploaded_image_uses_category_cover(): void
    {
        $categoria = Categoria::factory()->create([
            'nombre' => 'Diseño',
            'slug' => 'diseno',
        ]);

        Articulo::factory()
            ->for($categoria, 'categoria')
            ->create([
                'titulo' => 'Artículo sin imagen subida',
                'imagen' => null,
            ]);

        $this->get(route('articulos.index'))
            ->assertOk()
            ->assertSee('images/articulos/diseno.webp', false);
    }
}
