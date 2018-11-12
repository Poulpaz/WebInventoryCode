<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ajouter/Editer Catégorie</title>
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
        $mess = filter_input(INPUT_GET, "mess");
        // put your code here

        if (isset($_POST['formcategorie'])) {

            if (!empty($_POST['lib'])) {

                $lib = htmlspecialchars(filter_input(INPUT_POST, 'lib'));
                $img = filter_input(INPUT_POST, 'img');
                $libLenght = strlen($lib);
                if ($libLenght < 35) {
                    header("Location:patron.php?action=validercategorie&lib=$lib&img=$img");
                } else {
                    $erreur = "Le libellé est trop long (max : 34 caractères)";
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
            
            if ($mess == 1){
                $libellecat = filter_input(INPUT_GET, "lib");
                $idupcategorie = filter_input(INPUT_GET, "idcategorie");
                
                echo "<h2><u>Editer une catégorie</u></h2>";
                echo "<br />";
                echo "<form action=\"../controleur/patron.php?action=updatecategorie&idcategorie=$idupcategorie\" method=\"post\">";
                echo "<table>";
                echo "<tr>";
                echo "<td><b>Libellé : </b></td><td><input type=\"text\" name=\"lib\" value=\"$libellecat\"></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td></td><td align=\"center\"><input type=\"submit\" value=\"Valider\" name=\"formcategorie\"></td>";
                echo "</tr>";
                echo "</table>";
                echo "</form>";
                //print_r($logo);

                if (isset($erreur)) {
                    echo "<font color=\"red\"><i>$erreur</i></font>";
                }

                echo "</div>";
            }else{
                echo "<h2><u>Ajouter une catégorie</u></h2>";
                echo "<br />";
                echo "<form action=\"../controleur/patron.php?action=ajoutercategorie\" method=\"post\">";
                echo "<table>";
                echo "<tr>";
                echo "<td><b>Libellé : </b></td><td><input type=\"text\" name=\"lib\"></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td><b>Image : </b></td><td><input type=\"file\" name=\"img\" value=\"Parcourir\"></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td></td><td align=\"center\"><input type=\"submit\" value=\"Valider\" name=\"formcategorie\"></td>";
                echo "</tr>";
                echo "</table>";
                echo "</form>";

                if (isset($erreur)) {
                    echo "<font color=\"red\"><i>$erreur</i></font>";
                }

                echo "</div>";
            }
            
            ?>
            


    </body>
</html>
