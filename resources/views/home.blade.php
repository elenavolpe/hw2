<!DOCTYPE html>
<html>
<head>
    <title>Stay Fit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href='{{ asset( 'css/homecss.css' ) }}' />
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Mono:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <script src='{{ asset( 'js/homejs.js' ) }}' defer="true"></script>
</head>
<body>
    <article>
        <nav>
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

        <header>   
            <div id="overlay">     
                <span id="titolo">Stay Fit</span>
                <a href="registrazione"><button>Unisciti a noi</button></a>
            </div>
        </header>

        <section>
            <div id="benvenuto">Benvenuto nel sito ufficiale della nuovissima palestra "Stay Fit", il perfetto mix tra body building,tenersi in forma e rilassamento muscolare, abbiamo corsi di tutti i tipi!</br>
            </div>
            <div id="preferiti">
                <span id="ecco">Ecco i preferiti dei nostri iscritti:</span>
            </div>

                <div class="api">
                    <div id="Exe_api">
                        Vuoi sfidare la sorte con noi?</br>
                        Clicca il pulsante e genereremo un esercizio a caso per te!</br>
                        <button id="Exercise">Genera un esercizio</button>
                        <div id="gallery-view"></div>
                    </div>

                    <form id="form2">
                        Stanco di annoiarti mentre ti alleni?</br>
                        Comincia ad allenarti anche tu in compagnia della musica!</br>
                        inserisci un titolo </br>
                        <input type="text" id="canzone" />
                        <input type="submit" value="cerca">
                        <div id="music-view"></div>
                    </form>
                </div>

            <div class="forum">
                <span id="forumnome">Forum</span>
                <span class="spanhidden" id="forumspan">Puoi inserire commenti solo se hai fatto il login</span>
                <form id="formforum">
                    <textarea type="text" id="commento"></textarea>
                    <input type="submit" value="scrivi">
                </form>
                <div id="commenti">
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