<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Commento extends Model{

    use HasFactory, Notifiable;
    
    protected $table= 'forum';
    /*protected $primaryKey= 'nome';
    protected $autoIncrement= false;
    protected $keyType= "string";*/
    public $timestamps= false;

    protected $fillable = [
        'utente', 'commento', 'data'
    ];

    public function utente() {
        return $this->belongsTo("App\Models\Iscritto");
    }
}
?>