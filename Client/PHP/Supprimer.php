<?php
        ini_set('display_error',1);
        session_start();
        require '../vendor/autoload.php';
        use GuzzleHttp\Client;

        $client = new Client();

        $produit = $_POST['p'];
        
        $id = $_SESSION['id'];

        $request = $client -> REQUEST("POST","http://localhost/Projet/Serveur/PHP/Supprimer.php",["form_params"=>["id" => $id,"p"=>$produit]]);       
        header('Location: http://localhost/Projet/Client/HTML/Supprimer.php');

   ?>
</body>
</html>