<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsuarioResource;
use Illuminate\Http\Request;
use App\Services\UsuarioService;
use App\Http\Requests\UsuariostoreRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    private UsuarioService $usuarioService;
    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function get(){
        $usuarios = $this->usuarioService->get();
        return UsuarioResource::collection($usuarios);
        
    }

     public function details($id){
        $usuarios = $this->usuarioService->details($id);
        return new UsuarioResource($usuarios);
        
    }
    public function store(UsuarioStoreRequest $request){
        $data = $request->validated();
        $usuario = $this->usuarioService->store($data);
        return new UsuarioResource($usuario);
    }
    public function update(int $id, UsuarioUpdateRequest $request){
        $data = $request->validated();
        $usuarios = $this->usuarioService->update($id, $data);
        return new UsuarioResource($usuarios);
    }

    public function delete(int $id){
        $usuarios = $this->usuarioService->delete($id);
        return new UsuarioResource($usuarios);

}
    public function listReviewUser(int $id){
        $review = Usuario::with('reviews')->findOrFail($id);
        return new UsuarioResource($review);
    }
}