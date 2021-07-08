<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Homework WP: O46001831</title>
        <link rel="stylesheet" href='{{ asset("css/login.css") }}' />        
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
                <div class='button'> <a href='https://localhost/hw2/public/signup'>REGISTRATI</a></div>
            </div>
        </header>
               

        <article>
        <h2> Accedi per iniziare ad acquistare con Timmucchi! </h2>
            
        <!-- QUA INSERISCO IL FORM PER IL LOGIN -->
        <main>
            <form id="form" name="login_form" method="post">     
            @if(isset($old_username))
                <h3 class='errore'> Username o password errati! </h3>
            @endif       
            <input type='hidden' name='_token' value='{{ $csrf_token }}'>
            <label> Username: <input type="text" name="username" value='{{ $old_username }}'> </label>
            <label> Password: <input type="Password" name="password"> </label>
            <label>&nbsp;<input type="submit" name="invio" value="Login"> </label>
            </form> 
        </main>
        <h4>
            Se non sei ancora registrato <a href='{{ ("signup") }}'> clicca qui </a> per registrarti!
        </h4>
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