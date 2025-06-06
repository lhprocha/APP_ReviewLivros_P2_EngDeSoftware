<?php
namespace App\Repositories;

use App\Models\Livro;

class LivroRepository
{

    public function get(){
        return Livro::all();
    }

    public function details(int $id){
        return Livro::findOrFail($id);
    }
     public function store(array $data){
        return Livro::create($data);
    }

    public function update(int $id, array $data){
        $livros = $this->details($id);
        $livros->update($data);
        return $livros;
    }

    public function delete(int $id){
        $livros = $this->details($id);
        $livros->delete();
        return $livros;
    }

    public function getWithReview(int $id){
        $livros = Livro::with('reviews')->get();
        return $livros;
    }

    public function reviews($id){
    $livro = Livro::with('reviews')->findOrFail($id);
    return $livro;
    }


    public function livrosCompletos()
    {
        return Livro::with(['reviews', 'autor', 'genero'])->get();
    }

    
}

