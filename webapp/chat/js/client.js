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
}

function EliminaMessaggio(idMessaggio) {
    exampleSocket.send("REMMESSAGE " + idMessaggio);
}

function NuovoMessaggio(idRichiedente, idDestinatario, tipo, contenuto) {
    //TODO: IMPLEMENTA
}

function GetMessaggi(chatID) {
    exampleSocket.send("GETMESSAGES " + chatID);
}