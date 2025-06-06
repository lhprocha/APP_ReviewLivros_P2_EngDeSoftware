<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AutorService;
use App\Http\Resources\AutorResource;
use App\Http\Requests\AutorstoreRequest;
use App\Http\Requests\AutorUpdateRequest;

class AutorController extends Controller
{
    private AutorService $autorService;
    public function __construct(AutorService $autorService)
    {
        $this->autorService = $autorService;
    }

    public function get(){
        $autores = $this->autorService->get();
        return AutorResource::collection($autores);
        
    }

     public function details($id){
        $autores = $this->autorService->details($id);
        return new AutorResource($autores);
        
    }
    public function store(AutorStoreRequest $request){
        $data = $request->validated();
        $autores = $this->autorService->store($data);
        return new AutorResource($autores);
    }
    public function update(int $id, AutorUpdateRequest $request){
        $data = $request->validated();
        $autores = $this->autorService->update($id, $data);
        return new AutorResource($autores);
    }

    public function delete(int $id){
        $autores = $this->autorService->delete($id);
        return new AutorResource($autores);
}

    public function livrosDoAutor($id){
        $livros = $this->autorService->livrosDoAutor($id);
        return new AutorResource($livros);
    }

    public function autoresComLivros(){
        $autores = $this->autorService->autoresComLivros();
        return AutorResource::collection($autores);
    }
}
