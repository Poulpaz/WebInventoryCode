<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ajouter/Editer Lieu</title>
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

        $mess = filter_input(INPUT_GET, "mess");


        if (isset($_POST['formlieu'])) {

            if (!empty($_POST['lib'])) {

                $lib = htmlspecialchars(filter_input(INPUT_POST, 'lib'));
                $libLenght = strlen($lib);
                if ($libLenght < 21) {
                    header("Location:patron.php?action=validerlieu&lib=$lib");
                } else {
                    $erreur = "Le libellé est trop long (max : 20 caractères)";
                }
            } else {
                $erreur = "Tout les champs doivent être remplis.";
            }
        }

        include_once 'menu.php';
        ?>
        <br /><br />
        <div align="center">
            <?php
            if ($mess == 1) {
                $libellelieu = filter_input(INPUT_GET, "lib");
                $iduplieu = filter_input(INPUT_GET, "idlieu");
                echo "<h2><u>Editer un lieu</u></h2>";
                echo "<br />";
                echo "<form action=\"../controleur/patron.php?action=updatelieu&idlieu=$iduplieu\" method=\"post\">";
                echo "<table>";
                echo "<tr>";
                echo "<td><b>Libellé : </b></td><td><input type=\"text\" name=\"lib\" value=\"$libellelieu\"></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td></td><td align=\"center\"><input type=\"submit\" value=\"Valider\" name=\"formlieu\"></td>";
                echo "</tr>";
                echo "</table>";
                echo "</form>";

                if (isset($erreur)) {
                    echo "<font color=\"red\"><i>$erreur</i></font>";
                }

                echo "</div>";
            } else {
                echo "<h2><u>Ajouter un lieu</u></h2>";
                echo "<br />";
                echo "<form action =\"../controleur/patron.php?action=ajouterlieu\" method = \"post\">";
                echo "<table>";
                echo "<tr>";
                echo "<td><b>Libellé : </b></td><td><input type =\"text\" name =\"lib\"></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td></td><td align =\"center\"><input type =\"submit\" value = \"Valider\" name = \"formlieu\"></td>";
                echo "</tr>";
                echo "</table>";
                echo "</form>";

                if (isset($erreur)) {
                    echo "<font color=\"red\"><i>$erreur</i></font>";
                }
            }
            ?>
        </div>
    </body>
</html>
