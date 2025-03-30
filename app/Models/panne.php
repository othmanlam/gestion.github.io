<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panne extends Model
{
    use HasFactory;

    protected $fillable = [
        'poste_id',
        'employe_id',
        'type_panne',
        'date_signalement',
        'statut',
        'responsable_id', // Ajout de responsable_id ici
    ];

    // Relation avec le poste
    public function poste()
    {
        return $this->belongsTo(Poste::class, 'poste_id');
    }

    // Relation avec l'utilisateur responsable
    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }
}
