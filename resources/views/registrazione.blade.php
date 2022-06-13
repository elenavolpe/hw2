@extends('layouts.log')

@section('css')
<link rel="stylesheet" href='{{ asset( 'css/registrazionecss.css' ) }}' />
@endsection

@section('script')
<script src='{{ asset( 'js/registrazione.js' ) }}' defer="true"></script>
@endsection

@section('content')
    <div id="rec">
        <form method="post" action="{{ route('registrazione') }}">
            @csrf
                <div class="name">
                    <p><label>Nome<input type='text' class="input" name='nome'></label></p>
                    <span class="spanhidden">Campo Obbligatorio</span>
                </div>

                <div class="surname">
                    <p><label>Cognome<input type='text' class="input" name='cognome'></label></p>
                    <span class="spanhidden">Campo Obbligatorio</span>
                </div>

                <div class="username">
                    <p><label>Username<input type='text' class="input" name='username'></label></p>
                    <span class="spanhidden">Username già in uso</span>
                </div>
                            
                <div class="eta">
                    <p><label>Età<input type='text' class="input" name='eta'></label></p>
                    <span class="spanhidden">Campo Obbligatorio</span>
                </div>

                <div class="email">
                    <p><label>Email<input type='text' class="input" name='email'></label></p>
                    <span class="spanhidden">Email già in uso</span>
                </div>

                <div class="password">
                    <p><label>Password<input type='password' class="input" name='password'></label></p>
                    <span class="spanhidden">La password deve avere caratteri maiuscoli, minuscoli, numeri e caratteri speciali(Non sono ammessi "_")</span>
                </div>
                <p><label><input type='radio' name='genere' value='m'> Maschio</label></p>
                <p><label><input type='radio' name='genere' value='f'> Femmina</label></p>
                @if(isset($errore))
                    <p class="errore">{{$errore}}</p>
                @endif
                <p><label>&nbsp<input type='submit' class='submit' name='invio' value='registrati'></label></p>
                </form>
    </div>
@endsection