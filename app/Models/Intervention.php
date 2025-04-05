<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;

    protected $table = 'interventions'; // Nom de la table dans la base de données

    protected $fillable = [
        'panne_id',
        'technicien_id',
        'description',
        'pieces_remplacees',
        'date_fin',
        'statut_intervention',
    ];
   
    // Relation avec la table Pannes
    public function panne()
    {
        
            return $this->belongsTo(panne::class, 'panne_id');
        }    

    // Relation avec la table Techniciens
    public function technicien()
    {
        return $this->belongsTo(Technicien::class, 'technicien_id');
    }
    public function utilisateur()
{
    return $this->belongsTo(User::class, 'utilisateur_id', 'id');
}
}
