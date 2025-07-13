<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function categoria(){
       return $this->belongsTo(Categoria::class);
    }
    protected $fillable = ['nome', 'preco', 'categoria_id'];
}
