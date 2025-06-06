<?php
namespace App\Services;

use App\Repositories\LivroRepository;

class LivroService
{
    private LivroRepository $livroRepository;
    public function __construct(LivroRepository $livroRepository)
    {
        $this->livroRepository = $livroRepository;
    }

    public function get(){
        $livros = $this->livroRepository->get();
        return $livros;
    }

    public function details(int $id){
        return $this->livroRepository->details($id);
    }

    public function store(array $data){
        return $this->livroRepository->store($data);
    }

    public function update(int $id, array $data){
        return $this->livroRepository->update($id, $data);
    }

    public function delete(int $id){
        return $this->livroRepository->delete($id);
    }

    public function reviews($id){
        return $this->livroRepository->reviews($id);
    }

    public function livrosCompletos(){
        return $this->livroRepository->livrosCompletos();
    }

}