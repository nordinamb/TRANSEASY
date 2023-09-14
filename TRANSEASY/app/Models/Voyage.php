<?php

namespace App\Models;
use App\Models\Place ;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    use HasFactory;

    protected $fillable = [
        'depart',
        'destination',
        'seatsavb',
        'date_depart',
        'heure_depart',
        'price'
    ];
    public function getHeureDepartAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('H:i:s', $value)->format('H:i');
    }
    
    public function getDateFormat()
    {
        return 'Y-m-d H:i';
    }

    protected $casts = [
        'heure_depart' => 'datetime:H:i',
    ];

    public function places()
    {
        return $this->hasMany(Place::class);
    }

    protected static function booted()
    {
        static::created(function ($voyage) {
            for ($i = 1; $i <= 40; $i++) {
                $voyage->places()->create([
                    'number' => $i,
                ]);
            }
        });
    }
}
