//CARICAMENTO ELEMENTI E AGGIORNAMENTO COSTO TOTALE
var costoTotale = 0;
let divCostoTotale = document.getElementById("prezzoTotale");

divCostoTotale.textContent="€ " + costoTotale;

function onJson(json){
    console.log(json);
    if(json.length === 0){
        //se il carrello è vuoto:
        let divMessaggio = document.getElementById("carrelloVuoto");
        divMessaggio.classList.remove("hide");
    }
    else if(json!==-1){
        let divMessaggio = document.getElementById("carrelloVuoto");
        divMessaggio.classList.add("hide");
    }
    let contenuti = json;

    //AGGIUNTA DI N DIV CHE CONTERRANNO I PRODOTTI:
    for(let i=0; i<contenuti.length; i++){
        let contenitore=document.createElement("div");
        let titolo=document.createElement("h1");
        let img=document.createElement("img");
        let Prezzo=document.createElement("strong");
        let button=document.createElement("button");
        let quantita=document.createElement("h3");
        let minicontainer = document.createElement("div");
        contenitore.classList.add("box");
        button.classList.add("RimuoviDalCarrello");

        titolo.textContent=contenuti[i].titolo;
        img.src=contenuti[i].link_immagine;
        Prezzo.textContent="€" + contenuti[i].prezzo;
        button.textContent="Rimuovi dal carrello";
        quantita.textContent="Quantità: " + contenuti[i].quantita;
        button.dataset.id=contenuti[i].id_prodotto;
        button.addEventListener("click", RimuoviDalCarrello);

        minicontainer.appendChild(titolo);
        minicontainer.appendChild(Prezzo);
        minicontainer.appendChild(quantita);

        contenitore.appendChild(img);
        contenitore.appendChild(minicontainer);
        contenitore.appendChild(button);   
       
        
        list.appendChild(contenitore);

        //calcolo il costo totale e lo appendo nel div scelto:
        let totProdotto = contenuti[i].prezzo;
        costoTotale = costoTotale + totProdotto;
        let divCostoTotale = document.getElementById("prezzoTotale");
        divCostoTotale.textContent="€ " + costoTotale;
    }
    divCostoTotale.textContent="€" + Number.parseFloat(costoTotale).toFixed(2);
}

function onResponse(response){
    return response.json();
}

//richiesta dati:
fetch("caricaCarrello").then(onResponse).then(onJson);



//FUNZIONE PER CONFERMARE L'ORDINE PRESENTE NEL CARRELLO:
function confermaOrdine(event){
    let controllaCarrelloVuoto = document.getElementById("carrelloVuoto");
    if(controllaCarrelloVuoto.classList !== "hide"){
        //se il carrello non è vuoto:
        let costoTotale = document.getElementById("prezzoTotale").textContent.substring(1);
        console.log(costoTotale)

        function onJsonConfermaOrdine(json){
            console.log(json);
            if(json !== -1){
                //tutto ok
                window.location.href="ordini";
            }
            else{
                //se ci sono stati errori:
                console.log("errore nella conferma dell'ordine!");
            }
        }

        fetch("confermaOrdine/"+costoTotale).then(onResponse).then(onJsonConfermaOrdine);
    }
}

let bottoneConferma = document.getElementById("confermaOrdine");
bottoneConferma.addEventListener("click", confermaOrdine);


//FUNZIONE PER RIMUOVERE UN PRODOTTO DAL CARRELLO:
function onJsonRemove(json){
    console.log(json)
    if(json===1){
        let boxCarrello = document.getElementById("list");
        boxCarrello.innerHTML=""; 
        fetch("caricaCarrello").then(onResponse).then(onJson);
    }
    else console.log("errore nell'aggiornamento dei prodotti!");
}

function RimuoviDalCarrello(event){
    console.log("Cliccato rimuovi");
    //IMPLEMENTARE LA FUNZIONE IN PHP E JS
    let idProdotto = event.currentTarget.dataset.id;
    console.log(idProdotto)

    fetch("rimuoviDalCarrello/"+idProdotto).then(onResponse).then(onJsonRemove);
}
