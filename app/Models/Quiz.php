<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'cours_id'];

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    public function resultats()
    {
        return $this->hasMany(Resultat::class);
    }
}
