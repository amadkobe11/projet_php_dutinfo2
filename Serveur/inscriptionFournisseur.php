<?php
     //inscriptionClient.php du serveur
     header('Content-Type: application/json');


     $dsn = 'pgsql:host=localhost;dbname=projet_php;port=5432;user=postgres;password=root';
        $pdo = new PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($pdo){
        
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $mdp = $_POST['mdp'];
            $email = $_POST['email'];
            $lieu = $_POST['lieu'];
            $banque = $_POST['banque'];

            $query=$pdo->prepare("INSERT INTO Fournisseur values (DEFAULT,'$prenom','$nom','$mdp','$email',0.0,'$banque')");
              
            $request=$query->execute();
            
            $id = $pdo->lastInsertId();
            foreach($lieu as $ville){
              if(strcmp ( $ville ,'Maubeuge')){
                $query=$pdo->prepare("INSERT INTO LieuFournisseur values (1,$id)");
              
                $request=$query->execute();
              }elseif(strcmp ( $ville ,'Douai')){
                $query=$pdo->prepare("INSERT INTO LieuFournisseur values (2,$id)");
              
                $request=$query->execute();
              }elseif(strcmp ( $ville ,'Denain')){
                $query=$pdo->prepare("INSERT INTO LieuFournisseur values (3,$id)");
              
                $request=$query->execute();
              }elseif(strcmp ( $ville ,'Valenciennes')){
                $query=$pdo->prepare("INSERT INTO LieuFournisseur values (4,$id)");
              
                $request=$query->execute();
              }
            }
        }

?>