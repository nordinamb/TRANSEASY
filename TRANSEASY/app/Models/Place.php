<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
       'status',
    //    'checkout_id'
    ];

    public function voyage()
    {
        return $this->belongsTo(Voyage::class);
    }

    public function checkouts(): HasMany
    {
        return $this->hasMany(Checkouts::class, 'checkouts_id', 'id');
    }
}
