<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ajouter/Editer Produit</title>
        <style>
            table {
                border-style:solid;
                border-width:2px;
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
    </head>
    <body>
        <?php
        // put your code here
        include ('menu.php');
        ?>

        <br /><br />
        <div align="center">
            <?php
            $mess = filter_input(INPUT_GET, "mess");

            if ($mess == 1) {
                $libelleprod = filter_input(INPUT_GET, "lib");
                $idupproduit = filter_input(INPUT_GET, "idproduit");
                $description = filter_input(INPUT_GET, "description");
                $quantite = filter_input(INPUT_GET, "quantite");
                $libcategorie = filter_input(INPUT_GET, "categorie");
                $liblieu = filter_input(INPUT_GET, "lieu");
                $utilisateur = filter_input(INPUT_GET, "utilisateur");

                echo "<h2><u>Editer un produit</u></h2>";
                echo "<br />";
                echo "<form action=\"../controleur/patron.php?action=updateproduit&idprod=$idupproduit\" method=\"post\">";
                echo "<table>";
                echo "<tr>";
                echo "<td><b>Libellé :</b></td><td> <input type=\"text\" name=\"lib\" value=\"$libelleprod\"></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><b>Description : </b></td><td><input type=\"text\" name=\"description\" value=\"$description\"></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><b>Quantité : </b></td><td><input type=\"number\" name=\"quantite\" value=\"$quantite\"></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><b>Image : </b></td><td><input type=\"file\" name=\"img\" value=\"Parcourir...\"></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><b>Utilisateur : </b></td><td><select name=\"user\">";
                echo "<option> $utilisateur </option>";
                foreach ($listeUser as $user) {
                    echo "<option>" . $user['prenom'] . "</option>";
                }
                echo "</select></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><b>Lieu : </b></td><td><select name=\"lieu\">";
                echo "<option> $liblieu </option>";
                foreach ($listeLieu as $lieu) {
                    echo "<option>" . $lieu['libellelieu'] . "</option>";
                }
                echo "</select></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><b>Catégorie : </b></td><td><select name=\"categorie\">";
                echo "<option> $libcategorie </option>";
                foreach ($listeCat as $categorie) {
                    echo "<option>" . $categorie['libellecat'] . "</option>";
                }
                echo "</select></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td></td>";
                echo "<td align=\"center\"><input type=\"submit\" value=\"Valider\"></td>";
                echo "</table>";
                echo "</form>";
            } else {
                echo "<h2><u>Ajouter un produit</u></h2>";
                echo "<br />";
                echo "<form action=\"../controleur/patron.php?action=validerproduit\" method=\"post\">";
                echo "<table>";
                echo "<tr>";
                echo "<td><b>Libellé :</b></td><td> <input type=\"text\" name=\"lib\"></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><b>Description : </b></td><td><input type=\"text\" name=\"description\"></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><b>Quantité : </b></td><td><input type=\"number\" name=\"quantite\"></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><b>Image : </b></td><td><input type=\"file\" name=\"img\" value=\"Parcourir...\"></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><b>Utilisateur : </b></td><td><select name=\"user\">";
                foreach ($listeUserP as $user) {
                    echo "<option>" . $user['prenom'] . "</option>";
                }
                echo "</select></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><b>Lieu : </b></td><td><select name=\"lieu\">";
                foreach ($listeLieuP as $lieu) {
                    echo "<option>" . $lieu['libellelieu'] . "</option>";
                }
                echo "</select></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><b>Catégorie : </b></td><td><select name=\"categorie\">";
                foreach ($listeCatP as $categorie) {
                    echo "<option>" . $categorie['libellecat'] . "</option>";
                }
                echo "</select></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td></td>";
                echo "<td align=\"center\"><input type=\"submit\" value=\"Valider\"></td>";
                echo "</table>";
                echo "</form>";
            }
            ?>


        </div>
    </body>
</html>
