<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Homework WP: O46001831</title>
        <link rel="stylesheet" href='{{ asset("css/homepage.css") }}'/>
        <link rel="stylesheet" href='{{ asset("css/header.css") }}'/>
        <script src='{{ asset("js/home.js") }}' defer></script>      
        <script src='{{ asset("js/modalBox.js") }}' defer></script>
                
         
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
                <h1>I nostri prodotti:</h1>
                <div>Cerca: <input type="text" id="ricerca" onkeyup="ricerca()"></div>  
            </div>
            <div id='list' class='list'></div>  <!-- usato per la lista completa -->
        </article>
        <div id="modalBox" class="hide">
            <div id="info">
                <img id="modalImg"></img>
                <div id="modalInfoProdotto">
                    <div id="modalTitle"></div>
                    <div id="modalPrezzo"></div>
                    <div id="modalDescrizione"></div>
                    <div id="modalAcquista"></div>
                    <div id="modalConferma" class="hideConferma"> Prodotto aggiunto al carrello!</div>
                </div>
            </div>      
            <div id="modalRecensioni">
                <div> Scrivi una recensione: </div>
                <div id="textCommento">
                    <textarea id="addComment" rows="5" cols="30"></textarea>
                    <button id="inviaRecensione"> Invia </button>
                </div>
                <div> Recensioni: </div>
                <div id="recensioni"></div>
            </div>
        </div>

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


