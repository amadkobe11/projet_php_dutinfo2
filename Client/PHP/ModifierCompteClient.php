
    <?php
    //PHP pour la modification
        ini_set('display_error',1);
        session_start();
        require '../vendor/autoload.php';
        use GuzzleHttp\Client;

        $client = new Client();

        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];
        $lieu = $_POST['lieu'];
        $banque = $_POST['banque'];
        $id = $_SESSION['id'];

            $request = $client -> request('POST','http://localhost/Projet/Serveur/ModifierCompteClient.php',['form_params'=>['prenom'=> $prenom,'nom'=>$nom, 'mdp'=>$mdp, 'lieu'=>$lieu,'banque'=>$banque,'id'=>$id]]);
            header('Location: http://localhost/Projet/Client/HTML/AccueilClient.html');
            //Exit();

        
   ?>
</body>
</html>