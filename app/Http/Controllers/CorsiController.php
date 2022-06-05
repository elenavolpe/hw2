<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Corso;
use App\Models\Iscritto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CorsiController extends Controller {

    public function corsi(){
        if(session('username') != null) {
            return view('corsi');
        }
        else {
            return redirect('login');
            //->with('csrf_token', csrf_token()); //vedi questa parte del csrf forse non serve in questo caso
        }
    }

    public function carica(){
        $nome=session('username');
        $corsi = DB::select("SELECT *,
        EXISTS(SELECT utente from likes where nome_corso=nome and utente='$nome' ) as liked,
        EXISTS(SELECT utente from scheda where nome_corso=nome and utente='$nome' ) as added
        from corso");
        return json_encode($corsi);
    }

    public function comanda_like($corso){
        Iscritto::where('username',session('username'))->first()->likes()
            ->toggle([
                'nome_corso' => $corso,
                ]);
    }

    public function aggiungi_corso($corso){
        $select=Corso::where('nome',$corso)->first();
        $ora=$select['ora'];
        $giorno=$select['giorno'];
        $utente=Iscritto::where('username',session('username'))->first();
        $utente->scheda()->attach(
            session('username'),
            [ 
            'nome_corso' => $corso,
            'giorno' => $giorno,
            'ora' => $ora,
            ]);
    }

    public function togli_corso($corso){
        $utente=Iscritto::where('username',session('username'))->first();
        $utente->scheda()->detach($corso);
    }
}
?>