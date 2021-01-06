<?php
     //ModifierCompteClient.php du serveur
     header('Content-Type: application/json');

     $dsn = 'pgsql:host=localhost;dbname=projet_php;port=5432;user=postgres;password=root';
        $pdo = new PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($pdo){
        
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $mdp = $_POST['mdp'];
            $lieu = $_POST['lieu'];
            $banque = $_POST['banque'];

            $id =$_POST['id'];

            if(!empty($prenom)){
                $query=$pdo->prepare("UPDATE Client SET prenom = '$prenom' WHERE idclient=$id");
              
                $request=$query->execute();
            }
            if(!empty($nom)){
                $query=$pdo->prepare("UPDATE Client SET nom = '$nom' WHERE idclient=$id");
              
                $request=$query->execute();
            }
            if(!empty($mdp)){
                $query=$pdo->prepare("UPDATE Client SET mdp = '$mdp' WHERE idclient=$id");
              
                $request=$query->execute();
            }
            if(!empty($banque)){
                $query=$pdo->prepare("UPDATE Client SET comptebancaire = '$banque' WHERE idclient=$id");
              
                $request=$query->execute();
            }
            
            if(!empty($lieu)){
                $query=$pdo->prepare("DELETE FROM lieuclient WHERE idclient=$id");
              
                $request=$query->execute();

                foreach($lieu as $ville){
                    if(!strcmp ( $ville ,"Maubeuge")){
                      $query=$pdo->prepare("INSERT INTO LieuClient values (1,$id)");
                    
                      $request=$query->execute();
                    }
                    if(!strcmp ( $ville ,"Douai")){
                      $query=$pdo->prepare("INSERT INTO LieuClient values (2,$id)");
                    
                      $request=$query->execute();
                    }
                    if(!strcmp ( $ville ,"Denain")){
                      $query=$pdo->prepare("INSERT INTO LieuClient values (3,$id)");
                    
                      $request=$query->execute();
                    }
                    if(!strcmp ( $ville ,"Valenciennes")){
                      $query=$pdo->prepare("INSERT INTO LieuClient values (4,$id)");
                    
                      $request=$query->execute();
                    }
                  }
            }
           
        }

?>