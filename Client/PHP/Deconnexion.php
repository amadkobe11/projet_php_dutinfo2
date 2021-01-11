<?php
    session_start();
    session_abort();
    //$_SESSION['id']=[];
    header('Location: http://localhost/Projet/Client/HTML/Accueil.html');

?>