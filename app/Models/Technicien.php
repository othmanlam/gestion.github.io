<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technicien extends Model
{
    use HasFactory;

    protected $fillable = [
        'utilisateur_id',
        'specialite',
        'charge_de_travail',
        'disponible',
    ];

    // Relation inverse avec User
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }
    public function interventions()
{
    return $this->hasMany(Intervention::class);
}

}
