<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id',
        'sexe',
        'nom',
        'prenom',
        'email',
        'telephone',
        'mot_de_passe',
        'adresse',
        'groupe_sanguin',
        'date_naissance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);//  Le modèle actuel (patient) appartient à un User; Chaque patient est lié à un seul user
    }

    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class);//Le modèle actuel(patient) possède plusieurs autres modèles. 1 patient peut  avoir +sieur rdv 
    }
}
