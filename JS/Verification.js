//Permet de surligner le champ avec les erreurs
function surligne(champ, erreur) {
    if (erreur) {
        champ.style.backgroundColor = "#fBa";
    } else {
        champ.style.backgroundColor = "";
    }
}

//Permet de verifier si le nom et prenom n'ont pas plus de 25 caractères
function verifPseudo(champ) {
    if (nom.value.length = < 0 || nom.value.length > 25) {
        surligne(champ, true);
        return false;
    } else {
        surligne(champ, false);
        return true;
    }
}

//Vérification de l'âge
function verifAge(champ) {
    var age = parseInt(champ.value)
    if (isNaN(age) || age < 5 || age > 111) {
        surligne(champ, true);
        return false;
    } else {
        surligne(champ, false);
        return true;
    }
}
