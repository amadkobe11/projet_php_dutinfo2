<?php
    $dsn = 'pgsql:host=localhost;dbname=projet_php;port=5432;user=postgres;password=root';
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($pdo){
        $id=$_POST['id'];
        $query=$pdo->prepare("SELECT idlieu FROM lieuclient WHERE idclient = $id");

        $request=$query->execute();
        $lieu = $query-> fetchAll();

        $fournisseur=array();
        foreach($lieu as $key => $variable){
            $idlieu=$lieu[$key]['idlieu'];
            $query=$pdo->prepare("SELECT idfournisseur, f.nom, f.prenom, l.nom as nlieu FROM lieufournisseur join fournisseur as f using(idfournisseur) join lieu as l using(idlieu) WHERE idlieu = $idlieu");

            $request=$query->execute();
            $f = $query-> fetchAll();
            foreach($f as $key2 => $valeur2){
                $fournisseur[]=$f[$key2];
            }
        }
        echo(json_encode($fournisseur));
    }
        
?>
