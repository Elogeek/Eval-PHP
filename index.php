<?php
require_once "Include.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/e3ddf954eb.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Eval tchat</title>
</head>
<body>

<div id="container">
    <!--header-->
    <div class="menu">
        <div class="cat">
            <img src="/assets/img/back.png" alt="cat" id="cat">
        </div>
        <img src="assets/img/logo.png" alt="logoSite" id="logo">

        <div id="menuContainer">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="myInput">
                S'inscrire
            </button>

            <div class="container-fluid" id="windowConnect">
                <div class="row mt-2">
                    <div class="col-2"></div>
                    <div class="col-8 shadow p-3 mb-5 bg-white rounded">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Email </label>
                                <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword">
                            </div>

                            <button type="submit" class="btn btn-primary">Valider !</button>
                        </form>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="btnDeco">
               Se connecter
            </button>
            <div class="connect">
                <div class="container-fluid" id="windowDeCo">
                    <div class="row mt-2">
                        <div class="col-2"></div>
                        <div class="col-8 shadow p-3 mb-5 bg-white rounded">
                            <form>
                                <div class="mb-3">
                                    <label for="exampleInputEmail" class="form-label">Email </label>
                                    <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">

                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword">
                                </div>

                                <button type="submit" class="btn btn-primary"> Ok !</button>
                            </form>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div

        </div>

    </div>

    <div id="tchat">

        <!--Users listes
        <div id="users">
            <button id="usersList" class="btn btn-rounded btn-primary">Liste des utilisateurs</button>
            list users tchat
            <div>
                <table>
                    <tbody id="#usersListContent"></tbody>
                </table>
            </div>
        </div>
          -->

        <!--ALL TCHAT here-->
        <form method="POST" action="">
            <div id="message">
                <textarea name="message" id="messageToSend" placeholder=" Tapez votre message ici ! " maxlength="500"></textarea>
                <input type="submit" name="submit" value="Envoyez votre message !" id="sendMessage" />
            </div>
        </form>
        <!--display messages chat here-->
        <div class="message">
            <!--<i class="fas fa-comment-alt"></i> back one message-->
        </div>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="assets/js/app.js"></script>
</body>
</html>