//FUNZIONI PER GESTIRE IL CARRELLO:
function onAggiungiCarrello(json){
    console.log(json)
    if(json>=0){
        let modalMsg = document.getElementById("modalConferma");
        let modalBox = document.getElementById("modalBox");    
        if (modalBox.classList !== "Hide" && json>=0){        
            modalMsg.classList.remove("hideConferma");
        }
    }
    else console.log("errore: impossibile aggiungere al carrello.")
       
}
function onResponse(response){
    return response.json();
}

function aggiungiAlCarrello(event){     
    let modalBox = document.getElementById("modalBox");
    if(modalBox.classList == "hide"){
        let hideDiv = event.currentTarget.parentNode.childNodes[5];
        hideDiv.classList.remove("hideConferma");
    }    
    let id=0;
    id= event.currentTarget.dataset.id;
    console.log(id)

    fetch("AggiungiCarrello/"+id).then(onResponse).then(onAggiungiCarrello); 
}


/* ALTRO */
/*CARICAMENTO ELEMENTI*/
function onJson(json){
    console.log(json);
    let contenuti = json;

    //AGGIUNTA DI N DIV CHE CONTERRANNO I PRODOTTI:
    for(let i=0; i<contenuti.length; i++){
        let contenitore=document.createElement("div");
        let titolo=document.createElement("h1");
        let img=document.createElement("img");
        let Prezzo=document.createElement("strong");
        let mostra=document.createElement("h2");    
        let button=document.createElement("button");
        let hideDiv=document.createElement("h3");

        contenitore.classList.add("box");
        mostra.classList.add("mostra");
        button.classList.add("aggiungiCarrello");
        hideDiv.classList.add("hideConferma");

        titolo.textContent=contenuti[i].titolo;
        img.src=contenuti[i].link_immagine;
        Prezzo.textContent="€" + contenuti[i].prezzo;
        mostra.textContent="Mostra prodotto";
        button.textContent="Aggiungi al carrello";
        hideDiv.textContent="Prodotto aggiunto al carrello!";

        button.dataset.id=contenuti[i].ID;
        button.addEventListener("click", aggiungiAlCarrello);
        mostra.addEventListener("click", mostraProdotto);

        contenitore.appendChild(titolo);
        contenitore.appendChild(img);
        contenitore.appendChild(Prezzo); 
        contenitore.appendChild(mostra);
        contenitore.appendChild(button);  
        contenitore.appendChild(hideDiv); 
       
        list.appendChild(contenitore);
    }
}



//richiesta dati:
fetch("CaricaProdotti").then(onResponse).then(onJson);



//FUNZIONE DI RICERCA DEI PRODOTTI:

//FUNZIONE DI RICERCA:
function ricerca(event){

    const listaProdotti = document.getElementById("list")
    const ricerca = document.getElementById("ricerca");

    //Prendiamo la sottostringa che vogliamo cercare nel titolo dei prodotti
    let testoRicerca=ricerca.value;                     

    for(let i=0; i<listaProdotti.childNodes.length; i++){
        //A turno controlliamo tutti i prodotti presenti nella lista
        let prodottoLista=listaProdotti.childNodes[i];  

        //Prendiamo il titolo del prodotto
        let titoloProdotto=prodottoLista.childNodes[0].textContent;  
        
        //Trasformiamo entrame le stringhe in minuscolo in maniera tale da non essere Case Sensitive
        titoloProdotto= titoloProdotto.toLowerCase();
        testoRicerca= testoRicerca.toLowerCase();

        //Ritorna la posizione della sottostringa cercata nel titolo (Se non è presente ritorna -1)
        let result=titoloProdotto.indexOf(testoRicerca);        

        //eseguo il controllo che mi determina se tenere o far scomparire il blocco in questione.
        if(result===-1){
            prodottoLista.classList.remove("box");
            prodottoLista.classList.add("hide");
        }
        else{
            prodottoLista.classList.add("box");
            prodottoLista.classList.remove("hide");
        }
    }
}