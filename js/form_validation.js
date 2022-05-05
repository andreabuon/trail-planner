function validaRegistrazione(){
    psw1 = document.getElementById("password").value;
    psw2 = document.getElementById("passwordConfirm").value;
    if(psw1!=psw2) {
        alert("Le password inserite non combaciano.");
        return false;
    }
    return true;
}