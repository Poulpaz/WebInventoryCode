<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilisateur
 *
 * @author Tristan Reffay
 */
class Utilisateur {
    //put your code here
    private $idUtilisateur;
    private $nom;
    private $prenom;
    private $email;
    private $identifiant;
    private $motdepasse;
    
    function __construct() {
        
    }
    
    function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getEmail() {
        return $this->email;
    }

    function getIdentifiant() {
        return $this->identifiant;
    }

    function getMotdepasse() {
        return $this->motdepasse;
    }

    function setIdUtilisateur($idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setIdentifiant($identifiant) {
        $this->identifiant = $identifiant;
    }

    function setMotdepasse($motdepasse) {
        $this->motdepasse = $motdepasse;
    }


}
