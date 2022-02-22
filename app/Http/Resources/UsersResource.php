<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
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
            'id' => $this->id,
            'role' => $this->role,
            'f_name' => $this->f_name,
            'l_name' => $this->l_name,
            'dob' => $this->dob,
            'email' => $this->email,
            'contact_no' => $this->contact_no,
        ];
    }
}
