<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'mot_de_passe',
        'telephone',
        'adresse_cabinet',
        'ville',
        'disponibilite',
        'specialite_id',
        'user_id',
    ];

    // Relation avec user
    public function user()
    {
        return $this->belongsTo(User::class);//  Le modèle actuel (Medecin) appartient à un User; Chaque médecin est lié à un seul user
    }

    // Relation avec spécialité
    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }

    // Relation avec les rendez-vous
    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class);//Le modèle actuel(medecin) possède plusieurs autres modèles. 1 medecin a +sieur rdv 
    }
}
