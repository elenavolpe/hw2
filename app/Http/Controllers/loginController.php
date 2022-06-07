<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Iscritto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller {

    public function login() {
        //se sono già loggata va ad account
        if(session('username') != null) {
            return redirect("account");
        }
        else {
            return view('login');
        }
    }

    public function checkLogin(){
        $utente=Iscritto::where('username', request('username'))->where('password', request('password'))->first();
        if($utente != null){
            Session::put('username', $utente->username);
            return redirect('account');
        }
        else{
            return view('login')->with(['errore'=>"Credenziali non valide"]);
        }
    }

    public function logout(){
        Session::flush();
        return redirect('login');
    }
}
?>