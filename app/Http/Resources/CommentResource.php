<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'comment_recep' => $this->comment_recep,
            'user_id' => $this->user_id,
            'comentator' => $this->whenLoaded('commentator'),
            'created_at' => date_format($this->created_at, "Y-m-d H:i:s"),
        ];
    }
}
