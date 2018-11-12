<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des lieux</title>
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
        <br />
        <div align="center">
            <h2><u>Liste des lieux</u></h2>

            <a href="../controleur/patron.php?action=ajouterlieu">
                <input type="button" value="Ajouter">
            </a>
            <br />
            <?php
            echo "<br />";
            echo "<table border=\"0\" style=\"a:hover:#000;border-style:solid;border-top-width:1px;border-bottom-width:2px;border-width:2px;\">";
            echo "<tr><td align=\"center\"><b>Libelle</b></td><td align=\"center\"><b>Gestion</b></td></tr>";
            foreach ($listeLieu as $lieu) {

                echo "<tr>";
                echo "<td>" . $lieu['libellelieu'] . "</td>";
                echo "<td><a href=\"../controleur/patron.php?action=prepasupprimerlieu&idlieu=" . $lieu['idlieu'] . "\">Supprimer</a>";
                echo "&nbsp;<a href=\"../controleur/patron.php?action=modifierlieu&idlieu=" . $lieu['idlieu'] . "\">Modifier</a></td>";

                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
    </body>
</html>
