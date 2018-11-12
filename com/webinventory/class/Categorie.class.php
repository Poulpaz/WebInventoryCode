<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categorie
 *
 * @author Tristan Reffay
 */
class Categorie {
    //put your code here
    private $idCategorie;
    private $libelle;
    private $logoImage;
    
    function __construct() {
        
    }
    
    function getLib() {
        return $this->libelle;
    }

    function getLogoImage() {
        return $this->logoImage;
    }

    function setLib($libelle) {
        $this->libelle = $libelle;
    }

    function setLogoImage($logoImage) {
        $this->logoImage = $logoImage;
    }
    
    function getIdCategorie() {
        return $this->idCategorie;
    }

    function setIdCategorie($idCategorie) {
        $this->idCategorie = $idCategorie;
    }


}
