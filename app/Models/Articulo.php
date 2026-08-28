<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $table = 'articulos';

    protected $fillable = [
        'categoria_id',
        'titulo',
        'slug',
        'descripcion',
        'contenido',
        'imagen'
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function getFeaturedImageUrlAttribute(): string
    {
        if (filled($this->imagen)) {
            return asset('storage/' . ltrim($this->imagen, '/'));
        }

        $categoria = $this->categoria?->slug;

        $portada = in_array(
            $categoria,
            ['tecnologia', 'diseno', 'negocios'],
            true
        ) ? $categoria : 'tecnologia';

        return asset("images/articulos/{$portada}.webp");
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
