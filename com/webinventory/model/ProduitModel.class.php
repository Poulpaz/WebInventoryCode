<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProduitModel
 *
 * @author Tristan Reffay
 */
include_once("connexion.php");

class ProduitModel {

    //put your code here
    private $db;

    function __construct() {

        $this->db = getConnexion();
    }

    // recuperer la liste des utilisateurs
    function getProduit() {

// Execution de la requete
        $result = $this->db->query('SELECT * FROM produit, utilisateur, lieu, categorie WHERE utilisateur.idutilisateur=produit.id_utilisateur AND lieu.idlieu=produit.id_lieu AND categorie.idcategorie=produit.id_categorie ORDER BY libelle ASC');

// RÃ©cupÃ©ration de tous les enregistrements retourne un tableau
        $listeProduit = $result->fetchAll();
        return $listeProduit;
    }

    function selectProdUser($idutilisateur) {

        $sql = $this->db->prepare("SELECT * FROM utilisateur, produit, categorie, lieu WHERE idutilisateur = ? AND utilisateur.idutilisateur = produit.id_utilisateur AND lieu.idlieu=produit.id_lieu AND categorie.idcategorie=produit.id_categorie ORDER BY libelle ASC ");
        $sql->bindValue(1, $idutilisateur);
        $sql->execute();
        $listeProdUser = $sql->fetchAll();
        return $listeProdUser;
    }

    function selectProdLieu($idlieu) {

        $sql = $this->db->prepare("SELECT * FROM lieu, utilisateur, produit, categorie WHERE idlieu = ? AND lieu.idlieu=produit.id_lieu AND utilisateur.idutilisateur = produit.id_utilisateur AND categorie.idcategorie=produit.id_categorie ORDER BY libelle ASC ");
        $sql->bindValue(1, $idlieu);
        $sql->execute();
        $listeProdLieu = $sql->fetchAll();
        return $listeProdLieu;
    }

    function selectProdCat($idcat) {

        $sql = $this->db->prepare("SELECT * FROM lieu, utilisateur, produit, categorie WHERE idcategorie = ? AND categorie.idcategorie=produit.id_categorie AND lieu.idlieu=produit.id_lieu AND utilisateur.idutilisateur = produit.id_utilisateur ORDER BY libelle ASC ");
        $sql->bindValue(1, $idcat);
        $sql->execute();
        $listeProdCat = $sql->fetchAll();
        return $listeProdCat;
    }

    function supprimerQte($idProduit, $qteProduit) {

        $newQte = $qteProduit - 1;
        $rqt = "UPDATE produit SET quantite =$newQte WHERE idproduit=$idProduit";
        $this->db->query($rqt);
    }

    function ajouterQte($idProduit, $qteProduit) {

        $newQte = $qteProduit + 1;
        $rqt = "UPDATE produit SET quantite =$newQte WHERE idproduit=$idProduit";
        $this->db->query($rqt);
    }

    function supprimerProduit($idproduit) {

        $sql = "DELETE FROM produit WHERE idproduit=$idproduit";
        $this->db->query($sql);
    }

    function ajouterProduit($produit, $lieuP, $catP, $userP) {

        $sqm = $this->db->prepare("INSERT INTO produit (libelle, description, quantite, image, id_utilisateur, id_lieu, id_categorie) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sqm->bindValue(1, $produit->getLibe());
        $sqm->bindValue(2, $produit->getDescription());
        $sqm->bindValue(3, $produit->getQuantite());
        $sqm->bindValue(4, $produit->getImageP());
        $sqm->bindValue(5, $userP);
        $sqm->bindValue(6, $lieuP);
        $sqm->bindValue(7, $catP);
        $sqm->execute();
    }

    function selectProduit($idproduit) {

        //requete

        $result = $this->db->query("SELECT * FROM produit WHERE idproduit=$idproduit");
        $liste = $result->fetch();
        return $liste;
    }

    function updateProduit($produit, $idprod, $lieu, $cat, $user) {

        $upt1 = $this->db->prepare("UPDATE produit SET libelle = ? WHERE idproduit = ?");
        $upt1->bindValue(1, $produit->getLibe());
        $upt1->bindValue(2, $idprod);
        $upt1->execute();
        $upt2 = $this->db->prepare("UPDATE produit SET description = ? WHERE idproduit = ?");
        $upt2->bindValue(1, $produit->getDescription());
        $upt2->bindValue(2, $idprod);
        $upt2->execute();
        $upt3 = $this->db->prepare("UPDATE produit SET quantite = ? WHERE idproduit = ?");
        $upt3->bindValue(1, $produit->getQuantite());
        $upt3->bindValue(2, $idprod);
        $upt3->execute();
        $upt4 = $this->db->prepare("UPDATE produit SET id_lieu = ? WHERE idproduit = ?");
        $upt4->bindValue(1, $lieu);
        $upt4->bindValue(2, $idprod);
        $upt4->execute();
        $upt5 = $this->db->prepare("UPDATE produit SET id_categorie = ? WHERE idproduit = ?");
        $upt5->bindValue(1, $cat);
        $upt5->bindValue(2, $idprod);
        $upt5->execute();
        $upt6 = $this->db->prepare("UPDATE produit SET id_utilisateur = ? WHERE idproduit = ?");
        $upt6->bindValue(1, $user);
        $upt6->bindValue(2, $idprod);
        $upt6->execute();
    }

}
