<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    //declaro el atributo fillable
    // para que Laravel pueda llenarlo en la base de datos
    protected $fillable = ['name', 'photo'];
}
