
<?php

class produit{
    private $nom;
    private $quantite;
    private $categorie;
    private $fournisseur;
    private $etat;

    public function connect(){
        $host="localhost";
        $dbname="gestions_stocks";
        $user="root";
        $pass="";

        $connect = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $connect;
    }

    // en cours
    public function enregistrer_produit($nom,$quantite,$categorie,$fournisseur){

        try{

        $connect=$this->connect();
        $requete=$connect->prepare("INSERT INTO produit VALUES(NULL,:nom,:quantite,:categorie,:fournisseur,'en cours')");
        $requete->bindValue(':nom',$nom);
        $requete->bindValue(':quantite',$quantite);
        $requete->bindValue(':categorie',$categorie);
        $requete->bindValue(':fournisseur',$fournisseur);
       
        $test=$requete->execute();
        return $test;

    } catch (\Throwable $th) {
    echo "erreur".$th->getMessage();
  }
 
}
    


  public function modifier_produit($id_produit,$nom,$quantite,$categorie,$fournisseur,$etat){

        $connect = $this->Connect();
        $requete = $connect->prepare(" UPDATE produit SET nom='$nom', quantite=$quantite,categorie='$categorie',fournisseur='$fournisseur',etat='$etat'  WHERE id_produit=$id_produit");
        $test=$requete->execute();
        // if($test === true){
        //     echo "mise a jour effectuer avec succès";
        // } else {
        //     echo "erreur de mise a jour";
        // }
    }


    
    public function listproduit(){
        $connect=$this->connect();
        $requete=$connect->query("SELECT * FROM produit");
        $resultat=$requete->fetchAll();
        return $resultat;
  
      }

     
    public function suspendre_produit($id_produit){
        $connect=$this->connect();
        $test=$connect->query("UPDATE produit SET etat='arret' WHERE id_produit=$id_produit");
      }


      
    public function supprimerProduit($id_produit){
        $connect=$this->connect();
        $requete=$connect->query("DELETE FROM produit WHERE id_produit=$id_produit");
        $test=$requete->execute();
  
      }

    
      public function getNomP($id_produit){
        $connect=$this->connect();
        $test=$connect->query("SELECT nom FROM produit WHERE id_produit=$id_produit");
        $resultats=$test->fetchAll();
        foreach($resultats as $namep){
            $nomp=$namep['nom'];
            return $nomp;
        }
     }


     public function detailproduit($id){
      $connect=$this->connect();
      $requete=$connect->query("SELECT*FROM produit WHERE etat='en cours' and id_produit=$id");
      $resultat=$requete->fetchAll();
      return $resultat;
  
    }
    
    }



?>
    