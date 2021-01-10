<?php
    //PHP pour la gestion du stock (client)
        ini_set('display_error',1);
        require '../vendor/autoload.php';
        use GuzzleHttp\Client;
        session_start();
        $client = new Client();

        $nbP = $_POST['nbP1'];
        $id= $_SESSION['id'];

        $request = $client -> request('POST','http://localhost/Projet/Serveur/PHP/GestionStockModification.php',['form_params'=>['id' => $id, 'nbP'=> $nbP]]);
        header('Location: http://localhost/Projet/Client/HTML/GestionStock.php');
    
   ?>
</body>
</html>