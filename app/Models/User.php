<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    public function coursEnseignes()
    {
        return $this->hasMany(Cours::class, 'enseignant_id');
    }

    public function coursSuivis()
    {
        return $this->belongsToMany(Cours::class, 'cours_etudiants', 'eleve_id', 'cours_id');
    }

    public function messagesEnvoyes()
    {
        return $this->hasMany(Message::class, 'expediteur_id');
    }

    public function messagesRecus()
    {
        return $this->hasMany(Message::class, 'destinataire_id');
    }
}
