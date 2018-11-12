<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lieu
 *
 * @author Tristan Reffay
 */
class Lieu {

    //put your code here
    private $idLieu;
    private $libelle;

    function __construct() {
        
    }

    function getLibelle() {
        return $this->libelle;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    function getIdLieu() {
        return $this->idLieu;
    }

    function setIdLieu($idLieu) {
        $this->idLieu = $idLieu;
    }

}
