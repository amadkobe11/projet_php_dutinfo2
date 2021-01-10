<?php
     //TransfertVente.php du serveur
    header('Content-Type: application/json');


    $dsn = 'pgsql:host=localhost;dbname=projet_php;port=5432;user=postgres;password=root';
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($pdo){
    
        $id = $_POST['id'];
        $v = 0.0;
        $query=$pdo->prepare("UPDATE fournisseur SET vente = $v WHERE idfournisseur=$id ");
        $request=$query->execute();
}

?>