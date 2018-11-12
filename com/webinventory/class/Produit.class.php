<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produit
 *
 * @author Tristan Reffay
 */
class Produit {

    //put your code here
    private $idProduit;
    private $libelle;
    private $description;
    private $quantite;
    private $image;

    function __construct() {
        
    }

    function getIdProduit() {
        return $this->idProduit;
    }

    function getLibe() {
        return $this->libelle;
    }

    function getDescription() {
        return $this->description;
    }

    function getQuantite() {
        return $this->quantite;
    }

    function getImageP() {
        return $this->image;
    }

    function setIdProduit($idProduit) {
        $this->idProduit = $idProduit;
    }

    function setLibe($libelle) {
        $this->libelle = $libelle;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    function setImage($image) {
        $this->image = $image;
    }

}
