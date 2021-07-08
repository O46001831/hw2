<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Homework WP: O46001831</title>
        <link rel="stylesheet" href='{{ asset("css/signup.css") }}' />
        <script src='{{ asset("js/signup.js") }}' defer></script>
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
        <h2> Registrati per iniziare ad acquistare con Timmucchi! </h2>
        <main>  
            <!-- QUA INSERISCO IL FORM PER LA REGISTRAZIONE -->
            <form id="signup_form" name="signup_form" method="post">
            <label id="secret"></label>
            @if(isset($old_username))
                <h3 class='errore'> Username {{ $old_username }} già in uso! </h3>
            @endif 
            <input type='hidden' name='_token' value='{{ $csrf_token }}'>
            <label> Nome: <input type="text" name="nome" value='{{ $old_nome }}'> </label>
            <label> Cognome: <input type="text" name="cognome" value='{{ $old_cognome }}'> </label>
            <label> Indirizzo di residenza: <input type="text" name="indirizzo" value='{{ $old_indirizzo }}'> </label>
            <label> Numero di cellulare: <input type="text" name="cellulare" value='{{ $old_cellulare }}'> </label>
            <label> Username: <input type="text" name="username"> </label> 
            <label> Password: <input type="Password" name="password"> </label>
            <label> Conferma Password: <input type="Password" name="conferma"> </label>
            <label>&nbsp;<input type="submit" name="invio" value="Registrati"> </label>
            </form>             
        </main>
        <h4> La password deve essere lunga almeno 8 caratteri e deve contenere almeno un carattere speciale 
                (Es: ! ? $ % ^ & # _ @).</h4>
        <h4> Se sei già registrato <a href='{{ ("login") }}'> clicca qui </a> per effettuare l'accesso!</h4>
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