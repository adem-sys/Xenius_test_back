<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffreEmploi extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',
        'competences_requises',
        'date_limite',
        'autres_informations',
    ];

    public function createur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
