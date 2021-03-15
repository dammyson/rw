<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidTrait;

class ActivityDetail extends Model
{
    use UuidTrait;
    protected $fillable = ['id', 'activity_id', 'service_id', 'service_category', 'quantity'];
}
