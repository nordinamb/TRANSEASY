<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
            'place_id',
            'first_name',
            'last_name',
            'email',
            'addresse',
            'phone_number',
            'ville',
            'code_postal',
            'token'
                ];
}
