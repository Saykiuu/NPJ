function validar() {
    if (document.getElementById('inp-master').value == "123") {
        document.cad_user.submit();
    } else {
        alert("senha master incorreta!");

    }
}