<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function produtos(){
        return $this->hasMany(Produto::class);
    }
    protected $fillable = ['nome','preco','categoria_id'];
    
}
