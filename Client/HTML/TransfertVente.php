<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfert des ventes</title>
    <link href="../Css/TransfertVente.css" media="all" rel="stylesheet" type="text/css" />
	<link rel="icon" type="image/png" href="../Image/logo.png" />

    <body>
        <?php
            ini_set('display_error',1);
            require '../vendor/autoload.php';
            use GuzzleHttp\Client;
     
            $client = new Client();

            session_start();
            $id=$_SESSION['id'];
            
            $request = $client -> request('POST','http://localhost/Projet/Serveur/PHP/Vente.php',['form_params'=>['id'=>$id]]);
            $valeur = $request->getBody();
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
                        <li class="dir" ><a  href="#">Mes produits</a>
                        <ul>
                            <li class="dir"><a href="GestionStock.php">Gestion des stocks</a>
                            </li>
                            <li class="dir"><a href="AjoutProduit.php">Ajouter Produit</a>
                            </li>
                            <li class="dir"><a href="Supprimer.php">Supprimer Produit</a>
                            </li>
                        </ul>
                        </li>
                        <li class="active" ><a  href="TransfertVente.php">Mes ventes</a></li>
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
                    <p>Vos ventes sont de :</p>
                    <p><?php echo $valeur; ?> €</p>
                    <form action = "../PHP/TransfertVente.php">
                        <div class ="element">
                            <button type="transfert" class="button">Transferer les ventes</button>
                        </div>
                    </form>
                </div>
    </body>
</html>