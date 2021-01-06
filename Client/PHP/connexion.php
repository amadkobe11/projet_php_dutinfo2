<?php
    //PHP pour la connexion (client)
        ini_set('display_error',1);
        require '../vendor/autoload.php';
        use GuzzleHttp\Client;

        $client = new Client();

        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        $request = $client -> request('POST','http://localhost/Projet/Serveur/connexion.php',['form_params'=>['email'=> $email,'mdp'=>$mdp]]);
        $reponse = json_decode($request -> getBody());

        if($reponse[0] == "fournisseur"){
            //envoyer sur l'accueil fournisseur
            session_start();
            $_SESSION['id']=$reponse[1];
            header('Location: http://localhost/Projet/Client/HTML/AccueilFourni.html');
        }elseif($reponse[0] == "client"){
            //envoyer sur l'accueil client
            session_start();
            $_SESSION['id']=$reponse[1];
            header('Location: http://localhost/Projet/Client/HTML/AccueilClient.html');
        }else{
            //aucun compte trouvé donc renvoie a la page de connexion

            header('Location: http://localhost/Projet/Client/HTML/Connexion.html');
        }
    
   ?>
</body>
</html>