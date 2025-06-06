<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Livro;
use App\Models\Usuario;

class Review extends Model
{

    protected $table = 'reviews';
    protected $fillable = ['nota','texto', 'livro_id', 'usuario_id'];

    public function usuario() {
    return $this->belongsTo(Usuario::class);
}

public function livro() {
    return $this->belongsTo(Livro::class);
}

}
