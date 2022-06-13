@extends('layouts.log')

@section('css')
<link rel="stylesheet" href='{{ asset( 'css/login.css' ) }}' />
@endsection

@section('script')
<script src='{{ asset( 'js/login.js' ) }}' defer="true"></script>
@endsection

@section('content')
        <div id="log">
                    <div>
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <p><label>Username<input type='text' name='username'></label></p>
                            <p><label>Password<input type='password' name='password'></label></p>
                            @if(isset($errore))
                            <p class = 'errore' >{{ $errore }}</p>
                            @endif
                            <p><label>&nbsp<input type='submit' name='invio' value='entra'></label></p>
                        </form>
                        Non fai ancora parte del nostro team? <a href="registrazione">registrati</a>
                    </div>
                </div>
@endsection