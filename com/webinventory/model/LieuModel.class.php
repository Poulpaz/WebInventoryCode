<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LieuModel
 *
 * @author Tristan Reffay
 */
include_once("connexion.php");

//include("../class/Lieu.class.php");

class LieuModel {

    //put your code here
    private $db;

    function __construct() {

        $this->db = getConnexion();
    }

    // recuperer la liste des lieux
    function getLieu() {

// Execution de la requete
        $result = $this->db->query('SELECT * FROM lieu WHERE lieu.libellelieu NOT LIKE "autr%" ORDER BY libellelieu ASC');

// RÃ©cupÃ©ration de tous les enregistrements retourne un tableau
        $listeLieu = $result->fetchAll();
        return $listeLieu;
    }

    function getLieuEditProduit($lieu) {
        $sql = $this->db->prepare("SELECT * FROM lieu WHERE libellelieu NOT LIKE ? ORDER BY libellelieu ASC");
        $sql->bindValue(1, $lieu);
        $sql->execute();
        $liste = $sql->fetchAll();
        return $liste;
    }

    function getLieuNotListe() {

// Execution de la requete
        $result = $this->db->query('SELECT * FROM lieu ORDER BY libellelieu ASC');

// RÃ©cupÃ©ration de tous les enregistrements retourne un tableau
        $listeLieu = $result->fetchAll();
        return $listeLieu;
    }

    function getIdLieuP($libLieu) {

        $sql = $this->db->prepare("SELECT * FROM lieu WHERE libellelieu= ? ");
        $sql->bindValue(1, $libLieu);
        $sql->execute();
        $listeLieu = $sql->fetch();
        return $listeLieu;
    }

    function getLieuSupp($idlieu) {

        $sql = $this->db->prepare("SELECT * FROM lieu WHERE idlieu NOT LIKE ?");
        $sql->bindValue(1, $idlieu);
        $sql->execute();
        $listeLieuSupp = $sql->fetchAll();
        return $listeLieuSupp;
    }

    function updateProduit($idnewlieu, $idoldlieu) {

        $upt = $this->db->prepare("UPDATE produit SET id_lieu = ? WHERE id_lieu= ?");
        $upt->bindValue(1, $idnewlieu);
        $upt->bindValue(2, $idoldlieu);
        $upt->execute();
    }

    function supprimerLieu($idLieu) {
        //envoie de la requete de suppression
        $sql = $this->db->query("DELETE FROM lieu WHERE idlieu= $idLieu");
    }

    function ajouterLieu($lieu) {

        $stmt = $this->db->prepare("INSERT INTO lieu (libellelieu) VALUES (?)");
        $stmt->bindValue(1, $lieu->getLibelle());
        $stmt->execute();
    }

    function selectLieu($idlieu) {

        //requete

        $result = $this->db->query("SELECT * FROM lieu WHERE idlieu=$idlieu");
        $liste = $result->fetch();
        return $liste;
    }

    function updateLieu($libLieu, $idlieu) {

        $upt = $this->db->prepare("UPDATE lieu SET libellelieu = ? WHERE idlieu=?");
        $upt->bindValue(1, $libLieu);
        $upt->bindValue(2, $idlieu);
        $upt->execute();
    }

    function getLibelleLieu($idlieu) {

        $result = $this->db->query("SELECT libellelieu FROM lieu WHERE idlieu=$idlieu");
        $libellelieu = $result->fetch();
        $libelle = $libellelieu['libellelieu'];
        return $libelle;
    }

}
