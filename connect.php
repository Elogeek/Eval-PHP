<?php
$return = "";
$id = "";

if (isset($_GET['error'])){
    $id = "error";
    switch ($_GET['error']){
        case '0':
            $return = "Email ou pseudo deja utilisé !";
            break;
        case '1':
            $return = "L'email n'est pas valide !";
            break;
        case '2':
            $return = "Aucun compte associé à cette email ou ce mot de passe";
            break;
        case '3':
            $return = "Mot de passe incorrect.";
            break;
        case '4':
            $return = "Vérifiez votre connexion internet.";
            break;
        case '5':
            $return = "Le mot de passe ne contient pas de majuscule ou de chiffres ou de minuscule ou plus petit que 5 caractères";
            break;
    }
}
elseif (isset($_GET['success'])) {
    $id = "success";
    switch ($_GET['success']) {
        case '0':
            $return = "Vous êtes bien inscrit(e) !";
            break;
        case '1':
            $return = "Vous êtes bien déconnectée(e) !";
            break;
    }
}
