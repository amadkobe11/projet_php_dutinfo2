<?php
        ini_set('display_error',1);
        require '../vendor/autoload.php';
        use GuzzleHttp\Client;

        $client = new Client();

        $produit = $_POST['p'];

        $request = $client -> REQUEST("POST","http://localhost/Projet/Serveur/PHP/AchatProduit.php",["form_params"=>["p"=>$produit]]);       
        header('Location: http://localhost/Projet/Client/HTML/RechercheFournisseur.php');

   ?>
</body>
</html>