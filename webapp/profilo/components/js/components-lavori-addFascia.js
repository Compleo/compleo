let i = 0;

$('.calendario-inizio')
  .calendar({
    type: 'time'
  })
;

$('.calendario-fine')
  .calendar({
    type: 'time'
  })
;


$(".aggiungi-fascia").click(function () {
    var container1 = $('.fascia' + i).clone();

    container1.removeClass('fascia' + i);

    //Ora di inizio
    container1.find('#oInizio' + i).attr('id', 'oInizio' + (i + 1));
    container1.find('#oInizio' + (i + 1)).attr('name', "fascie["  + (i + 1) + "]['oraInizio']");

    //Ora di fine
    container1.find('#oFine' + i).attr('id', 'oFine' + (i + 1));
    container1.find('#oFine' + (i + 1)).attr('name', "fascie["  + (i + 1) + "]['oraFine']");

    //Giorno Settimana
    container1.find('#gSettimana' + i).attr('id', 'gSettimana' + (i + 1));
    container1.find('#gSettimana' + (i + 1)).attr('name', "fascie["  + (i + 1) + "]['giorno']");

    i++;

    container1.addClass('fascia' + i);

    $('.fascia' + (i - 1)).after(container1);

    //Aggiorna dropdown
    $('.ui.dropdown').dropdown();

});