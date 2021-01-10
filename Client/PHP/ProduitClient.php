<?php
        ini_set('display_error',1);
        session_start();
        require '../vendor/autoload.php';
        use GuzzleHttp\Client;

        $client = new Client();

        $nom = $_POST["nom"];
        $pu = $_POST["pU"];
        $nbstock = $_POST["stock"];
        $img = $_FILES["image"];
        $type = $_POST["type"];
        $duree = $_POST["duree"];
        $id = $_SESSION['id'];

        if(isset($_FILES["image"]))
        { 
             $dossier = "../../Client/Image/";
             $fichier = basename($_FILES["image"]["name"]);
             $chemin = $dossier . $fichier;
             if(move_uploaded_file($_FILES["image"]["tmp_name"], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
             {
                  $request = $client -> REQUEST("POST","http://localhost/Projet/Serveur/PHP/ProduitServeur.php",["form_params"=>["nom"=> $nom, "pU" => $pu, "stock" => $nbstock, "image" => $chemin, "type" => $type, "duree" => $duree, "id" => $id]]);       
                  header('Location: http://localhost/Projet/Client/HTML/AjoutProduit.php');
               }
             else //Sinon (la fonction renvoie FALSE).
             {
                    header('Location: http://localhost/Projet/Client/HTML/Produit.html');
             }
        }


        
   ?>
</body>
</html>