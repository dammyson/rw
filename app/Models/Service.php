<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = ['id', 'name', 'washing_price', 'ironing_price', 'cleaning_price', 'exp_washing_price', 'exp_ironing_price', 'exp_cleaning_price',];
}
