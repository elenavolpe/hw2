<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Iscritto as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Iscritto extends Model{

    use HasFactory, Notifiable;

    protected $table= 'iscritto'; 
    protected $primaryKey= 'username';
    protected $autoIncrement= false;
    protected $keyType= "string";
    public $timestamps= false;

    protected $fillable = [
        'username', 'email', 'nome', 'cognome','eta', 'password', 'genere'
    ];

    public function commento()
    {
        return $this->hasMany("App\Models\Commento","utente");
    }

    public function scheda()
    { //tabella scheda N-N
        return $this->belongsToMany("App\Models\Corso",'scheda','utente','nome_corso')
            ->withPivot('giorno','ora');
    }

    public function likes()
    { //tabella likes N-N
        return $this->belongsToMany("App\Models\Corso",'likes','utente','nome_corso');
    }
}
?>