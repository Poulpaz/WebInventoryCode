<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <style type="text/css"> 
            a.nounderline:link 
            { 
                text-decoration:none; 
            } 

            tr {
                background: #ff9999;
                padding: 20px;
            }

            td {
                background: #D2D2D2;
                padding: 20px;
            }
            h2 {
                font-family:Baskerville,Times,'Times New Roman',serif;
                font-size:40px;
                color:#797979;
                font-variant:small-caps;
                text-align:center;
                font-weight:bold;
                padding:15px 0px 15px 0px;
            }


        </style>
        <?php
        include ('menu.php');
        ?>
        <br /><br />
        <div align="center">
            <h2><u>Liste des produits</u></h2>

            <a href="../controleur/patron.php?action=ajouterproduit">
                <input type="button" value="Ajouter">
            </a>
            <?php
            // put your code here

            echo "<br /><br />";
            echo "<table align=\"center\" border=\"0\" style=\"a:hover:#000;border-style:solid;border-top-width:1px;border-bottom-width:2px;border-width:2px;\">";
            echo "<tr><td align=\"center\"><b>Libellé</b></td><td align=\"center\"><b>Description</b></td><td align=\"center\"><b>Quantité</b></td><td align=\"center\"><b>Image</b></td><td align=\"center\"><b>Créé par</b></td><td align=\"center\"><b>Lieu</b></td><td align=\"center\"><b>Catégorie</b></td><td align=\"center\"><b>Gestion</b></td></tr>";
            foreach ($listeProduit as $produit) {
                echo "<tr><td align=\"center\">" . $produit['libelle'] . "</td><td align=\"center\">" . $produit['description'] . "</td><td align=\"center\"><a class=\"nounderline\" href=\"../controleur/patron.php?action=baisserquantite&idproduit=" . $produit['idproduit'] . "&quantite=" . $produit['quantite'] . "\">-</a>&nbsp;&nbsp;" . $produit['quantite'] . "&nbsp;&nbsp;<a class=\"nounderline\" href=\"../controleur/patron.php?action=augmenterquantite&idproduit=" . $produit['idproduit'] . "&quantite=" . $produit['quantite'] . "\">+</a></td><td align=\"center\">" . $produit['image'] . "</td><td align=\"center\">" . $produit['prenom'] . "</td><td align=\"center\">" . $produit['libellelieu'] . "</td><td align=\"center\">" . $produit['libellecat'] . "</td>";
                echo "<td><a href=\"../controleur/patron.php?action=supprimerproduit&idproduit=" . $produit['idproduit'] . "\">Supprimer</a>";
                echo "&nbsp;<a href=\"../controleur/patron.php?action=modifierproduit&idproduit=" . $produit['idproduit'] . "\">Modifier</a></td></tr>";
            }
            echo "</table>";
            ?>
        </div>
    </body>
</html>
