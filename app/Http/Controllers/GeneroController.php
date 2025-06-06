<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeneroService;
use App\Http\Resources\GeneroResource;
use App\Http\Requests\GenerostoreRequest;
use App\Http\Requests\GeneroUpdateRequest;
use App\Http\Resources\LivroResource;

class GeneroController extends Controller
{
    private GeneroService $generoService;
    public function __construct(GeneroService $generoService)
    {
        $this->generoService = $generoService;
    }

    public function get(){
        $generos = $this->generoService->get();
        return GeneroResource::collection($generos);
        
    }

     public function details($id){
        $generos = $this->generoService->details($id);
        return new GeneroResource($generos);
        
    }
    public function store(GeneroStoreRequest $request){
        $data = $request->validated();
        $generos = $this->generoService->store($data);
        return new GeneroResource($generos);
    }
    public function update(int $id, GeneroUpdateRequest $request){
        $data = $request->validated();
        $generos = $this->generoService->update($id, $data);
        return new GeneroResource($generos);
    }

    public function delete(int $id){
        $generos = $this->generoService->delete($id);
        return new GeneroResource($generos);
}

    public function livrosDoGenero(int $id){
        $livros = $this->generoService->livrosDoGenero($id);
        return new GeneroResource($livros);


}
    public function generosWithLivros(){
        $generos = $this->generoService->generosWithLivros();
        return GeneroResource::collection($generos);
    }
}