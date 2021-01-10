<?php
            //transfert de l'argent au compte(pas pris en compte donc juste remise à 0 de la variable)
            ini_set('display_error',1);
            require '../vendor/autoload.php';
            use GuzzleHttp\Client;
     
            $client = new Client();

            session_start();
            $id=$_SESSION['id'];
            $request = $client -> request('POST','http://localhost/Projet/Serveur/PHP/TransfertVente.php',['form_params'=>['id'=>$id]]);
            header('Location: http://localhost/Projet/Client/HTML/TransfertVente.php');
?>