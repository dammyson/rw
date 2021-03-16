<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Vanguard\Services\User\FormatUserList;

class UserResource extends JsonResource
{
     /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' =>  $this->id,
            'email' =>  $this->email,
            'first_name' =>  $this->first_name,
            'last_name' =>  $this->last_name,
            'phone_number' =>  $this->phone_number,
            'address' =>  $this->address,
            'avatar' =>  $this->avatar,
        ];
    }
}