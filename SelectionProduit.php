<!DOCTYPE html>
<html lang="fr">
	<head>
        <meta charset="utf-8" />
        <title>Achats Produits</title>
        <link rel="stylesheet" href="../CSS/SelectionProduit.css" />
        <link rel="icon" type="image/png" href="../Image/logo.png" />
    </head>

    <body>
            <div class="parent">
                <h1 class="div1">Horizon</h1>
                <div class="div4">
                    <p class="client"> Bienvenue </br><a href="">modifier compte</a></p>
                </div>
                <div class="div2">
                <nav class="menus">
                
                    <ul id="nav" class="dropdown dropdown-horizontal">
                        <li class="dir" ><a  href="AccueilClient.html">Accueil</a></li>
                        <li class="active"><a href="RechercheFournisseur.html">Mes fournisseurs proches</a></li>
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
                  <p style="margin-bottom: 20px;">Vos produits :</p>
                    <div class="produits">
                        <div class="produit">
                            <p style="width: fit-content;"><img class="imgProduit"src="../Image/chat.jpg" align="absmiddle"> Déguisement chat, type déguisement, 19.99€</p>
                            <input type="checkbox" id="checkcat" name="cat">
                            <label for="scales">Déguisement chat</label>
                        </div>
                        <div class="produit">
                            <p style="width: fit-content;"><img class="imgProduit"src="../Image/dakimakura.jpg" align="absmiddle"> Dakimakura, type accessoire de literie, 29.99€</p>
                            <input type="checkbox" id="dakimakura" name="dakimakura">
                            <label for="scales" >Dakimakura</label>
                        </div>
                    </div>
                    <form action = "">
                        <div class ="element">
                            <input type="button" onclick="window.location.href = 'RechercheFournisseur.html';" value="Retour" class="button"/>
                            <button type="modifier" class="button">Acheter</button>
                        </div>
                    </form>
                
            </div>

            



    </body>