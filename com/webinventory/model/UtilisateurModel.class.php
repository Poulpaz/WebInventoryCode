<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UtilisateurModel
 *
 * @author Tristan Reffay
 */
include_once("connexion.php");

class UtilisateurModel {

    //put your code here

    private $db;

    function __construct() {

        $this->db = getConnexion();
    }

    // recuperer la liste des utilisateurs
    function getUtilisateur() {

// Execution de la requete
        $result = $this->db->query('SELECT * FROM utilisateur WHERE utilisateur.nom NOT LiKE "use%" ORDER BY nom ASC');

// RÃ©cupÃ©ration de tous les enregistrements retourne un tableau
        $listeUtilisateur = $result->fetchAll();
        return $listeUtilisateur;
    }

    function getUserEditProduit($utilisateur) {
        $sql = $this->db->prepare("SELECT * FROM utilisateur WHERE prenom NOT LIKE ? ORDER BY prenom ASC");
        $sql->bindValue(1, $utilisateur);
        $sql->execute();
        $liste = $sql->fetchAll();
        return $liste;
    }

    function getUtilisateurNotListe() {

// Execution de la requete
        $result = $this->db->query('SELECT * FROM utilisateur ORDER BY nom ASC');

// RÃ©cupÃ©ration de tous les enregistrements retourne un tableau
        $listeUtilisateur = $result->fetchAll();
        return $listeUtilisateur;
    }

    function getIdUserP($prenomUser) {

        $sql = $this->db->prepare("SELECT * FROM utilisateur WHERE prenom= ? ");
        $sql->bindValue(1, $prenomUser);
        $sql->execute();
        $listeUser = $sql->fetch();
        return $listeUser;
    }

    function getUserSupp($idutilisateur) {

        $sql = $this->db->prepare("SELECT * FROM utilisateur WHERE idutilisateur NOT LIKE ?");
        $sql->bindValue(1, $idutilisateur);
        $sql->execute();
        $listeUserSupp = $sql->fetchAll();
        return $listeUserSupp;
    }

    function updateProduit($idnewutilisateur, $idoldutilisateur) {

        $upt = $this->db->prepare("UPDATE produit SET id_utilisateur = ? WHERE id_utilisateur= ?");
        $upt->bindValue(1, $idnewutilisateur);
        $upt->bindValue(2, $idoldutilisateur);
        $upt->execute();
    }

    function ajouterUtilisateur($user) {

        $stmt = $this->db->prepare("INSERT INTO utilisateur (nom, prenom, email, identifiant, motdepasse) VALUES (?, ?, ?, ?, ?)");
        $stmt->bindValue(1, $user->getNom());
        $stmt->bindValue(2, $user->getPrenom());
        $stmt->bindValue(3, $user->getEmail());
        $stmt->bindValue(4, $user->getIdentifiant());
        $stmt->bindValue(5, $user->getMotdepasse());
        $stmt->execute();
    }

    function supprimerUtilisateur($idutilisateur) {

        $sql = $this->db->query("DELETE FROM utilisateur WHERE idutilisateur= $idutilisateur");
    }

    function chercherChamps($test) {

        session_start();
        $rqt = $this->db->prepare("SELECT * FROM utilisateur WHERE identifiant = ? AND motdepasse = ?");

        $rqt->execute(array($test->getIdentifiant(), $test->getMotdepasse()));
        $userexist = $rqt->rowCount();

        if ($userexist == 1) {

            $res = $rqt->fetch();
            $_SESSION['idutilisateur'] = $res['idutilisateur'];
            $_SESSION['identifiant'] = $res['identifiant'];
            header("Location:patron.php?action=main");
        } else {
            //$erreur = "Identifiant ou mot de passe incorrects";
            header("Location:patron.php?action=utilisateur&meserreur=1");
        }
    }

    function getPrenomUtilisateur($idutilisateur) {

        $result = $this->db->query("SELECT prenom FROM utilisateur WHERE idutilisateur=$idutilisateur");
        $liste = $result->fetch();
        $prenom = $liste['prenom'];
        return $prenom;
    }

}
