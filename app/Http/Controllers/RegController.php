<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Iscritto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegController extends Controller {

    public function registrazione(){ //VEDI SE VA BENE
        //se sono già loggata va ad account
        if(session('username') != null) {
            return redirect('account');
        }
        else {
            return view('registrazione');
            //->with('csrf_token', csrf_token()); //vedi questa parte del csrf forse non serve in questo caso
        }
    }

    protected function insert(){
        $request=request();
        //prima vedo se c'è qualche errore
        if($this->checkErrors($request) != true){ //SISTEMA PERCHE GLI DEVI PASSARE I DATI

            $newIscritto =  Iscritto::create([
                'username' => $request['username'],
                'password' => $request['password'],
                'nome' => $request['nome'],
                'cognome' => $request['cognome'],
                'email' => $request['email'],
                'eta' => $request['eta'],
                'genere' => $request['genere'], //non so se  ci vuole veramente la ','
                ]);

                if ($newIscritto) { //la voglio fare solo nel login
                    //Session::put('username', $newUser->username);
                    return redirect('login');
                }
                else {
                    return redirect('registrazione');
                }
        }
        else 
            return redirect('registrazione');
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
        if($username !== null) //vedi se è giusto
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
        else{ //vedi se è giusto
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

    //LE USA QUANDO FA LA FETCH NEL JAVASCRIPT
    public function checkUsername($query) {
        $trovato = Iscritto::where('username', $query)->first();
        if($trovato!=null){
            return json_encode(true);
        }
        else{
            return json_encode(false);
        }
    }
    //LE USA QUANDO FA LA FETCH NEL JAVASCRIPT
    public function checkEmail($query) {
        $trovato = Iscritto::where('email', $query)->first();
        if($trovato!=null){
            return json_encode(true);
        }
        else{
            return json_encode(false);
        }
    }

    /*public function index() { //VEDI MEGLIO A COSA SERVE
        return view('registrazione');
    }*/
}
?>