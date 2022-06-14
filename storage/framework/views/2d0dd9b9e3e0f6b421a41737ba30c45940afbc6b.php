<!doctype html>
    <head>
        <title>Stay Fit</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo $__env->yieldContent('css'); ?>
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
        <?php echo $__env->yieldContent('script'); ?>
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
                <?php echo $__env->yieldContent('content'); ?>
            </section>

            <footer>
                <p>Elena</p>
                <p>Volpe</p>
                <p>1000001186</p>
                <p>A.A. 2021/2022</p>
            </footer>
        </article>
    </body>
</html><?php /**PATH C:\xampp\htdocs\hw2\resources\views/layouts/log.blade.php ENDPATH**/ ?>