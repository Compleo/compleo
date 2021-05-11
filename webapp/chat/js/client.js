/*
    ***************************************
            Compleo Source Code             
    ***************************************
    Programmer: Leonardo Baldazzi   (git -> @squirlyfoxy)
                                    (instagram -> @leonardobaldazzi_)

    Il seguente codice gestisce la chat realtime.

    Il server wss lavora sulla porta 3020, bisognerà aprire questa porta server-side

    THE FOLLOWING SOURCE CODE IS CLOSED SOURCE, COPYRIGHT (C) 2021 - COMPLEO
*/

//TODO: localhost DIVENTA L'IP DI COMPLEO
var exampleSocket = new WebSocket("ws://localhost:3020");
let idMio = -1;
let chatCorrente = -1;

exampleSocket.onmessage = function (event) {
    //Messaggio ricevuto
}    

window.onbeforeunload = function(){
    //Chiusura connessione
    if(exampleSocket.OPEN == 1) {
        exampleSocket.send("REME");

        exampleSocket.close();
    }
}

function RegMe(usrID) {
    exampleSocket.send("REGME " + usrID);

    idMio = usrID;
}

function NuovoMessaggio(contenuto) {
    exampleSocket.send("ADDMESSAGE " + contenuto);
}

function ChangeCurrentChat(idChat) {
    exampleSocket.send("CHANGECHAT " + idChat);

    GetMessaggi(idChat);

    chatCorrente = idChat;
}

function GetMessaggi(chatID) {
    exampleSocket.send("GETMESSAGES " + chatID);
}

$( ".chChat" ).click(function() {
    mi = $(this).attr("id");
    $("#nomeUtente").text($(this).text());

    ChangeCurrentChat(mi);

    console.log("Cambio current chat con id " + mi);
});

$( "#msgBtn" ).click(function() {
    //Invia il messaggio
    var messaggio = $('#msg').val();

    $('#msg').val("");

    if(messaggio != "" && chatCorrente != -1) {
        NuovoMessaggio(messaggio);
    }
});

var intervalId = setInterval(function() {
    if(chatCorrente != -1) {
        GetMessaggi(chatCorrente);
    }
  }, 5000);
