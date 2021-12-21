<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductRatingResource extends JsonResource
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
            "id" => $this->id,
            "user_name" => $this->user->FullName,
            "profile_pic" => $this->user->ProfilePicture ? asset('storage/UserProfile/'.$this->user->ProfilePicture->name) : asset('images/user.png'),
            "rating" => $this->rating,
            "title" => $this->title,
            "post_at" => Carbon::parse($this->created_at)->format('jS F Y h:m')
        ];
    }
}
