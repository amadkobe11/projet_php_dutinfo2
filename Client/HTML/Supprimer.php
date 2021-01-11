<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../CSS/AccueilFourni.css" />
        <title>Supprimer Produit</title>
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
            $id=$_SESSION['id'];
            
            $request = $client -> request('POST','http://localhost/Projet/Serveur/PHP/ChercherProduitFournisseur.php',['form_params'=>['id'=>$id]]);
            $valeur = json_decode($request->getBody(),true);
        ?>
            <div class="parent">
                <h1 class="div1"><img style = "height: 3.5cm; width: auto;" src="../Image/logo2.jpg"></h1>
                <div class="div4">
                    <p class="client"> Bienvenue </br><a href="ModifierCompteFourni.html">modifier compte</a></br><a href="../PHP/Deconnexion.php">deconnexion</a></p>
                </div>
                <div class="div2">
                <nav class="menus">
                
                    <ul id="nav" class="dropdown dropdown-horizontal">
                        <li class="dir" ><a  href="AccueilFourni.html">Accueil</a></li>
                        <li class="active" ><a  href="#">Mes produits</a>
                        <ul>
                            <li class="dir"><a href="GestionStock.php">Gestion des stocks</a>
                            </li>
                            <li class="dir"><a href="AjoutProduit.php">Ajouter Produit</a>
                            </li>
                            <li class="active"><a href="Supprimer.php">Supprimer Produit</a>
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
                    <form action="../PHP/Supprimer.php" method="POST">
                        <p style="margin-bottom: 20px">Veuillez sélectionnez le/les produit(s) a supprimé :</p>
                        <?php
                            foreach($valeur as $key => $variable){
                            
                        ?>
                        <div style="margin-bottom: 20px">
                            <?php $v = $valeur[$key]['idproduit']; print('<input type="checkbox" id="p" name="p[]"  value='.$v.'>');?>
        
                            <label for="p"><?php echo $valeur[$key]['nom'];?></label>
                        </div>
                        <?php
                            }
                        ?>
                        <div style="margin-bottom: 20px;">
                            <button type="submit" class="button">Confirmer</button>
                        </div>
                    </form>
            </div>
    </body>
</html>