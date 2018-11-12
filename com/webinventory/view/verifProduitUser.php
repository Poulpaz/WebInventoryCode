<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirmer Suppression Utilisateur</title>
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
            
            <p>Transferez vos produits vers un autre utilisateur avant suppression /!\</p>
            <?php
            // put your code here
            $idoldutilisateur = filter_input(INPUT_GET, 'idutilisateur');
            //print_r($idoldutilisateur);
            echo "<form action=\"../controleur/patron.php?action=supprimerutilisateur&idolduser=$idoldutilisateur\" method=\"post\">";
            echo "<select name=\"user\">";
            foreach ($listeChangeUser as $user) {
                echo "<option>" . $user['prenom'] . "</option>";
            }
            echo "</select>";
            echo "<input type=\"submit\" value=\"Valider\">";
            echo "</form>";

            echo "<br /><br />";
            echo "<table align=\"center\" border=\"0\" style=\"a:hover:#000;border-style:solid;border-top-width:1px;border-bottom-width:2px;border-width:2px;\">";
            echo "<tr><td align=\"center\"><b>Libellé</b></td><td align=\"center\"><b>Description</b></td><td align=\"center\"><b>Quantité</b></td><td align=\"center\"><b>Catégorie</b></td><td align=\"center\"><b>Lieu</b></td></tr>";
            foreach ($listeProdUser as $produit) {

                echo "<tr><td>" . $produit['libelle'] . "</td><td>" . $produit['description'] . "</td><td>" . $produit['quantite'] . "</td><td>" . $produit['libellecat'] . "</td><td>" . $produit['libellelieu'] . "</td>";
            }
            echo "</table>";
            ?>
        </div>
    </body>
</html>
