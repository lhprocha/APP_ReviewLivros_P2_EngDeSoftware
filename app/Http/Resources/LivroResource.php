<?php

namespace App\Http\Resources;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LivroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'tituo'=>$this->titulo,
            'sinopse'=>$this->sinopse,
            'genero_id'=>$this->genero_id,
            'autor_id'=>$this->autor_id, 
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),
            'autor' => new AutorResource($this->whenLoaded('autor')),
            'genero' => new GeneroResource($this->whenLoaded('genero')),

            
        ];
    }
}
