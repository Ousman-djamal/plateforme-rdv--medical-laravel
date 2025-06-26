<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'patient_id',
        'medecin_id',
        'date_rdv',
        'heure_rdv',
        'statut',
        'motif',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);//  Le modèle actuel (rdv) appartient à un patient; Chaque rdv est lié à un seul patient
    }

    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }

    public function consultation()
    {
        return $this->hasOne(Consultation::class);// Le modèle actuel possède un seul autre modèle. un rdv a un seul consultation
    }
}
