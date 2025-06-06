<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LivroService;
use App\Http\Resources\LivroResource;
use App\Http\Requests\LivrostoreRequest;
use App\Http\Requests\LivroUpdateRequest;
use App\Models\Livro;

class LivroController extends Controller
{
     private LivroService $livroService;
    public function __construct(LivroService $livroService)
    {
        $this->livroService = $livroService;
    }

    public function get(){
        $livros = $this->livroService->get();
        return LivroResource::collection($livros);
        
    }

     public function details(int $id){
        $livros = $this->livroService->details($id);
        return new LivroResource($livros);
        
    }
    public function store(LivrostoreRequest $request){
        $data = $request->validated();
        $livros = $this->livroService->store($data);
        return new LivroResource($livros);
    }
    public function update(int $id, LivroUpdateRequest $request){
        $data = $request->validated();
        $livros = $this->livroService->update($id, $data);
        return new LivroResource($livros);
    }

    public function delete(int $id){
        $livros = $this->livroService->delete($id);
        return new ($livros);
    }

    public function reviews($id){
        $livro = Livro::with('reviews')->findOrFail($id);
        return new LivroResource($livro);
    }

    public function livrosCompletos(){
        $livros = Livro::with(['reviews', 'autor', 'genero'])->get();
        return LivroResource::collection($livros);
    }

}