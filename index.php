 

<?php
 session_start();


//  La première ligne session_start(); initialise une session PHP, permettant de stocker des variables 
//  de session qui restent actives pendant la navigation de l'utilisateur sur le site.

include("model/commande_achat.php");
include("model/commande_sortie.php");
include("model/fournisseur.php");
include("model/chauffeur.php");
include("model/camion.php");
include("model/jour.php");
include("model/produit.php");
include("model/vendeur.php");
include("model/utilisateur.php");
include("model/ligne_sortie.php");
include("model/ligne_achat.php");
include("model/ligne_perteVendeur.php");
include("model/stock.php");
include("model/ligne_stock.php");
include("model/ligne_perteMagasin.php");
include("model/ligne_retour.php");
$semaine=["Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche"];
$jour=new jour();
$_SESSION['jour']=$jour->getIdLastjour();
if(!isset($_SESSION['user'])){
    $message="";
    $l="";
    // Le code vérifie si l'utilisateur est connecté en vérifiant si la variable de session $_SESSION['user'] 
    // est définie. Si ce n'est pas le cas, il affiche un formulaire de connexion.

    if(isset($_POST['valider'])){

        // Lorsque le formulaire est soumis (via $_POST['valider']), il récupère les valeurs du nom d'utilisateur
        //  et du mot de passe, crée une instance de la classe utilisateur, vérifie les informations d'identification
        //   avec la méthode isUser, et en cas de succès, redirige l'utilisateur vers la page d'accueil en définissant 
        //   les variables de session $_SESSION['user'] et $_SESSION['role']

        $username=$_POST['username'];
        $pass=$_POST['password'];
        // echo $username."  ".$pass;
        $user=new utilisateur();
        if($user->isUser($username,$pass)){
           $message="succes" ;
           $_SESSION['user']= $username;
           $_SESSION['iduser']= $user->getIduser($_SESSION['user']);
           $_SESSION['role']= $user->getRolesUser($username);
        
            header("location: index.php?page=accueil");
           exit;
        }
        else{
            $message="le username ou le password ne sont correct" ;
        }
    }
    include("vues/login.php");
}
else{
    if(isset($_GET['page'])){
        $page=$_GET['page'];
        // Si l'utilisateur est authentifié (la variable de session $_SESSION['user'] est définie), le code vérifie
        //  quelle page est demandée via $_GET['page']

        if($page=="accueil"){
            include("vues/accueil.php"); 
        }
        

// Gestion des chauffeurs
    if($page=="addchauffeur"){
       
        if(isset($_POST["valider"])){
               $nom = $_POST["nom"];
               $telephone = $_POST["telephone"];
               $adresse= $_POST["adresse"];
               $email= $_POST["email"];
              $chauffeur = new chauffeur();
       $chauffeur->enregistreChauffeur($nom,$telephone,$adresse,$email);
    }
    include("vues/addchauffeur.php"); 
}

        
if($page=="listchauffeur"){
    
    $chauffeur = new chauffeur();
     $listechauffeur= $chauffeur->listchauffeur();

include("vues/listchauffeur.php"); 
 }


       
if ($page=="modifierChauf") {
    $id=$_GET['id'];
    $chauffeur = new chauffeur();
    if(isset($_POST["valider"])){
        $nom = $_POST["nom"];
        $telephone = $_POST["telephone"];
        $adresse= $_POST["adresse"];
        $email= $_POST["email"];

      $chauffeur->modifier_chauffeur($id,$nom,$telephone,$adresse,$email,"en cours");
      header("location: index.php?page=listchauffeur");
      exit;
}
  $detailchauf=$chauffeur->detailchauf($id);
  include("vues/modifierChauf.php");
    
  }


  
  if ($page=="deletechauf") {
    $id=$_GET['id'];
    $chauffeur = new chauffeur();
    if(isset($_POST["valider"])){
        $chauffeur->suspendre_chauffeur($id);
      
    header("location: index.php?page=listchauffeur");
      exit;
  }
        

  include("vues/deletechauf.php");
    
  }


// GESTION DES FOURNISSEURS
            
if($page=="addfournisseur"){
    
    if(isset($_POST["valider"])){
           $nom = $_POST["nom"];
           $telephone = $_POST["telephone"];
           $adresse= $_POST["adresse"];
           $email= $_POST["email"];
          $four = new fournisseur();
          $four->enregistrer_fournisseur($nom,$telephone,$adresse,$email);
}
include("vues/addfournisseur.php"); 
}   

if($page=="listfournisseur"){
    
    $four = new fournisseur();
    $listefour= $four->listFournisseur();

include("vues/listfour.php"); 
}

   
       
if ($page=="modifierFour") {
    $id=$_GET['id'];
    $four = new fournisseur();
    if(isset($_POST["valider"])){
        $nom = $_POST["nom"];
        $telephone = $_POST["telephone"];
        $adresse= $_POST["adresse"];
        $email= $_POST["email"];

        $four->modifier_fourniseure($id,$nom,$telephone,$adresse,$email,"en cours");
        header("location: index.php?page=listfournisseur");
      exit;
}
  $detailfour=$four->detailFour($id);
  include("vues/modifierFour.php");
    
  }


  if ($page=="deleteFour") {
    $id=$_GET['id'];
    $four = new fournisseur();
    if(isset($_POST["valider"])){
        $four->suspendreFournisseur($id);
      
    header("location: index.php?page=listfournisseur");
      exit;
  }
        
  include("vues/deleteFour.php");
    
  }
    
 // Gestion des Camions

     if($page=="addcamion"){
        
        if(isset($_POST["valider"])){
               $nom = $_POST["nom"];
               $immatriculation = $_POST["matriculation"];
               $camion = new camion();
              $camion->enregistrecamion($nom,$immatriculation);
    }
    include("vues/addcamion.php");
 }

            
if($page=="listcamion"){
    
    $camion = new camion();
  $listcamion= $camion->listCamion();

include("vues/listcamion.php"); 
}


           
if ($page=="modifierCamion") {
    $id=$_GET['id'];
    $camion = new camion();
    if(isset($_POST["valider"])){
        $nom = $_POST["nom"];
        $immatriculation = $_POST["immatriculation"];

        $camion->modifier_camion($id, $nom, $immatriculation,"en cours");
        header("location: index.php?page=listcamion");
        exit;
}
  $detailcamion=$camion->detailcamion($id);
  include("vues/modifierCamion.php");
    
  }
      
  
  if ($page=="deleteCamion") {
      $id=$_GET['id'];
      $camion = new camion();
      if(isset($_POST["valider"])){
        $camion->suspendreCamion($id);
        
      header("location: index.php?page=listcamion");
        exit;
    }
          

    include("vues/deleteCamion.php");
      
    }

 // Gestion des Vendeurs

      if ($page=="addvendeur") {
       
        if(isset($_POST["valider"])){
            $nom = $_POST["nom"];
            $telephone = $_POST["telephone"];
            $adresse= $_POST["adresse"];
            $email= $_POST["email"];
            $vendeur = new vendeur();
          $vendeur->enregistrer_vendeur($nom,$telephone,$adresse,$email);
 }
        include("vues/addvendeur.php");
        
      }


               
if($page=="listvendeur"){
    
    $vendeur = new vendeur();
     $listvendeur= $vendeur->listVendeur();

include("vues/listvendeur.php"); 
}

 
if ($page=="modifierVendeur") {
    $id=$_GET['id'];
    $vendeur = new vendeur();
    if(isset($_POST["valider"])){
        $nom = $_POST["nom"];
        $telephone = $_POST["telephone"];
        $adresse= $_POST["adresse"];
        $email= $_POST["email"];

      $vendeur->modifierV($id,$nom,$telephone,$adresse,$email,"en cours");
      header("location: index.php?page=listvendeur");
      exit;
}
$detailvendeur=$vendeur->detailVendeur($id);
 include("vues/modifierVendeur.php");
    
  }

     
          
  if ($page=="deletevend") {
    $id=$_GET['id'];
    $vendeur = new vendeur();
    if(isset($_POST["valider"])){
        $vendeur->suspendre_vendeur($id);
      
    header("location: index.php?page=listvendeur");
      exit;
  }
        
  include("vues/deletevend.php");
    
  }

  // gestion de la journee
  if($page=="listjour"){
    $datejour=date("Y-m-d");
    $tabdate=explode('-',$datejour);
    $timestamp= mktime(0,0,0,$tabdate[1],$tabdate[2],$tabdate[0]);
    $jour1=date('w',$timestamp);
    $nom_jour=$semaine[$jour1-1]." ".$datejour;
    
    if(isset($_POST['valider'])){
        
        $jour->enregistrer_jour($nom_jour,$datejour);
    }

    
    $listjour=$jour->listjour();
    include("vues/listjour.php");
   
    
}


// gestion des achat


if ($page=="addachat") {
  $_SESSION['achat']=[];
  $four = new fournisseur();
  $chauffeur=new chauffeur();
  $camion=new camion();
    if(isset($_POST["next"])){
        $idfour = $_POST["four"];
        $idchauf = $_POST["chauffeur"];
        $idcamion= $_POST["camion"];
      header("location: index.php?page=addachat2&four=$idfour&chauf=$idchauf&camion=$idcamion");
      exit;
  }
  $listfour=$four->listFournisseur();
  $listchauffeur=$chauffeur->listchauffeur();
  $listcamion=$camion->listCamion();
   include("vues/addachat.php");
    
  }
// fin addachat1
  if ($page=="addachat2") {
    $produit=new produit();
   $achat=new commande_achat();
   $ligachat= new ligneAchat();
  $idfour = $_GET["four"];
  $idchauf = $_GET["chauf"];
  $idcamion= $_GET["camion"];

  if(isset($_POST["addproduit"])){
    $idproduit = $_POST["produit"];
    $qte = $_POST["quantite"];
    $nomproduit=$produit->getNomP($idproduit);
    $tab=[
      'idproduit'=>$idproduit,
      'nomproduit'=>$nomproduit,
      'quantite'=>$qte
    ];
    array_push($_SESSION['achat'],$tab);
}

  
if(isset($_POST["valider"])){
$dateachat=date("Y-m-d");
  $idachat=$achat->enregistrer_commandeF($idfour,$idchauf,$idcamion,$_SESSION['iduser'],$_SESSION['jour'],0,$dateachat);
    for($j=0;$j<count($_SESSION['achat']);$j++){
      $ligachat->enregistrerLigne_Achat($_SESSION['achat'][$j]['idproduit'],$idachat,$_SESSION['achat'][$j]['quantite']);
    }

    header("location: index.php?page=listachat");
   
}
  $listproduit=$produit->listProduit();
   include("vues/achat2.php");
    
  }

 // liste achat 

 if($page=="listachat"){
  
  $achat=new commande_achat();
$listachat=$achat->listCmdJour($_SESSION['jour']);
include("vues/listeachat.php"); 

}

// FIN LISTE ACHAT ET DEBUT DETAIL ACHAT





if ($page == "detailachat") {
    
    $produit = new produit();
    $achat = new commande_achat();

        $id_achat = $_GET['id'];

        $ligachat = new ligneAchat();
       

        $detailachat = $achat->detailachat($id_achat);
        $listproduitachat=$ligachat->listProduitCommander($id_achat);
        
    include("vues/detailachat.php");
}




// FIN DETAIL ACHAT

//$four->getNomFour($data3['id_fournisseur'])



// gestion des produits


if($page=="addproduit"){
        
  if(isset($_POST["envoyer"])){
         $nom = $_POST["nom"];
         $categorie = $_POST["categorie"];
         $produit = new produit();
         $produit->enregistrer_produit($nom,0,$categorie,0);
}
include("vues/addproduit.php");
}




if($page=="listproduit"){
  
  $produit = new produit();
  $listproduit= $produit->listproduit();
include("vues/listproduit.php"); 

}


               
if ($page=="modifierproduit") {
  $id=$_GET['id'];
  $produit = new produit();
  if(isset($_POST["valider"])){
      $nom = $_POST["nom"];
      $categorie = $_POST["categorie"];

      $produit->modifier_produit($id,$nom,0,$categorie,0,$etat);
      header("location: index.php?page=listproduit");
      exit;
}
$detailproduit=$produit->detailproduit($id);
include("vues/modifierproduit.php");
  
}


          
  if ($page=="deleteproduit") {
    $id=$_GET['id'];
    $produit = new produit();
    if(isset($_POST["valider"])){
      $produit->supprimerProduit($id);
      
    header("location: index.php?page=listproduit");
      exit;
  }
  include("vues/deleteproduit.php"); 
  }


// fin produt

 

// gestion sortie(sortie1)
if ($page=="addsortie") {
  $_SESSION['sortie']=[];
  $chauffeur=new chauffeur();
  $camion=new camion();
  $vendeur = new vendeur();
    if(isset($_POST["suivant"])){
        $idchauf = $_POST["chauffeur"];
        $idcamion= $_POST["camion"];
        $idvendeur = $_POST["vendeur"];
      header("location: index.php?page=addsortie2&chauffeur=$idchauf&camion=$idcamion&vendeur=$idvendeur");
      exit;
  }

 
  $listchauffeur=$chauffeur->listchauffeur();
  $listcamion=$camion->listCamion();
  $listvend=$vendeur-> listVendeur();
   include("vues/addsortie.php");
    
  }


//fin addsortie1


  if ($page=="addsortie2") {
    $produit=new produit();
   $sortie=new commande_sortie();
   $lignesort= new ligneSortie();
   $idchauf = $_GET["chauffeur"];
   $idcamion= $_GET["camion"];
   $idvendeur = $_GET["vendeur"];
   

  if(isset($_POST["addproduit"])){
    $idproduit = $_POST["produit"];
    $qte = $_POST["quantite"];
    $nomproduit=$produit->getNomP($idproduit);
    $tab=[
      'idproduit'=>$idproduit,
      'nomproduit'=>$nomproduit,
      'quantite'=>$qte
    ];
    array_push($_SESSION['sortie'],$tab);
}

  
if(isset($_POST["valider"])){
$datesortie=date("Y-m-d");
  $idsortie=$sortie->enregistrer_sortie($idchauf,$_SESSION['jour'],$idcamion,$_SESSION['iduser'],$idvendeur,$datesortie);
    for($i=0;$i<count($_SESSION['sortie']);$i++){
      $lignesort->enregistrerLigne_Sortie($_SESSION['sortie'][$i]['idproduit'],$idsortie,$_SESSION['sortie'][$i]['quantite']);
    }

    header("location: index.php?page=listsortie");
   
}
  $listproduit=$produit->listProduit();
   include("vues/sortie2.php");
    
  }

 // liste sortie

 if($page=="listsortie"){
  $sortie=new commande_sortie();
$listsortie=$sortie->listCmdJours($_SESSION['jour']);
include("vues/listsortie.php"); 

}



if ($page == "detailsortie") {
    
  $produit = new produit();
  $sortie=new commande_sortie();

      $id_sortie = $_GET['id'];

      $lignesort= new ligneSortie();
     

      $detailsortie = $sortie->detailsortie($id_sortie);
      $listproduitsortie=$lignesort->listProduitsortie($id_sortie);
      
  include("vues/detailsortie.php");
}

// FIN SORTIE ET DEBUT user

// GESTION RETOUR



if($page=="listretour"){

$idvendeur=0;
  $camion = new camion();
  $chauffeur=new chauffeur();
  $vendeur=new vendeur();
  $utilisateur=new utilisateur();
  $sortie=new commande_sortie();
if(isset($_POST['affiche'])){
  $idvendeur=$_POST['vendeur'];
}
  $listvend=$vendeur-> listVendeur();
  $listsortievendeur=$sortie->listVendeurS($idvendeur);
include("vues/listretour.php"); 
}

if($page=="addretour"){
  $message="";
  $produit = new produit();
  $sortie=new commande_sortie();
  $id_sortie = $_GET['idsortie'];
  $lignesort= new ligneSortie();
  $ligneretour= new ligneRetour();
  $detailretour = $sortie->detailsortie($id_sortie);
  $listproduitretour=$lignesort->listProduitsortie($id_sortie);
     if(isset($_POST['valider'])){
      //debut
      $error = false; // Variable pour suivre s'il y a une erreur

    foreach($listproduitretour as $don) {
      $idproduit = $don['id_produit'];
      $qteretour = $_POST['retour'.$idproduit];

      if($qteretour > $don['quantiteSortie']) {
        $error = true; // Mettre l'erreur à true si la quantité retournée est supérieure à la quantité sortie
        break; // Sortir de la boucle dès qu'une erreur est détectée
      }
    }

    if($error) {
      // echo "Erreur : La quantité retournée est supérieure à la quantité sortie.";
      $message="Erreur : La quantité retournée est supérieure à la quantité sortie.";
    } else {
      // Enregistrement du retour si aucune erreur n'est détectée
      foreach($listproduitretour as $don) {
        $idproduit = $don['id_produit'];
        $qteretour = $_POST['retour'.$idproduit];
        $ligneretour->enregistrerRetour($idproduit, $id_sortie, $qteretour);
      }
      header("location: index.php?page=detailretour&idsortie=$id_sortie");
    }
  }

  include("vues/addRetour.php");


      //fin 

  //     foreach($listproduitretour as $don) {
  //       $idproduit=$don['id_produit'];
  //       $qteretour=$_POST['retour'.$idproduit];
  //       $ligneretour->enregistrerRetour($idproduit,$id_sortie,$qteretour);
  //     }
  //     header("location: index.php?page=detailretour&idsortie=$id_sortie");
  //    }

  // include("vues/addRetour.php"); 

}

if($page=="detailretour"){
  
  $produit = new produit();
  $sortie=new commande_sortie();
  $id_sortie = $_GET['idsortie'];
  $ligneretour= new ligneRetour();
  $detailretour = $sortie->detailsortie($id_sortie);
  $listproduitretour=$ligneretour->detailretour($id_sortie);
     

include("vues/detailretour.php"); 
}

 
if($page=="adduser"){
    $utilisateur = new utilisateur();
  if(isset($_POST["valider"])){
    $usernames = $_POST["usernames"];
         $email = $_POST["email"];
         $passwords = $_POST["passwords"];
         $roles = $_POST["roles"];
         
         $utilisateur->enregistrerUser($usernames,$email,$passwords,$roles);
}
include("vues/adduser.php");
}
 
           
if($page=="listuser"){
    
  $utilisateur = new utilisateur();
$listuser= $utilisateur->listuser();

include("vues/listuser.php"); 
}


 
if ($page=="modifieruser") {
  $id=$_GET['id'];
  $utilisateur = new utilisateur();
  if(isset($_POST["valider"])){
    $usernames = $_POST["usernames"];
    $email = $_POST["email"];
    $passwords = $_POST["passwords"];
    $roles = $_POST["roles"];

    $utilisateur->modifierUser($id, $usernames, $email, $passwords, $roles);
    header("location: index.php?page=listuser");
    exit;
}
$detailuser=$utilisateur->detailuser($id);
include("vues/modifieruser.php");
  
}


            
  if ($page=="deleteuser") {
    $id=$_GET['id'];
    $utilisateur = new utilisateur();
    if(isset($_POST["valider"])){
      $utilisateur->supprimerUser($id);
      
    header("location: index.php?page=listuser");
      exit;
  }
        
  include("vues/deleteuser.php");
    
  }

// FIN user

// GESTION STOCK

       
if($page=="stock"){
    
  $ligachat = new ligneAchat();
  $ligstock = new ligneStock();
  $ligretour = new ligneRetour();
  $ligsortie = new lignesortie();
  $produit = new produit();
  $listproduit= $produit->listproduit();
include("vues/stock.php"); 
}




//fin stock

  if($page=="logout"){
    // Pour la page "logout", il détruit la session et redirige vers la page principale
    session_destroy();
    header("location: index.php"); 
}
       
        // if($page=="addfournisseur"){
            
        //     include("vues/addfournisseur.php"); 
        //     if(isset($_POST["valider"])){
        //         $username = $_POST["username"];
        //         $telephone = $_POST["tel"];
        //         $adresse = $_POST["adresse"];
        //         $email = $_POST["email"];
                
        //         $four = new fournisseur();
        //         if($four->enregistrer_fournisseur($username,$telephone,$adresse,$email)){
        //             $message= "fournisseur enregistrer avec succes";

        //             // header("location: index.php?page=accueil");
        //             exit;
        //         }else{
        //             $message="echec";
        //         }


        //     }
        // }

    }

  }
?>