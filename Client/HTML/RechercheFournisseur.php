<!DOCTYPE html>
<html lang="fr">
	<head>
        <meta charset="utf-8" />
        <title>RechercheFournisseur</title>
        <link rel="stylesheet" href="../CSS/RechercheFournisseur.css" />
        <link rel="icon" type="image/png" href="../Image/logo.png" />
    </head>

    <body>
        <?php
            ini_set('display_error',1);
            require '../vendor/autoload.php';
            use GuzzleHttp\Client;
  
            $client = new Client();
            session_start();
            $id=$_SESSION['id'];
            $request = $client -> request('POST','http://localhost/Projet/Serveur/PHP/RechercheFournisseur.php',['form_params'=>['id'=>$id]]);

            $fournisseur = json_decode($request->getBody(),true);
           
            
            ?>

              <div class="parent">
                <h1 class="div1">Horizon</h1>
                <div class="div4">
                  <p class="client"> Bienvenue </br><a href="ModifierCompteClient.html">modifier compte</a></p>
                </div>
                <div class="div2">
                <nav class="menus">
                
                <ul id="nav" class="dropdown dropdown-horizontal">
                    <li class="dir" ><a  href="AccueilClient.html">Accueil</a></li>
                    <li class="active"><a href="RechercheFournisseur.php">Mes fournisseurs proches</a></li>
                    <li class="dir"><a href="#">A propos</a>
                    <ul>
                        <li class="dir"><a href="AproposClient.html">Notre site</a>
                        </li>
                        <li class="dir"><a href="AproposClientC.html">Nous contacter</a>
                        </li>
                    </ul>
                    </li>
                </ul>
                </nav>
                </div>
                <div class="div3">
                    <?php
                        foreach($fournisseur as $key => $valeur){

                    ?>
                <p>
                  Fournisseur <?php echo ($key + 1);?> : <?php echo($fournisseur[$key]['prenom'].'  '); echo ($fournisseur[$key]['nom'].' '); echo ('Lieu : '.$fournisseur[$key]['nlieu']); ?>
                </p>
                <?php print('<li><a href="SelectionProduit.php?idf='.$fournisseur[$key]['idfournisseur'].'">'.$fournisseur[$key]['nom'].'</a>');?>
                <?php
                       }
                ?>

            </div>

           
    </body>