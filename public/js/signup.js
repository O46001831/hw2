function onResponse(response){  
    return response.json();
}

function signup(event){
    let form= document.getElementById("signup_form");


    let nome= form.nome.value;
    let cognome=form.cognome.value;
    let indirizzo=form.indirizzo.value;
    let cellulare=form.cellulare.value;
    let username=form.username.value;
    let password= form.password.value;
    let confpsw = form.conferma.value;

    //CONTROLLI SULLO USERNAME E SULLA PASSWORD:
    //imposto una variabile in cui inserire l'eventuale messaggio di errore:

    let msgContainer = document.createElement('div');


    if(nome.length === 0 || cognome.length === 0 || indirizzo.length === 0 || cellulare.length === 0 || username.length === 0){
        event.preventDefault();
        msgContainer.textContent="Si prega di compilare tutti i campi!";
        let spazioNascosto = document.getElementById("secret");
        spazioNascosto.innerHTML="";
        spazioNascosto.appendChild(msgContainer);
    }
    else if(password !== confpsw){        
        event.preventDefault();
        msgContainer.textContent="Le due password inserite devono essere uguali!";
        let spazioNascosto = document.getElementById("secret");
        spazioNascosto.innerHTML="";
        spazioNascosto.appendChild(msgContainer);
    }
    else if(password.length < 8){        
        event.preventDefault();
        msgContainer.textContent="La password deve contenere almeno 8 caratteri!";
        let spazioNascosto = document.getElementById("secret");
        spazioNascosto.innerHTML="";
        spazioNascosto.appendChild(msgContainer);
    }
    //controllo caratteri speciali: ! ? $ % ^ & # _ @    
    else if(password.indexOf("!") == -1 && password.indexOf("?") == -1 
    && password.indexOf("$") == -1 && password.indexOf("^") == -1 
    && password.indexOf("%") == -1 && password.indexOf("@") == -1 
    && password.indexOf("&") == -1 ){        
        event.preventDefault();
        console.log("inserire carattere speciale");
        msgContainer.textContent = "Inserire un carattere speciale (Es:! ? $ % ^ & # _ @)";
        let spazioNascosto = document.getElementById("secret");
        spazioNascosto.innerHTML="";
        spazioNascosto.appendChild(msgContainer);
    }
    else console.log("Specifiche password rispettate!");
}

const form = document.getElementById("signup_form");
form.addEventListener("submit", signup);


