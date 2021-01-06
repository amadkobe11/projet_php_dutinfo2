<?php
     //connexion.php du serveur
    header('Content-Type: application/json');


    $dsn = 'pgsql:host=localhost;dbname=projet_php;port=5432;user=postgres;password=root';
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($pdo){
    
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        
        if((!empty($email)) && (!empty($mdp)) ){
            $query=$pdo->prepare("SELECT mdp from projet_php.public.client as c where c.email='$email'");
            $request=$query->execute();

            $reponse=$query->fetchAll();

            $query2 = $pdo->prepare("SELECT mdp from projet_php.public.fournisseur as f where f.email='$email'");
            $request2=$query2->execute();

            $reponse2=$query2->fetchAll();

            if((!empty($reponse)) || (!empty($reponse2))){
                $ok = true;
                foreach ($reponse as $key => $variable)
                {
                    if($reponse[$key]['mdp'] == $mdp && $ok){
                        echo 'client';
                        $ok=false;
                    }
                }
                foreach($reponse2 as $key => $variable){
                    if($reponse2[$key]['mdp'] == $mdp && $ok){
                        echo 'fournisseur';
                        $ok=false;
                    }
                }
                if($ok){
                    echo 'incorrect';
                }
            }else{
                echo 'aucun';

            }
    }
}

?>