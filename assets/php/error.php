<?php
use PDO;
use App\DB;

require_once "include.php";

$return = "";
$id = "";
if (isset($_GET['error'])) {
    $id = "error";
    switch ($_GET['error']) {
        case '0':
            $return = "Un compte existe déjà avec cet email !";
            break;
        case '1':
            $return = "L'email n'est pas valide !";
            break;
        case '2':
            $return = "Le mot de passe est incorrect ! 
            Il doit contenir une majuscule,un chiffre, des lettres en minuscules et il doit ête plus grand que 5 caractères";
            break;
    }
} elseif (isset($_GET['success'])) {
    $id = "success";
    switch ($_GET['success']) {
        case '0':
            $return = "Vous êtes bien inscrit(e) !";
            break;
        case '1':
            $return = "Vous êtes bien déconnectée(e) !";
            header('location:tchat.php');
            break;
    }
}