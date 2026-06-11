<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';

    protected $fillable = ['descripcion'];

    public function productos() 
    {
        return $this->hasMany(Producto::class, 'id', 'id_categoria');
    }
}
