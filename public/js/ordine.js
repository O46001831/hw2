//FUNZIONE PER CONTROLLARE SE SONO PRESENTI ORDINI:
function onJsonControllo(json){
    if(json.length !== 0){
        console.log(json);
        riempiOrdini(json);
    }
    else{
        let errorMsg = document.getElementById("noOrdini");
        errorMsg.classList.remove("hide");
    }
}

function onResponse(response){
    return response.json();
}

fetch("checkOrdini").then(onResponse).then(onJsonControllo);

//FUNZIONE PER RIEMPIRE LA SCHERMATA DEGLI ORDINI:
function riempiOrdini(jsonDati){
    //devo sapere quanti ordini ha fatto l'utente per creare n blocchi che
    //conterranno tutti i prodotti acquistati in quell'ordine:
    function onJsonNOrdini(json){
        for(j=1; j<=json; j++){
            let bloccoOrdine = document.createElement("div");
            bloccoOrdine.classList.add("container");
            let nordine = document.createElement("div");
            nordine.classList.add("generale");
            nordine.textContent = "Ordine numero: " + j;      
            bloccoOrdine.append(nordine);      
            let lista = document.getElementById("list");
            lista.appendChild(bloccoOrdine);

            let prezzotot = document.createElement("div");
            prezzotot.classList.add("generale");
            bloccoOrdine.appendChild(prezzotot);

            for(i=0; i<jsonDati.length; i++){
                if(jsonDati[i].n_ordine == j){
                let prodottoBox = document.createElement("div");
                prodottoBox.classList.add("prodottoBox");
                let titolo = document.createElement("h1");
                let immagine = document.createElement("img");
                let quantita = document.createElement("h3");

                titolo.textContent=jsonDati[i].titolo;
                immagine.src=jsonDati[i].link_immagine;
                quantita.textContent="Qta: " + jsonDati[i].quantita;
                
                prodottoBox.appendChild(immagine);
                prodottoBox.appendChild(titolo);
                prodottoBox.appendChild(quantita);
               
                bloccoOrdine.appendChild(prodottoBox);

                prezzotot.textContent = "Totale: € " + jsonDati[i].prezzo_tot;
                }
            }
            
        }
    }
    fetch("contaOrdini").then(onResponse).then(onJsonNOrdini);

    

}
