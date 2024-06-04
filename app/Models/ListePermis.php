<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListePermis extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'immatriculation',
        'type_permis',
        'proprietaire_chauffeur',
        'type_vehicule',
        'zone_acces',
        'date_expiration',
        'raison_acces',
        'annee_courante',
        'numero'
    ];
}
