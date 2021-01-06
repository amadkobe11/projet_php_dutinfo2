<?php
    //PHP pour la connexion (client)
        ini_set('display_error',1);
        require '../vendor/autoload.php';
        use GuzzleHttp\Client;

        $client = new Client();

        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        $request = $client -> request('POST','http://localhost/Projet/Serveur/connexion.php',['form_params'=>['email'=> $email,'mdp'=>$mdp]]);
        $reponse = $request -> getBody();

        if($reponse == "fournisseur"){
            //envoyer sur l'accueil fournisseur
            header('Location: http://localhost/Projet/Client/HTML/AccueilFourni.html');
            Exit();
        }elseif($reponse == "client"){
            //envoyer sur l'accueil client
            header('Location: http://localhost/Projet/Client/HTML/AccueilClient.html');
            Exit();
        }else{
            //aucun compte trouvé donc renvoie a la page de connexion
            header('Location: http://localhost/Projet/Client/HTML/Connexion.html');
            Exit();
        }
    
   ?>
</body>
</html>