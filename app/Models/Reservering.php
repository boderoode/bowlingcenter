<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservering extends Model
{
    use HasFactory;

    protected $table = 'reserverings';

    protected $fillable = [
        'persoon_id',
        'reserverings_nummer',
        'naam',
        'datum',
        'aantal_uren',
        'begin_tijd',
        'eind_tijd',
        'aantal_volwassenen',
        'aantal_kinderen',
        'is_actief',
        'opmerking',
    ];

    public function persoon()
    {
        return $this->belongsTo(Persoon::class);
    }
}
