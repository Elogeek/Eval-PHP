<?php
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['password'])) {

    $return = "";
    $id = "";

    if (isset($_GET['success'])) {
        $id = "success";
        switch ($_GET['success']) {
            case '0':
                $return = "Vous êtes bien connecté(e) !";
                break;

        }
    }
}