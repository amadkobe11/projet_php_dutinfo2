<?php
     //GestionStockModification.php du serveur (pour le changement de stock des produits)
    header('Content-Type: application/json');


    $dsn = 'pgsql:host=localhost;dbname=projet_php;port=5432;user=postgres;password=root';
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($pdo){
    
        $id = $_POST['id'];
        $nbP = $_POST['nbP'];

        $query=$pdo->prepare("SELECT idproduit from produit where idfournisseur=$id");
        $request=$query->execute();
        $reponse=$query->fetchAll();

        foreach($reponse as $key => $valeur){
            if(!empty($nbP[$key])){
                $nb=$nbP[$key];
                $idP=$reponse[$key]['idproduit'];
                $query=$pdo->prepare("UPDATE produit SET nombre = $nb WHERE idproduit=$idP");
                $request=$query->execute();
            }
        }
    
}

?>