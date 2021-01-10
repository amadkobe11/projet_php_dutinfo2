<?php
    //PHP pour la suppression
        ini_set('display_error',1);
        session_start();
        require '../vendor/autoload.php';
        use GuzzleHttp\Client;

        $client = new Client();

        $id = $_SESSION['id'];

        $request = $client -> request('POST','http://localhost/Projet/Serveur/PHP/supprimerCompteFourni.php',['form_params'=>['id'=>$id]]);
        header('Location: http://localhost/Projet/Client/HTML/Accueil.html');
        Exit();

   ?>
</body>
</html>