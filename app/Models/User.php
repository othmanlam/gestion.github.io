<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'utilisateurs'; // Définir la table correcte

    protected $fillable = [
        'nom', // Modifier "name" en "nom"
        'email',
        'mot_de_passe', // Modifier "password" en "mot_de_passe"
        'role'
    ];

    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->mot_de_passe; // Laravel utilisera "mot_de_passe" au lieu de "password"
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }
    public function technicien()
{
    return $this->hasOne(Technicien::class, 'utilisateur_id');
}
public function interventions()
{
    return $this->hasMany(Intervention::class, 'technicien_id');
}

}
