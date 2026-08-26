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
    public function categorias()
    {
        return $this->belongsTo(Categoria::class);
    }
}
