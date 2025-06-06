<?php
namespace App\Services;

use App\Repositories\GeneroRepository;

class generoService
{
    private GeneroRepository $generoRepository;
    public function __construct(GeneroRepository $generoRepository)
    {
        $this->generoRepository = $generoRepository;
    }

    public function get(){
        $genero = $this->generoRepository->get();
        return $genero;
    }

    public function details(int $id){
        return $this->generoRepository->details($id);
    }

    public function store(array $data){
        return $this->generoRepository->store($data);
    }

    public function update(int $id, array $data){
        return $this->generoRepository->update($id, $data);
    }

    public function delete(int $id){
        return $this->generoRepository->delete($id);
    }

    public function livrosDoGenero(int $id){
        return $this->generoRepository->livrosDoGenero($id);
    }

    public function generosWithLivros(){
        return $this->generoRepository->generosWithLivros();
    }



}