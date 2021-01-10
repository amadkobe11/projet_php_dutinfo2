<!DOCTYPE html>
<html lang="fr">
	<head>
        <meta charset="utf-8" />
        <title>Achats Produits</title>
        <link rel="stylesheet" href="../CSS/SelectionProduit.css" />
        <link rel="icon" type="image/png" href="../Image/logo.png" />
    </head>

    <body>
            <?php
            //récupéré les produit du fournisseur
            ini_set('display_error',1);
            require '../vendor/autoload.php';
            use GuzzleHttp\Client;
     
            $client = new Client();

            session_start();
            $idf=$_GET['idf'];
            
            $request = $client -> request('POST','http://localhost/Projet/Serveur/PHP/ChercherProduitFournisseur.php',['form_params'=>['id'=>$idf]]);
            $produit = json_decode($request->getBody(),true);
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
                <form action = "../PHP/AchatProduit.php" method="POST">
                  <p style="margin-bottom: 20px;">Vos produits :</p>
                    <div class="produits">
                        <?php
                            foreach($produit as $key => $valeur){
                        ?>
                        <div class="produit">
                            <p style="width: fit-content;"><?php print('<img class="imgProduit"src="'.$produit[$key]['photo'].'" align="absmiddle">'); echo '   ';echo $produit[$key]['nom'];?>, type : 
                            <?php echo $produit[$key]['type'];?>, <?php echo $produit[$key]['prixunit'];?>€, <?php echo $produit[$key]['nombre'];?> en stock</p>
                            <?php print('<input type="checkbox" id="p" name="p[]"  value='.$produit[$key]['idproduit'].'>');?>
                            <label for="scales"><?php echo $produit[$key]['nom'];?> </label>
                        </div>

                        <?php
                            }
                        ?>
                    
                    </div>
                    
                        <div class ="element">
                            <input type="button" onclick="window.location.href = 'RechercheFournisseur.php';" value="Retour" class="button"/>
                            <button type="modifier" class="button">Acheter</button>
                        </div>
                    </form>
                
            </div>

            



    </body>