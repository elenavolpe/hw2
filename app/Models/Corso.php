<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Corso extends Model{

    use HasFactory, Notifiable;

    protected $table= 'corso';
    protected $primaryKey= 'nome';
    protected $autoIncrement= false;
    protected $keyType= "string";
    public $timestamps= false;

    protected $fillable = [
        'nome', 'descrizione', 'immagine', 'giorno','ora', 'num_likes'
    ];

    public function scheda()
    { //tabella scheda N-N
        return $this->belongsToMany("App\Models\Iscritto",'scheda','nome_corso','utente')
            ->withPivot('giorno','ora');
    }

    public function likes()
    { //tabella like N-N
        return $this->belongsToMany("App\Models\Iscritto",'likes','nome_corso','utente');
    }
}
?>