<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Homework WP: O46001831</title>
        <link rel="stylesheet" href='{{ asset("css/ordini.css") }}'/>
        <link rel="stylesheet" href='{{ asset("css/header.css") }}'/>
        <script src="{{ asset('js/ordine.js') }}" defer></script>            
         
    </head>

    <body>
        <header>    
            <div id="overlay"></div>
            <div class='cont'>
                <div class='title'>TIMMUCCHI</div>
            </div>
            <div class='cont'>                
                <div class='button'><a href='{{ url("home") }}'> HOME </a></div>
                <div class='button'><a href='{{ url("carrello") }}'> CARRELLO </a></div>
                <div class='button'><a href='{{ url("ordini") }}'> ORDINI </a></div>
                <div class='button'><a href='{{ url("logout") }}'> LOGOUT </a></div>
                <span id='username'> {{ $nome }} </span>
            </div>
        </header> 
        <article>

            <div class='barra'>
                <h1>Il tuoi ordini:</h1>                
            </div>
            <div id="noOrdini" class="hide"> Non hai ancora effettuato nessun ordine!
                <a href="{{ url('home') }}">Clicca qui</a> per iniziare ad acquistare.
            </div>
            <div id='list' class='list'></div>
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