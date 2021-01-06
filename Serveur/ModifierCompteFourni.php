<?php
     //ModifierCompteFourni.php du serveur
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
                $query=$pdo->prepare("UPDATE Fournisseur SET prenom = '$prenom' WHERE idfournisseur=$id");
              
                $request=$query->execute();
            }
            if(!empty($nom)){
                $query=$pdo->prepare("UPDATE Fournisseur SET nom = '$nom' WHERE idfournisseur=$id");
              
                $request=$query->execute();
            }
            if(!empty($mdp)){
                $query=$pdo->prepare("UPDATE Fournisseur SET mdp = '$mdp' WHERE idfournisseur=$id");
              
                $request=$query->execute();
            }
            if(!empty($banque)){
                $query=$pdo->prepare("UPDATE Fournisseur SET comptebancaire = '$banque' WHERE idfournisseur=$id");
              
                $request=$query->execute();
            }
            
            if(!empty($lieu)){
                $query=$pdo->prepare("DELETE FROM lieufournisseur WHERE idfournisseur='$id'");
                
                $request=$query->execute();

                foreach($lieu as $ville){
                    if(!strcmp ($ville,"Maubeuge")){
                      $query=$pdo->prepare("INSERT INTO lieufournisseur values (1,$id)");
                    
                      $request=$query->execute();
                    }
                    if(!strcmp ( $ville ,"Douai")){
                      $query=$pdo->prepare("INSERT INTO lieufournisseur values (2,$id)");
                    
                      $request=$query->execute();
                    }
                    if(!strcmp ( $ville ,"Denain")){
                      $query=$pdo->prepare("INSERT INTO lieufournisseur values (3,$id)");
                    
                      $request=$query->execute();
                    }
                    if(!strcmp ( $ville ,"Valenciennes")){
                      $query=$pdo->prepare("INSERT INTO lieufournisseur values (4,$id)");
                    
                      $request=$query->execute();
                    }
                  }
            }
           
        }

?>