<?php
     //AchatProduit.php du serveur

     $dsn = 'pgsql:host=localhost;dbname=projet_php;port=5432;user=postgres;password=root';
        $pdo = new PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($pdo){

            $produit = $_POST['p'];
            
            foreach($produit as $key => $valeur){
                if(!empty($produit[$key])){
                    
                    $id = $produit[$key];

                    //l'achat n'est pas pris en compte donc on enleve juste un produit du stock

                    $query=$pdo->prepare("UPDATE produit SET nombre = nombre-1 WHERE idproduit = $id");
              
                    $request=$query->execute();

                    $query=$pdo->prepare("SELECT idfournisseur,prixunit FROM produit WHERE idproduit = $id");
              
                    $request=$query->execute();

                    $f = $query->fetchAll();
                    
                    $idf = $f[0]['idfournisseur'];
                    $prix = $f[0]['prixunit'];

                    $query=$pdo->prepare("UPDATE fournisseur SET vente = vente+$prix WHERE idfournisseur = $idf");
              
                    $request=$query->execute();
                    
                }
            }
           
        }

?>