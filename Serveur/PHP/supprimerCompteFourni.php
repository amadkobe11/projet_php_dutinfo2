<?php
     //supprimerCompteClient.php du serveur

     $dsn = 'pgsql:host=localhost;dbname=projet_php;port=5432;user=postgres;password=root';
        $pdo = new PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($pdo){

            $id =$_POST['id'];

            //récupération des path des photos des produits du fournisseur
            $query=$pdo->prepare("SELECT photo FROM produit WHERE idfournisseur=$id");
              
            $request=$query->execute();

            $path = $query->fetchAll();

            //suppression de toute les photos
            foreach($path as $key => $variable){
                unlink($path[$key]['photo']);
            }
        
            //suppression des produits
            $query=$pdo->prepare("DELETE FROM produit WHERE idfournisseur=$id");
              
            $request=$query->execute();

            //suppression des lieux associé

            $query=$pdo->prepare("DELETE FROM lieufournisseur WHERE idfournisseur=$id");
              
            $request=$query->execute();

            //suppression du fournisseur
            $query=$pdo->prepare("DELETE FROM fournisseur WHERE idfournisseur=$id");
              
            $request=$query->execute();
           
        }

?>