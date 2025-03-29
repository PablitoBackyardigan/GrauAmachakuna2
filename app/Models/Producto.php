<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category',
        'price',
        'image',
        'file_uri', // Agregar esta línea
    ];
}
