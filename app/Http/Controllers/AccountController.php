<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Iscritto;
use App\Models\Corso;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller {

    public function account(){
        if(session('username') != null) {
            return view('account');
        }
        else {
            return redirect('login');
        }
    }

    public function carica(){
        $corsi=Iscritto::where('username',session('username'))->first()->scheda()->orderBy('ora')->get();
        return $corsi;
    }
}
?>