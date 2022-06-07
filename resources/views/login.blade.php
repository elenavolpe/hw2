<html>
    <head>
        <title>Stay Fit</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href='{{ asset( 'css/login.css' ) }}' />
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        <script src='{{ asset( 'js/login.js' ) }}' defer="true"></script>
    </head>
    <body>
        <article>
            <nav>
                <span id="nome">Stay Fit</span>
                <a href="home">Home</a>
                <a href="corsi">Corsi</a>
                <a href="account">La mia scheda</a>

            <div class="menu-hidden" id="menuT">
                <a href="home">Home</a>
                <a href="corsi">Corsi</a>
                <a href="account">La mia scheda</a>
            </div>
                
                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </nav>

            <section>
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
            </section>

            <footer>
                <p>Elena</p>
                <p>Volpe</p>
                <p>1000001186</p>
                <p>A.A. 2021/2022</p>
            </footer>
        </article>
    </body>
</html>