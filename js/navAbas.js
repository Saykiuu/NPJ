function abrirAba(evt, aba) {


    // Declare all variables
    var i, divs, btn;

    // Get all elements with class="tabcontent" and hide them
    divs = document.getElementsByClassName("campos");
    for (i = 0; i < divs.length; i++) {
        divs[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    btn = document.getElementsByClassName("tablinks");
    for (i = 0; i < btn.length; i++) {
        btn[i].className = btn[i].className.replace(" active", "");

    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(aba).style.display = "block";
    evt.currentTarget.className += " active";
}


function abrir() {


    sumir('abre');
    aparecer('representante');
    aparecer('up');
}

function fechar() {
    sumir('representante');
    aparecer('abre');
    aparecer('up');
}

function sumir(id) {
    document.getElementById(id).style.display = "none";

}

function aparecer(id) {
    document.getElementById(id).style.display = "block";

}