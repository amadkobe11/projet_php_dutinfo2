<?php
     //supprimerProduit.php du serveur

     $dsn = 'pgsql:host=localhost;dbname=projet_php;port=5432;user=postgres;password=root';
        $pdo = new PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($pdo){

            $id =$_POST['id'];
            $produit = $_POST['p'];
            
            foreach($produit as $key => $valeur){
                if(!empty($produit[$key])){
                    
                    $idp = $produit[$key];

                    $query=$pdo->prepare("SELECT photo FROM produit WHERE idproduit = $idp");
              
                    $request=$query->execute();

                    $pF = $query->fetchAll();

                    $ppath = $pF[0]['photo'];

                    unlink($ppath);

                    $query=$pdo->prepare("DELETE FROM produit WHERE idproduit = $idp");
              
                    $request=$query->execute();

                    
                }
            }
           
        }

?>