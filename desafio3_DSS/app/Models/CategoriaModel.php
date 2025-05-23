<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['nombre'];

    public function productos(){
        return $this->hasMany(ProductoModel::class, 'categoria_id');
    }
}
