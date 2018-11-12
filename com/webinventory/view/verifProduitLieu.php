<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirmer Suppression Lieu</title>
        <style>
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
        ?>

        <br /><br />
        <div align="center">
            <h2><u>Confirmer la suppression</u></h2>
            
            <p>Transferez vos produits vers un autre lieu avant suppression /!\</p>
            <i>S'il n'y a aucun produit, cliquez sur valider dans tout les cas</i>
            <?php
            // put your code here
            $idoldlieu = filter_input(INPUT_GET, 'idlieu');
            //print_r($idoldutilisateur);
            echo "<form action=\"../controleur/patron.php?action=supprimerlieu&idoldlieu=$idoldlieu\" method=\"post\">";
            echo "<select name=\"lieu\">";
            foreach ($listeChangeLieu as $lieu) {
                echo "<option>" . $lieu['libellelieu'] . "</option>";
            }
            echo "</select>";
            echo "<input type=\"submit\" value=\"Valider\">";
            echo "</form>";

            echo "<br /><br />";
            echo "<table align=\"center\" border=\"0\" style=\"a:hover:#000;border-style:solid;border-top-width:1px;border-bottom-width:2px;border-width:2px;\">";
            echo "<tr><td align=\"center\"><b>Libellé</b></td><td align=\"center\"><b>Description</b></td><td align=\"center\"><b>Quantité</b></td><td align=\"center\"><b>Catégorie</b></td><td align=\"center\"><b>Crée par</b></td></tr>";
            foreach ($listeProdLieu as $produit) {

                echo "<tr><td>" . $produit['libelle'] . "</td><td>" . $produit['description'] . "</td><td>" . $produit['quantite'] . "</td><td>" . $produit['libellecat'] . "</td><td>" . $produit['prenom'] . "</td>";
            }
            echo "</table>";
            ?>
        </div>
    </body>
</html>
