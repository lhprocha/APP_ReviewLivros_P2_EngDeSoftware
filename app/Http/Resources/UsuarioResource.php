<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id'=>$this->id,
            'nome'=>$this->nome,
            'email'=>$this->email,
            'reviews' => ReviewResource::Collection( $this->whenLoaded('reviews')),


        ];
    }
}
