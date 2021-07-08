<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Homework WP: O46001831</title>
        <link rel="stylesheet" href="{{ asset('css/login.css') }}"/>  
    </head>

    <body>
         <header>            
            <div id="overlay"></div>
            <div class='cont'>
                <div class='title'>TIMMUCCHI</div>
            </div>

            <div class='cont'>
                <div class='button'><a href='{{ url("welcome") }}'>HOME</a></div>
                <div class='button'><a href='{{ url("login") }}'>LOGIN</a></div>
                <div class='button'> <a href='{{ url("signup") }}'>REGISTRATI</a></div>
            </div>
        </header>   

        <article>
        <h2> Registrazione avvenuta con successo! </h2>
        <h2> Si prega di effettuare il <a href='{{ url("login") }}'> login</a> per proseguire </h2>
        </article>
        
        <footer>
            <a href="https://i.ytimg.com/vi/HO8ctP_QNZc/maxresdefault.jpg">
                LAVORA CON NOI
            </a>
            <div>
                Powered by:<strong>Cataldo Cristian O46001831</strong>
            </div>
        </footer>
    </body>
</html>