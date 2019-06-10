function exibirDispo(posicao){
    var dispos = document.getElementsByClassName("dispo");
    dispos[posicao].style.display = "flex";
}

function responderTera(idNotificacao){
    var alert = document.getElementsByClassName("alertPadrao");
    alert[0].style.display = "flex";

    var confirma = document.getElementById("confirmaBtn");
    var responder = document.getElementById("respondeBtn");

    confirma.setAttribute("href","/controllers/paciente.php?idNot="+idNotificacao);
    responder.setAttribute("href","respondeTerapeuta.php?idNot="+idNotificacao);
}