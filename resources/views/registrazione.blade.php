<html>
    <head>
        <title>Stay Fit</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href='{{ asset( 'css/registrazionecss.css' ) }}' />
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        <script src='{{ asset( 'js/registrazione.js' ) }}' defer="true"></script>
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
                            
                            <p><label>&nbsp<input type='submit' class='submit' name='invio' value='registrati'></label></p>
                        </form>
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