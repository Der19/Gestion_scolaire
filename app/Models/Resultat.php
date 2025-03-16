<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'eleve_id', 'note'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function eleve()
    {
        return $this->belongsTo(User::class, 'eleve_id');
    }
}
