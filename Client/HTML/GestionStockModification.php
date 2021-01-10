<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Stocks</title>
    <link href="../Css/GestionStock.css" media="all" rel="stylesheet" type="text/css" />
	<link rel="icon" type="image/png" href="../Image/logo.png" />

    <body>
        <?php
            //récupéré les produit du fournisseur
            ini_set('display_error',1);
            require '../vendor/autoload.php';
            use GuzzleHttp\Client;
     
            $client = new Client();

            session_start();
            $id=$_SESSION['id'];
            
            $request = $client -> request('POST','http://localhost/Projet/Serveur/PHP/ChercherProduitFournisseur.php',['form_params'=>['id'=>$id]]);
            $valeur = json_decode($request->getBody(),true);
            
        ?>
            <div class="parent">
                <h1 class="div1">Horizon</h1>
                <div class="div4">
                    <p class="client"> Bienvenue </br><a href="ModifierCompteFourni.html">modifier compte</a></p>
                </div>
                <div class="div2">
                <nav class="menus">
                
                    <ul id="nav" class="dropdown dropdown-horizontal">
                        <li class="dir" ><a  href="AccueilFourni.html">Accueil</a></li>
                        <li class="active" ><a  href="#">Mes produits</a>
                        <ul>
                            <li class="active"><a href="GestionStock.php">Gestion des stocks</a>
                            </li>
                            <li class="dir"><a href="AjoutProduit.php">Ajouter Produit</a>
                            </li>
                            <li class="dir"><a href="Supprimer.php">Supprimer Produit</a>
                            </li>
                        </ul>
                        </li>
                        <li class="dir" ><a  href="TransfertVente.php">Mes ventes</a></li>
                        <li class="dir"><a href="#">A propos</a>
                        <ul>
                            <li class="dir"><a href="AproposFourni.html">Notre site</a>
                            </li>
                            <li class="dir"><a href="AproposFourniC.html">Nous contacter</a>
                            </li>
                        </ul>
                        </li>
                    </ul>
                </nav>
                </div>
                
                <div class="div3">
                    <form action = "../PHP/GestionStockModification.php" method="POST">
                    <p>Vos produits :</p>
                    <div class="produits">
                        <?php
                            foreach($valeur as $key => $variable){
                            
                        ?>
                        <div class="produit">
                            <p style="width: fit-content;"><?php $img = $valeur[$key]['photo']; print('<img class="imgProduit"src="'.$img.'" align="absmiddle">')?> 
                            <?php echo $valeur[$key]['nom'];?>, <?php echo $valeur[$key]['nombre'];?> en stocks avant modification, nombre en stocks après modification : <input type="number" id="nbP1" name="nbP1[]"></p>
                        </div>
                        
                        <?php
                            }
                        ?>

                    </div>
                        
                        <div class ="element">
                            <input type="button" onclick="window.location.href = 'GestionStock.php';" value="Retour" style="margin-right:100px"/>
                            <button type="submit" class="button">confirmer</button>
                        </div>
                    </form>
                </div>
    </body>
</html>