
<?php

 class ligneAchat{

    private $id_produit;
    private $quantite;
    private $id_achat;

    public function connect(){
        $host="localhost";
        $dbname="gestions_stocks";
        $user="root";
        $pass="";

        $connect = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $connect;
    }


    public function setId_achat($id_achat){
        $this->id_achat=$id_achat;
    }
    public function setIdproduit($id_produit){
        $this->id_produit=$id_produit;
    }
    public function setquantite($quantite){
        $this->$quantite=$quantite;
    }


    public function enregistrerLigne_Achat($id_produit,$id_achat,$quantite){
        $connect=$this->connect();
        $requete=$connect->prepare("INSERT INTO ligneachat (id_produit, id_achat, quantite) VALUES (:id_produit, :id_achat, :quantite)");
        $requete->bindValue(":id_produit", $id_produit);
        $requete->bindValue(":id_achat", $id_achat);
        $requete->bindValue(":quantite", $quantite);
        $test=$requete->execute();
        return $test;

    }

   

    public function supprimerLigne_Achat($id_produit,$id_achat){
        $connect=$this->connect();
        $requete=$connect->query("DELETE FROM ligneachat WHERE  id_produit=$id_produit AND id_achat=$id_achat ");
        $test=$requete->execute();
    }


    public function listProduitCommander($idachat){
        $connect=$this->connect();
        $requete=$connect->query("SELECT * FROM ligneachat where id_achat=$idachat");
        $resultat=$requete->fetchAll();
        return $resultat;

    }

    
    public function modifierLigneachat($id_produit,$id_achat,$quantite){

        $connect=$this->connect();
       $requete=$connect->prepare(" UPDATE ligneachat SET quantite='$quantite' WHERE  id_achat=$id_achat AND  id_produit=$id_produit ");
       $test=$requete->execute();
      //  if($test===true){
      //  echo "mise a jour effectuer avec succer";

      //  }else{
      //      echo "erreur de mise a jour";
      //  }

    }

  
// public function detailachat($id_achat){
//     if(!$id_achat){
//         return "L'ID de l'achat est requis";
//     }
    
//     $connect=$this->connect();
//     $test=$connect->prepare("SELECT produit.nom AS nom_produit, ligneachat.quantite FROM ligneachat 
//     INNER JOIN produit ON ligneachat.id_produit=produit.id_produit
//     INNER JOIN commande_achat ON ligneachat.id_achat=commande_achat.id_achat
//     WHERE  ligneachat.id_achat=:id_achat");
    
//     $test->bindParam(':id_achat', $id_achat, PDO::PARAM_INT);
//     $test->execute(); 
//     $resultat = $test->fetchAll(PDO::FETCH_ASSOC);
//     return $resultat;
// }


public function getProduitsQuantites() {

    $connect=$this->connect();
    $requete=$connect->query("SELECT * FROM ligneachat");
    $resultat=$requete->fetchAll();
    return $resultat;
   
}

    // public function getNomP($id_produit){
    //     $connect=$this->connect();
    //     $test=$connect->query("SELECT nom FROM produit WHERE id_produit=$id_produit");
    //     $resultats=$test->fetchAll();
    //     foreach($resultats as $namep){
    //         $nomp=$namep['nom'];
    //         return $nomp;
    //     }
    //  }

    
    public function quantiteachatproduit($id_produit,$id_jour){
        
            $role=0;
          $connect=$this->connect();
        $requete=$connect->query("SELECT SUM(quantite) as qteachat FROM ligneachat,commande_achat WHERE ligneachat.id_achat=commande_achat.id_achat and id_produit=$id_produit AND id_jour=$id_jour");
        $result=$requete->fetchAll();
           foreach($result as $name){
              $role=$name['qteachat'];
           }
           
           if($role==NULL)
           $role=0;
        return $role;
        }

    
}
