<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\Iscritto;
use App\Models\Commento;
use App\Models\Corso;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {

    public function load_preferiti(){
        $preferiti = Corso::orderByDesc("num_likes")->limit(3)->get();
        return json_encode($preferiti);
    }

    public function load_comments(){
        return Commento::all(); 
    }

    public function carica_commento($commento){
        if(session('username')!=null){
            $newcomment = new Commento(['commento' => $commento,
                                        'data' => now(),
                                        'utente' => session('username')]);
            $newcomment->save();
            $var=true;
        }
        else{
            $var=false;
        }
        return json_encode($var);
    }

    public function generate_exercise(){
        $url_mainimage="https://wger.de/api/v2/exerciseimage/?format=json&is_main=True";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL,$url_mainimage);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }

    public function spotify_track($track){ 
        $urltoken="https://accounts.spotify.com/api/token";
        $track=urlencode($track);

        //RICHIESTA TOKEN
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $urltoken);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //eseguo la POST
        curl_setopt($curl, CURLOPT_POST, 1);
        //body
        curl_setopt($curl, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
        //header
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode(env('Spotify_client_id').':'.env('Spotify_client_secret')))); 

        $token =json_decode(curl_exec($curl), true);
        curl_close($curl);

        //RICERCA TRACCIA
        $urlSpotify="https://api.spotify.com/v1/search?type=track&q=";
        $url=$urlSpotify .$track;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //header e token
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token["access_token"])); 
        $result=curl_exec($curl);
        return $result;
        curl_close($curl);
    }
}
?>