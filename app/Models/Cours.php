<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'description', 'enseignant_id'];

    public function enseignant()
    {
        return $this->belongsTo(User::class, 'enseignant_id');
    }

    public function eleves()
    {
        return $this->belongsToMany(User::class, 'cours_etudiants', 'cours_id', 'eleve_id');
    }

    public function quiz()
    {
        return $this->hasMany(Quiz::class);
    }
}
