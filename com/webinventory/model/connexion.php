<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//echo "perfect";

function getConnexion() {
    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host=localhost;dbname=webinventory', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        // Configuration du pilote pour activer les exceptions
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo "Échec : " . $e->getMessage();
    }
    return $db;
}