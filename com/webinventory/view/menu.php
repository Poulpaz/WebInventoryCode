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
        <style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
    border-right:1px solid #bbb;
}
div {
    margin: 0;
}

li:last-child {
    border-right: none;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
</style>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <!-- menu en haut -->
        <div id="head" align="center">
                <ul>
                    <li><a href="../controleur/patron.php?action=utilisateur">Utilisateur/Logout</a></li>
                    <li><a href="../controleur/patron.php?action=produit">Produit</a></li>
                    <li><a href="../controleur/patron.php?action=categorie">Catégorie</a></li>
                    <li><a href="../controleur/patron.php?action=lieu">Lieu</a></li>
                </ul>
        </div>
        
    </body>
</html>
