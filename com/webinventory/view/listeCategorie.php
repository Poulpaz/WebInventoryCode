<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des Catégories</title>
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
        include ('menu.php');
        ?>

        <div align="center">
            <h2><u>Liste des Catégories</u></h2>
            <a href="../controleur/patron.php?action=ajoutercategorie">
                <input type="button" value="Ajouter">
            </a>

            <?php
            echo "<br /><br />";
            echo "<table border=\"0\" style=\"a:hover:#000;border-style:solid;border-top-width:1px;border-bottom-width:2px;border-width:2px;\">";
            echo "<tr><td align=\"center\"><b>Libelle</b></td><td align=\"center\"><b>Logo</b></td><td align=\"center\"><b>Gestion</b></td></tr>";
            foreach ($listeCat as $categorie) {
                echo "<tr>";
                echo "<td>" . $categorie['libellecat'] . "</td>";
                echo "<td>" . $categorie['logoimg'] . "</td>";
                echo "<td><a href=\"../controleur/patron.php?action=prepasupprimercategorie&idcategorie=" . $categorie['idcategorie'] . "\">Supprimer</a>";
                echo "&nbsp;<a href=\"../controleur/patron.php?action=modifiercategorie&idcategorie=" . $categorie['idcategorie'] . "\">Modifier</a></td>";

                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
    </body>
</html>
