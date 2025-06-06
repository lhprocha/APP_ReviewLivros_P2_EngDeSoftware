<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Livro;

class Autor extends Model
{
    protected $table = 'autores';
    protected $fillable = ['nome', 'data_nascimento', 'biografia'];

    public function livros() {
    return $this->hasMany(Livro::class);
}
}
