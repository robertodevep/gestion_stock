<?php
include("model/fournisseur.php");
 include("model/camion.php");
 include("model/chauffeur.php");
 include("model/jour.php");
 include("model/vendeur.php");
 include("model/produit.php");
$idfour=$_GET['id'];
 $idcamion=$_GET['id'];
$idchauffeur=$_GET['id'];
$idjour=$_GET['id'];
$id_vendeur=$_GET['id'];
$id_produit=$_GET['id'];
// recuperation de id

$four=new fournisseur();
 $camion=new camion();
 $chauffeur=new chauffeur();
 $jour=new jour();
 $vendeur=new vendeur();
 $produit=new produit();
$four->suspendreFournisseur($idfour);
 $camion->suspendreCamion($idcamion);
 $chauffeur->suspendre_chauffeur($idchauffeur);
$jour->suspendre_jour($idjour);
$vendeur->suspendre_vendeur($id_vendeur);
$produit->suspendre_produit($id_produit);
header("location:index.php");