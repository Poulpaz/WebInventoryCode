<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//déclaration de l'objet de type action

$action = filter_input(INPUT_GET, "action");


//********************************************************************************************************//
//                                                                                                        //
//                                          Produits                                                      //
//                                                                                                        //
//********************************************************************************************************//

if ($action == "produit") {
    include ('../model/ProduitModel.class.php');
    $produitModel = new ProduitModel();
    $listeProduit = $produitModel->getProduit();
    //print_r($listeProduit);
    include_once ('../view/listeProduit.php');
    exit();
}

if ($action == "ajouterproduit") {

    $mess = filter_input(INPUT_GET, "mess");
    if ($mess == 1) {
        include('../model/UtilisateurModel.class.php');
        include('../model/CategorieModel.class.php');
        include('../model/LieuModel.class.php');

        $libcategorie = filter_input(INPUT_GET, "categorie");
        $liblieu = filter_input(INPUT_GET, "lieu");
        $utilisateur = filter_input(INPUT_GET, "utilisateur");

        $userModel = new UtilisateurModel();
        $listeUser = $userModel->getUserEditProduit($utilisateur);
        $catModel = new CategorieModel();
        $listeCat = $catModel->getCategorieEditProduit($libcategorie);
        $lieuModel = new LieuModel();
        $listeLieu = $lieuModel->getLieuEditProduit($liblieu);

        include ('../view/editerProduit.php');

        exit();
    } else {
        include('../model/UtilisateurModel.class.php');
        include('../model/CategorieModel.class.php');
        include('../model/LieuModel.class.php');

        $userModelP = new UtilisateurModel();
        $listeUserP = $userModelP->getUtilisateurNotListe();
        $catModelP = new CategorieModel();
        $listeCatP = $catModelP->getCategorieNotListe();
        $lieuModelP = new LieuModel();
        $listeLieuP = $lieuModelP->getLieuNotListe();

        include ('../view/editerProduit.php');

        exit();
    }
}

if ($action == "validerproduit") {
    include ('../model/ProduitModel.class.php');
    include ('../model/CategorieModel.class.php');
    include ('../model/LieuModel.class.php');
    include ('../model/UtilisateurModel.class.php');
    include ('../class/Produit.class.php');

    $produit = new Produit();
    $libelleP = htmlspecialchars(filter_input(INPUT_POST, 'lib'));
    $descriptionP = htmlspecialchars(filter_input(INPUT_POST, 'description'));
    $quantiteP = htmlspecialchars(filter_input(INPUT_POST, 'quantite'));
    $imgP = htmlspecialchars(filter_input(INPUT_POST, 'img'));
    $userP = filter_input(INPUT_POST, 'user');
    $lieuP = filter_input(INPUT_POST, 'lieu');
    $catP = filter_input(INPUT_POST, 'categorie');

    $userModelP = new UtilisateurModel();
    $catModelP = new CategorieModel();
    $lieuModelP = new LieuModel();

    $listeLieuP2 = $lieuModelP->getIdLieuP($lieuP);
    $listeCatP2 = $catModelP->getIdCatP($catP);
    $listeUserP2 = $userModelP->getIdUserP($userP);
//    print_r($listeLieuP2);
//    print_r($listeCatP2);
//    print_r($listeUserP2);
    $produit->setLibe($libelleP);
    $produit->setDescription($descriptionP);
    $produit->setQuantite($quantiteP);
    $produit->setImage($imgP);
    $idLieu = $listeLieuP2['idlieu'];
    $idCat = $listeCatP2['idcategorie'];
    $idUser = $listeUserP2['idutilisateur'];

    $produitModel = new ProduitModel();
    $produitModel->ajouterProduit($produit, $idLieu, $idCat, $idUser);
//print_r($produitModel);
    header("Location:patron.php?action=produit");
    exit();
}

if ($action == "supprimerproduit") {


    include_once ('../model/ProduitModel.class.php');

    $produitModel = new ProduitModel();
// recuperation de l'id
    $idproduit = filter_input(INPUT_GET, 'idproduit');
// appel de la méthode supprimer
    $produitModel->supprimerProduit($idproduit);
// renvoie avec tableau sans élément supprimé
    header("Location:patron.php?action=produit");

    exit();
}

if ($action == 'baisserquantite') {

    include ('../model/ProduitModel.class.php');
    $produitModel = new ProduitModel();
    $idProduit = filter_input(INPUT_GET, 'idproduit');
    $qteProduit = filter_input(INPUT_GET, 'quantite');
    $produitModel->supprimerQte($idProduit, $qteProduit);

    header("Location:patron.php?action=produit");

    exit();
}

if ($action == 'augmenterquantite') {

    include ('../model/ProduitModel.class.php');
    $produitModel = new ProduitModel();
    $idProduit = filter_input(INPUT_GET, 'idproduit');
    $qteProduit = filter_input(INPUT_GET, 'quantite');
    $produitModel->ajouterQte($idProduit, $qteProduit);

    header("Location:patron.php?action=produit");

    exit();
}

if ($action == "modifierproduit") {

    include_once ('../model/ProduitModel.class.php');
    include_once ('../model/UtilisateurModel.class.php');
    include_once ('../model/LieuModel.class.php');
    include_once ('../model/CategorieModel.class.php');
    $produit = filter_input(INPUT_GET, "idproduit");
    //print_r($lieu);

    $produitModelProd = new ProduitModel();
    $listeProduitInfo = $produitModelProd->selectProduit($produit);

    $libelleproduit = $listeProduitInfo['libelle'];
    $descriptionproduit = $listeProduitInfo['description'];
    $quantiteproduit = $listeProduitInfo['quantite'];
    $idcategorie = $listeProduitInfo['id_categorie'];
    $idlieu = $listeProduitInfo['id_lieu'];
    $idutilisateur = $listeProduitInfo['id_utilisateur'];
    $categorieModel = new CategorieModel();
    $lieuModel = new LieuModel();
    $utilisateurModel = new UtilisateurModel();
    $libellecategorie = $categorieModel->getLibelleCat($idcategorie);
    $libellelieu = $lieuModel->getLibelleLieu($idlieu);
    $prenomutilisateur = $utilisateurModel->getPrenomUtilisateur($idutilisateur);

    $idupproduit = $listeProduitInfo['idproduit'];
    //print_r($logoCategorie);
    header("Location:patron.php?action=ajouterproduit&mess=1&lib=$libelleproduit&idproduit=$idupproduit&description=$descriptionproduit&quantite=$quantiteproduit&categorie=$libellecategorie&lieu=$libellelieu&utilisateur=$prenomutilisateur");
    exit();
}

if ($action == "updateproduit") {

    include_once ('../model/ProduitModel.class.php');
    include_once ('../class/Produit.class.php');
    include('../model/UtilisateurModel.class.php');
    include('../model/CategorieModel.class.php');
    include('../model/LieuModel.class.php');

    $userModel = new UtilisateurModel();
    $catModel = new CategorieModel();
    $lieuModel = new LieuModel();

    $user = filter_input(INPUT_POST, 'user');
    $lieu = filter_input(INPUT_POST, 'lieu');
    $cat = filter_input(INPUT_POST, 'categorie');
    $listeLieu = $lieuModel->getIdLieuP($lieu);
    $listeCat = $catModel->getIdCatP($cat);
    $listeUser = $userModel->getIdUserP($user);
    $idLieu = $listeLieu['idlieu'];
    $idCat = $listeCat['idcategorie'];
    $idUser = $listeUser['idutilisateur'];

    $produit = new Produit();
    $produit->setLibe(htmlspecialchars(filter_input(INPUT_POST, 'lib')));
    $produit->setDescription(htmlspecialchars(filter_input(INPUT_POST, 'description')));
    $produit->setQuantite(htmlspecialchars(filter_input(INPUT_POST, 'quantite')));

    $idupdateproduit = filter_input(INPUT_GET, 'idprod');
    $prodModelUpdate = new ProduitModel();
    //print_r($produit);
    $prodModelUpdate->updateProduit($produit, $idupdateproduit, $idLieu, $idCat, $idUser);
    header("Location:patron.php?action=produit");
    exit();
}

//********************************************************************************************************//
//                                                                                                        //
//                                          Lieux                                                         //
//                                                                                                        //
//********************************************************************************************************//
//afficher lieux
if ($action == "lieu") {


    include ('../model/LieuModel.class.php');

    $lieuModel = new LieuModel();
    $listeLieu = $lieuModel->getLieu();

    include_once ('../view/listeLieu.php');
    exit();
}
if ($action == "ajouterlieu") {

    include ('../view/editerLieu.php');
    exit();
}
if ($action == "validerlieu") {
    include ('../model/LieuModel.class.php');
    include ('../class/Lieu.class.php');

    $lieu = new Lieu();
    $lieu->setLibelle(filter_input(INPUT_GET, "lib"));
    $lieuModel = new LieuModel();
    $lieuModel->ajouterLieu($lieu);
    header("Location:patron.php?action=lieu");
    exit();
}
if ($action == "prepasupprimerlieu") {

    include_once ('../model/LieuModel.class.php');
    include_once ('../model/ProduitModel.class.php');
    include ('../class/Lieu.class.php');
    include ('../class/Produit.class.php');

    $prodlieu = new ProduitModel();
// recuperation de l'id
    $idlieu = filter_input(INPUT_GET, 'idlieu');
    $listeProdLieu = $prodlieu->selectProdLieu($idlieu);
    $changeLieu = new LieuModel();
    $listeChangeLieu = $changeLieu->getLieuSupp($idlieu);
    //print_r($listeChangeUser);
    include('../view/verifProduitLieu.php');

    exit();
}
if ($action == "supprimerlieu") {
    include_once ('../model/LieuModel.class.php');
    include_once ('../class/Lieu.class.php');

    $idoldlieu = filter_input(INPUT_GET, 'idoldlieu');
    $dellieu = new LieuModel();
// recuperation de l'id
    $libellenewlieu = filter_input(INPUT_POST, 'lieu');
// appel de la méthode supprimer
    
    $listelieu = $dellieu->getIdLieuP($libellenewlieu);
    $idnewlieu = $listelieu['idlieu'];
    $dellieu->updateProduit($idnewlieu, $idoldlieu);
    //print_r($idoldutilisateur);
    $dellieu->supprimerLieu($idoldlieu);
// renvoie avec tableau sans élément supprimé

    header("Location:patron.php?action=lieu");

    exit();
}

if ($action == "modifierlieu") {

    include_once ('../model/LieuModel.class.php');
    $lieu = filter_input(INPUT_GET, "idlieu");
    //print_r($lieu);
    $lieuModelLieu = new LieuModel();
    $listeLieuInfo = $lieuModelLieu->selectLieu($lieu);
    //print_r($listeLieuInfo);
    $libellelieu = $listeLieuInfo['libellelieu'];
    $iduplieu = $listeLieuInfo['idlieu'];
    header("Location:patron.php?action=ajouterlieu&mess=1&lib=$libellelieu&idlieu=$iduplieu");
    exit();
}

if ($action == "updatelieu") {

    include_once ('../model/LieuModel.class.php');
    include ('../class/Lieu.class.php');
    $lieu = filter_input(INPUT_POST, 'lib');
    $idupdatelieu = filter_input(INPUT_GET, 'idlieu');
    $lieuModelUpdate = new LieuModel();
    $lieuModelUpdate->updateLieu($lieu, $idupdatelieu);
    header("Location:patron.php?action=lieu");
    exit();
}

//********************************************************************************************************//
//                                                                                                        //
//                                          Categories                                                    //
//                                                                                                        //
//********************************************************************************************************//
if ($action == "categorie") {


    include ('../model/CategorieModel.class.php');

    $catModel = new CategorieModel();
    $listeCat = $catModel->getCategorie();

    include_once ('../view/listeCategorie.php');
    exit();
}

if ($action == "ajoutercategorie") {

    include ('../view/editerCategorie.php');
    exit();
}

if ($action == "validercategorie") {
    include ('../model/CategorieModel.class.php');
    include ('../class/Categorie.class.php');
    $cat = new Categorie();
    $cat->setLib(filter_input(INPUT_GET, "lib"));
    $cat->setLogoImage(filter_input(INPUT_GET, "img"));
    $cat2Model = new CategorieModel($cat);
    $cat2Model->ajouterCategorie($cat);
    header("Location:patron.php?action=categorie");
    exit();
}

if ($action == "prepasupprimercategorie") {

    include_once ('../model/CategorieModel.class.php');
    include_once ('../model/ProduitModel.class.php');
    include ('../class/Categorie.class.php');
    include ('../class/Produit.class.php');

    $prodcat = new ProduitModel();
// recuperation de l'id
    $idcat = filter_input(INPUT_GET, 'idcategorie');
    $listeProdCat = $prodcat->selectProdCat($idcat);
    $changeCategorie = new CategorieModel();
    $listeChangeCategorie = $changeCategorie->getCatSupp($idcat);
    //print_r($listeChangeCategorie);
    include('../view/verifProduitCategorie.php');

    exit();
}

if ($action == "supprimercategorie") {
    include_once ('../model/CategorieModel.class.php');
    include_once ('../class/Categorie.class.php');

    $idoldcat = filter_input(INPUT_GET, 'idoldcat');
    $delcat = new CategorieModel();
// recuperation de l'id
    $libellenewcat = filter_input(INPUT_POST, 'categorie');
// appel de la méthode supprimer
    
    $listecat = $delcat->getIdCatP($libellenewcat);
    $idnewcat = $listecat['idcategorie'];
    $delcat->updateProduit($idnewcat, $idoldcat);
    //print_r($idoldutilisateur);
    $delcat->supprimerCategorie($idoldcat);
// renvoie avec tableau sans élément supprimé

    header("Location:patron.php?action=categorie");

    exit();
}

if ($action == "modifiercategorie") {

    include_once ('../model/CategorieModel.class.php');
    $categorie = filter_input(INPUT_GET, "idcategorie");
    //print_r($lieu);
    $categorieModelCat = new CategorieModel();
    $listeCategorieInfo = $categorieModelCat->selectCategorie($categorie);
    //print_r($listeLieuInfo);
    $libellecategorie = $listeCategorieInfo['libellecat'];

    $idupcategorie = $listeCategorieInfo['idcategorie'];
    //print_r($logoCategorie);
    header("Location:patron.php?action=ajoutercategorie&mess=1&lib=$libellecategorie&idcategorie=$idupcategorie");
    exit();
}

if ($action == "updatecategorie") {

    include_once ('../model/CategorieModel.class.php');
    $categorie = filter_input(INPUT_POST, 'lib');
    $idupdatecategorie = filter_input(INPUT_GET, 'idcategorie');
    $catModelUpdate = new CategorieModel();
    $catModelUpdate->updateCategorie($categorie, $idupdatecategorie);
    header("Location:patron.php?action=categorie");
    exit();
}

//********************************************************************************************************//
//                                                                                                        //
//                                          Utilisateurs                                                  //
//                                                                                                        //
//********************************************************************************************************//

if ($action == "utilisateur") {

    $mess = filter_input(INPUT_GET, 'meserreur');
    if ($mess == "1") {
        $erreur1 = "Identifiant ou mot de passe incorrects !";
    }
    include ('../view/indexUtilisateur.php');

    exit();
}

if ($action == "listerutilisateur") {

    include ('../model/UtilisateurModel.class.php');

    $userModel = new UtilisateurModel();
    $listeUser = $userModel->getUtilisateur();

    include_once ('../view/listeUtilisateur.php');
    exit();
}

if ($action == "ajouterutilisateur") {

    include ('../model/UtilisateurModel.class.php');
    include ('../class/Utilisateur.class.php');

    $nom = filter_input(INPUT_GET, "nom");
    $prenom = filter_input(INPUT_GET, "prenom");
    $mail = filter_input(INPUT_GET, "mail");
    $ident = filter_input(INPUT_GET, "ident");
    $mdp = filter_input(INPUT_GET, "mdp");
    //print_r($info);

    $user = new Utilisateur();
    $user->setNom($nom);
    $user->setPrenom($prenom);
    $user->setEmail($mail);
    $user->setIdentifiant($ident);
    //$pass_hache = sha1($mdp);
    $user->setMotdepasse($mdp);
    $userModel = new UtilisateurModel();
    $userModel->ajouterUtilisateur($user);
//$erreur = "Vous êtes bien enregistré";
    header("Location:patron.php?action=utilisateur");
}


if ($action == "prepasupprimerutilisateur") {

    include_once ('../model/UtilisateurModel.class.php');
    include_once ('../model/ProduitModel.class.php');
    include ('../class/Utilisateur.class.php');
    include ('../class/Produit.class.php');

    $produser = new ProduitModel();
// recuperation de l'id
    $idutilisateur = filter_input(INPUT_GET, 'idutilisateur');
    $listeProdUser = $produser->selectProdUser($idutilisateur);
    $changeUser = new UtilisateurModel();
    $listeChangeUser = $changeUser->getUserSupp($idutilisateur);
    //print_r($listeChangeUser);
    include('../view/verifProduitUser.php');

    exit();
}

if ($action == "supprimerutilisateur") {

    include_once ('../model/UtilisateurModel.class.php');
    include_once ('../class/Utilisateur.class.php');

    $idoldutilisateur = filter_input(INPUT_GET, 'idolduser');
    $deluser = new UtilisateurModel();
// recuperation de l'id
    $prenomnewutilisateur = filter_input(INPUT_POST, 'user');
// appel de la méthode supprimer
    
    $listeutilisateur = $deluser->getIdUserP($prenomnewutilisateur);
    $idnewutilisateur = $listeutilisateur['idutilisateur'];
    $deluser->updateProduit($idnewutilisateur, $idoldutilisateur);
    //print_r($idoldutilisateur);
    $deluser->supprimerUtilisateur($idoldutilisateur);
// renvoie avec tableau sans élément supprimé

    header("Location:patron.php?action=listerutilisateur");

    exit();
}

if ($action == "verifierutilisateur") {

    include_once('../model/UtilisateurModel.class.php');
    include ('../class/Utilisateur.class.php');



    $identco = filter_input(INPUT_GET, "ident");
    $mdpco = filter_input(INPUT_GET, "mdp");

    $test = new Utilisateur();
    $test->setIdentifiant($identco);
    $test->setMotdepasse($mdpco);
    $verif = new UtilisateurModel();
    $verif->chercherChamps($test);
}

if ($action == "main") {
    include('../view/main.php');
//echo 'Connexion réussie avec succès !!';
}