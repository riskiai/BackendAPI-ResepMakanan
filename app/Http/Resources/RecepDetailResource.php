<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecepDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'judul_resep' => $this->judul_resep,
            'porsi' => $this->porsi,
            'waktu' => $this->waktu,
            'deskripsi' => $this->deskripsi,
            'author' => $this->author,
            'writer' => $this->whenLoaded('writer'),
            'bahan' => $this->bahan,
            'langkah' => $this->langkah,
            'image' => $this->image,
            'created_at' => date_format($this->created_at, "Y/m/d H:i:s"),
        ];
    }
}
