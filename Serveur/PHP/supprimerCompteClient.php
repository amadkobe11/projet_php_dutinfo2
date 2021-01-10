<?php
     //supprimerCompteClient.php du serveur
     header('Content-Type: application/json');

     $dsn = 'pgsql:host=localhost;dbname=projet_php;port=5432;user=postgres;password=root';
        $pdo = new PDO($dsn);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($pdo){

            $id =$_POST['id'];

            $query=$pdo->prepare("DELETE FROM lieuclient WHERE idclient=$id");
              
            $request=$query->execute();

            $query=$pdo->prepare("DELETE FROM client WHERE idclient=$id");
              
            $request=$query->execute();
           
        }

?>