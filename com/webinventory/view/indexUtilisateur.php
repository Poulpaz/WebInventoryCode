<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion/Inscription</title>
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
        //include ('menu.php');


        if (isset($_POST['forminscription'])) {

            if (!empty($_POST['nom']) AND ! empty($_POST['prenom']) AND ! empty($_POST['mail']) AND ! empty($_POST['ident']) AND ! empty($_POST['mdp'])) {

                $nom = htmlspecialchars(filter_input(INPUT_POST, 'nom'));
                $prenom = htmlspecialchars(filter_input(INPUT_POST, 'prenom'));
                $mail = htmlspecialchars(filter_input(INPUT_POST, 'mail'));
                $ident = htmlspecialchars(filter_input(INPUT_POST, 'ident'));
                $mdp = sha1($_POST['mdp']);
                $identLenght = strlen($ident);
                if ($identLenght < 15) {
                    //$tabinfo = array($nom, $prenom, $mail, $ident, $_POST['mdp']);
                    //print_r($tabinfo);
                    header("Location:patron.php?action=ajouterutilisateur&nom=$nom&prenom=$prenom&mail=$mail&ident=$ident&mdp=$mdp");
                } else {
                    $erreur = "L'identifiant est trop long (max : 14 caractères)";
                }
            } else {
                $erreur = "Tout les champs doivent être remplis.";
            }
        }

        if (isset($_POST['auth'])) {

            if (!empty($_POST['identconnexion']) AND ! empty($_POST['mdpconnexion'])) {


                $identco = htmlspecialchars(filter_input(INPUT_POST, 'identconnexion'));
                $mdpco = sha1($_POST['mdpconnexion']);

                header("Location:patron.php?action=verifierutilisateur&ident=$identco&mdp=$mdpco");
            } else {
                $erreur1 = "Tout les champs doivent être remplis.";
            }
        }
        ?>


        <!-- formulaire inscription -->
        <div id="main">
            <!-- connexion -->
            <div id="connexion" align="center">
                <h2><u>Connexion</u></h2>
                <form action="../controleur/patron.php?action=utilisateur" method="post">
                    <table>
                        <tr>
                            <td><b>Identifiant :</b></td><td><input type="text" name="identconnexion" value=""</td>
                        </tr>
                        <tr>
                            <td><b>Mot de passe : </b></td><td><input type="password" name="mdpconnexion"></td>
                        </tr>
                        <td></td>
                        <td align="center"><input type="submit" value="Authentification" name="auth"></td>
                        </tr>
                    </table>
                </form>
                <?php
                if (isset($erreur1)) {
                    echo "<font color=\"red\"><i>$erreur1</i></font>";
                }
                ?>
                <br /><br /><br />
                <div id="button" align="center">
                    <a href="../controleur/patron.php?action=listerutilisateur">
                        <input type="button" value="Lister">
                    </a>
                </div>
            </div>
            <div id="inscription" align="center">
                <h2><u>Inscription</u></h2>
                <form action="../controleur/patron.php?action=utilisateur" method="post">

                    <table>
                        <tr>
                            <td><b>Nom :</b></td><td> <input type="text" name="nom"></td>
                        </tr>
                        <tr>
                            <td><b>Prénom : </b></td><td><input type="text" name="prenom"></td>
                        </tr>
                        <tr>
                            <td><b>Email : </b></td><td><input type="email" name="mail"></td>
                        </tr>
                        <tr>
                            <td><b>Identifiant : </b></td><td><input type="text" name="ident"></td>
                        </tr>
                        <tr>
                            <td><b>Mot de passe : </b></td><td><input type="password" name="mdp"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="center"><input type="submit" value="Créer" name="forminscription"></td>
                        </tr>

                    </table>

                </form>

                <?php
                if (isset($erreur)) {
                    echo "<font color=\"red\"><i>$erreur</i></font>";
                }
                ?>
            </div>


        </div>

        <!--listage user-->
        <div id="foot" align="center">

            <?php
            include 'copyright.php';
            ?>

        </div>
    </body>
</html>
