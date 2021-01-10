<?php
    //PHP pour l'inscription (client)
        ini_set('display_error',1);
        require '../vendor/autoload.php';
        use GuzzleHttp\Client;

        $client = new Client();

        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];
        $email = $_POST['email'];
        $lieu = $_POST['lieu'];
        $banque = $_POST['banque'];

        if((!empty($prenom)) && (!empty($nom)) && (!empty($mdp)) && (!empty($email)) && (!empty($lieu)) && (!empty($banque))){
            $request = $client -> request('POST','http://localhost/Projet/Serveur/PHP/inscriptionClient.php',['form_params'=>['prenom'=> $prenom,'nom'=>$nom, 'mdp'=>$mdp, 'email'=>$email, 'lieu'=>$lieu,'banque'=>$banque]]);
            header('Location: http://localhost/Projet/Client/HTML/Connexion.html');
            Exit();
        }

        
   ?>
</body>
</html>