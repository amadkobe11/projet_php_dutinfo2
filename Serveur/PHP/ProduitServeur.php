<?php
     header('Content-Type: application/json');


     $dsn = 'pgsql:host=localhost;dbname=projet_php;port=5432;user=postgres;password=root';
     $pdo = new PDO($dsn);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nom = $_POST['nom'];
    $pu = $_POST['pU'];
    $nbstock = $_POST['stock'];
    $chemin = $_POST['image'];
    $type = $_POST['type'];
    $duree = $_POST['duree'];
    $id = $_POST["id"];
    if(!empty($duree)){
        $request=$pdo->query("INSERT INTO Produit values (DEFAULT,'$nom',$pu,$nbstock,'$chemin',$duree,'$type',$id)");
        $request=$query->execute();
    }else{
        $request=$pdo->query("INSERT INTO Produit values (DEFAULT,'$nom',$pu,$nbstock,'$chemin',NULL,'$type',$id)");
        $request=$query->execute();
    }
    



?>