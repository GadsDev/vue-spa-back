<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (integer) $request->id,
            'first_name' => (string) $request->first_name,
            'last_name' => (string) $request->last_name,
            'email' => (string) $request->email,
            'created_at' => (string) $request->created_at
        ];
    }
}
