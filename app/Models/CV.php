<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    protected $table = 'cvs';

    protected $fillable = [
        'user_id', 
        'experience',
        'competences',
        'formation',
        'autres_informations',
        'cv_path'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
