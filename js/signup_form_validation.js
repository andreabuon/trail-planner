function validaRegistrazione(){
    p1 = document.form_registrazione.password.value;
    p2 = document.form_registrazione.passwordConfirm.value;
    if(p1!=p2) {
        alert("Le password inserite non combaciano.");
        return false;
    }
    return true;
}