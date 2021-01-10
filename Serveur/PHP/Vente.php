<?php
     //Vente.php du serveur (pour la récupération des vente du fournisseur)
    header('Content-Type: application/json');


    $dsn = 'pgsql:host=localhost;dbname=projet_php;port=5432;user=postgres;password=root';
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($pdo){
    
        $id = $_POST['id'];

        $query=$pdo->prepare("SELECT vente from fournisseur where idfournisseur=$id");
        $request=$query->execute();
        $reponse=$query->fetchAll();

        if(!empty($reponse)){
           echo $reponse[0]['vente'];
        }
    
}

?>