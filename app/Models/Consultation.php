<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

     protected $fillable = [
        'rendez_vous_id',
        'diagnostic',
        'traitement',
        'date_consultation',
    ];

    public function rendezVous()
    {
        return $this->belongsTo(RendezVous::class);
    }
}
