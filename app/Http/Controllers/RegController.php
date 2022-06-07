<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Iscritto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegController extends Controller {

    public function registrazione(){
        //se sono già loggata va ad account
        if(session('username') != null) {
            return redirect('account');
        }
        else {
            return view('registrazione');
        }
    }

    protected function insert(){
        $request=request();
        //prima vedo se c'è qualche errore
        if($this->checkErrors($request) != true){

            $newIscritto =  Iscritto::create([
                'username' => $request['username'],
                'password' => $request['password'],
                'nome' => $request['nome'],
                'cognome' => $request['cognome'],
                'email' => $request['email'],
                'eta' => $request['eta'],
                'genere' => $request['genere'],
                ]);

                if ($newIscritto) { 
                    return redirect('login');
                }
                else {
                    return view('registrazione')->with(['errore'=>"Controlla bene i campi"]);
                }
        }
        else 
            return view('registrazione')->with(['errore'=>"Controlla bene i campi"]);
    }

    private function checkErrors($data){
        $errore=false;
        //verifico nome
        if(!preg_match('/^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]\s?)+$/', $data['nome'])){ 
            $errore=true;
        }
        //verifico cognome
        if(!preg_match('/^([a-zA-Z\xE0\xE8\xE9\xF9\xF2\xEC\x27]\s?)+$/', $data['cognome'])){ 
            $errore=true;
        }
        //verifico username
        $username=Iscritto::where('username', $data['username'])->first();
        if($username !== null)
        {
            $errore=true;
        }
        //verifico eta
        if(!is_numeric($data['eta'])){
            $errore=true;
        }
        //verifico email
        if(!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $data['email'])){ 
            $errore=true;
        }
        else{
            $email=Iscritto::where('email', $data['email'])->first();
            if($email !== null)
            {
                $errore=true;
            }
        }
        //verifico password
        if(!preg_match('/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/',$data['password'])) {
            $errore=true;
        }
        return $errore;
    }

    public function checkUsername($query) {
        $trovato = Iscritto::where('username', $query)->first();
        if($trovato!=null){
            return json_encode(true);
        }
        else{
            return json_encode(false);
        }
    }
    
    public function checkEmail($query) {
        $trovato = Iscritto::where('email', $query)->first();
        if($trovato!=null){
            return json_encode(true);
        }
        else{
            return json_encode(false);
        }
    }
}
?>