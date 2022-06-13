<!doctype html>
    <head>
        <title>Stay Fit</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('css')
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        @yield('script')
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
                @yield('content')
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