<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_serie',
        'modele',
        'emplacement',
        'responsable_id',
        'etat'
    ];

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }
}
