<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use UuidTrait;
    protected $fillable = ['id', 'user_id', 'first_name', 'last_name', 'email', 'phone_number', 'address', 'type', 'pickup_time'];

    public function details()
    {
        return $this->hasMany(ActivityDetail::class);
    }
}

