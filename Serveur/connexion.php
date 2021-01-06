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

            $donne=[];
            $reponse;

            if((!empty($reponse)) || (!empty($reponse2))){
                $ok = true;
                foreach ($reponse as $key => $variable)
                {
                    if($reponse[$key]['mdp'] == $mdp && $ok){
                        $reponse= 'client';
                        $ok=false;

                        $query=$pdo->prepare("SELECT idclient as id from projet_php.public.client as c where c.email='$email'");
                        $request=$query->execute();

                        $id=$query->fetchAll();
                    }
                }
                foreach($reponse2 as $key => $variable){
                    if($reponse2[$key]['mdp'] == $mdp && $ok){
                        $reponse= 'fournisseur';
                        $ok=false;

                        $query2 = $pdo->prepare("SELECT idfournisseur as id from projet_php.public.fournisseur as f where f.email='$email'");
                        $request2=$query2->execute();

                        $id=$query2->fetchAll();
                    }
                }
                if($ok){
                    echo 'incorrect';
                }else{
                    echo(json_encode(array($reponse,$id[0]['id']))) ;
                }
            }else{
                echo 'aucun';

            }
    }
}

?>