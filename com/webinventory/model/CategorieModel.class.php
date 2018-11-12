<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategorieModel
 *
 * @author Tristan Reffay
 */
include_once("connexion.php");

class CategorieModel {

    //put your code here
    private $db;

    function __construct() {

        $this->db = getConnexion();
    }

    function getCategorie() {

// Execution de la requete
        $result = $this->db->query('SELECT * FROM categorie WHERE categorie.libellecat NOT LIKE "autr%" ORDER BY libellecat ASC');

// RÃ©cupÃ©ration de tous les enregistrements retourne un tableau
        $listeCategorie = $result->fetchAll();
        return $listeCategorie;
    }

    function getCategorieEditProduit($categorie) {
        $sql = $this->db->prepare("SELECT * FROM categorie WHERE libellecat NOT LIKE ? ORDER BY libellecat ASC");
        $sql->bindValue(1, $categorie);
        $sql->execute();
        $liste = $sql->fetchAll();
        return $liste;
    }

    function getCategorieNotListe() {

// Execution de la requete
        $result = $this->db->query('SELECT * FROM categorie ORDER BY libellecat ASC');

// RÃ©cupÃ©ration de tous les enregistrements retourne un tableau
        $listeCategorie = $result->fetchAll();
        return $listeCategorie;
    }

    function getIdCatP($libCat) {

        $sqp = $this->db->prepare("SELECT * FROM categorie WHERE libellecat= ? ");
        $sqp->bindValue(1, $libCat);
        $sqp->execute();
        $listeCat = $sqp->fetch();
        return $listeCat;
    }

    function getCatSupp($idcat) {

        $sql = $this->db->prepare("SELECT * FROM categorie WHERE idcategorie NOT LIKE ?");
        $sql->bindValue(1, $idcat);
        $sql->execute();
        $listeCategorieSupp = $sql->fetchAll();
        return $listeCategorieSupp;
    }

    function updateProduit($idnewcat, $idoldcat) {

        $upt = $this->db->prepare("UPDATE produit SET id_categorie = ? WHERE id_categorie= ?");
        $upt->bindValue(1, $idnewcat);
        $upt->bindValue(2, $idoldcat);
        $upt->execute();
    }

    function supprimerCategorie($idCat) {
        //envoie de la requete de suppression
        $sql = $this->db->query("DELETE FROM categorie WHERE idcategorie= $idCat");
    }

    function ajouterCategorie($cat) {

        $sql = $this->db->prepare("INSERT INTO categorie (libellecat, logoimg) VALUES (?, ?)");
        $sql->bindValue(1, $cat->getLib());
        $sql->bindValue(2, $cat->getLogoImage());
        $sql->execute();
    }

    function selectCategorie($idcategorie) {

        //requete

        $result = $this->db->query("SELECT * FROM categorie WHERE idcategorie=$idcategorie");
        $liste = $result->fetch();
        return $liste;
    }

    function updateCategorie($libCat, $idcat) {

        $upt = $this->db->prepare("UPDATE categorie SET libellecat = ? WHERE idcategorie=?");
        $upt->bindValue(1, $libCat);
        $upt->bindValue(2, $idcat);
        $upt->execute();
    }

    function getLibelleCat($idcategorie) {

        $result = $this->db->query("SELECT libellecat FROM categorie WHERE idcategorie=$idcategorie");
        $libellecategorie = $result->fetch();
        $libelle = $libellecategorie['libellecat'];
        return $libelle;
    }

}
