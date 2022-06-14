<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model;

class Commento extends Model{

    protected $connection = 'mongodb';

    use HasFactory, Notifiable;
    
    protected $collection= 'commenti';
    public $timestamps= false;

    protected $fillable = [
        'utente', 'commento', 'data'
    ];

    /*public function utente() {
        return $this->belongsTo("App\Models\Iscritto");
    }*/
}
?>