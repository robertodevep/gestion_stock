
<?php

 class ligneSortie{
    private $id_sortie;
    private $id_produit;
    private $quantiteSorti;


    public function connect(){
        $host="localhost";
        $dbname="gestions_stocks";
        $user="root";
        $pass="";

        $connect = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $connect;
    }


    public function setIdsortie($id_sortie){
        $this->id_sortie=$id_sortie;
    }
    public function setIdproduit($id_produit){
        $this->id_produit=$id_produit;
    }
    public function setquantiteSorti($quantiteSorti){
        $this->quantiteSorti=$quantiteSorti;
    }
       


    public function enregistrerLigne_Sortie($id_produit,$id_sortie,$quantiteSorti){
        $connect=$this->connect();
        $requete=$connect->prepare("INSERT INTO lignesortie (id_produit, id_sortie, quantiteSortie) VALUES (:id_produit, :id_sortie, :quantiteSortie)");
        $requete->bindValue(":id_produit", $id_produit);
        $requete->bindValue(":id_sortie", $id_sortie);
        $requete->bindValue(":quantiteSortie", $quantiteSorti);
        $test=$requete->execute();
        return $test;
    }



    public function modifierLigne_Sortie($id_produit,$id_sortie,$quantiteSortie){
        $connect=$this->connect();
        $requete=$connect->prepare("UPDATE lignesortie SET quantiteSortie=:quantiteSortie WHERE id_sortie=:id_sortie AND id_produit=:id_produit");
        $requete->bindValue(":id_produit",$id_produit);  
        $requete->bindValue(":id_sortie",$id_sortie);
        $requete->bindValue(":quantiteSortie",$quantiteSortie);
        $test=$requete->execute();
        return $test;
    }
    
    

    public function supprimerLigne_Sortie($id_sortie,$id_produit){
        $connect=$this->connect();
        $requete=$connect->query("DELETE FROM lignesortie WHERE id_sortie=$id_sortie AND id_produit=$id_produit");
        $test=$requete->execute();

    }



    public function listProduit_Sortie(){
        $connect=$this->connect();
        $requete=$connect->query("SELECT * FROM lignesortie ");
        $resultat=$requete->fetchAll();
        return $resultat;
    
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
    
  
    //  public function detailsortie($id_sortie){
    //     if(!$id_achat){
    //         return "L'ID de la sortie est requis";
    //     }
        
    //     $connect=$this->connect();
    //     $test=$connect->prepare("SELECT produit.nom AS nom_produit, lignesortie.quantite FROM lignesortie 
    //     INNER JOIN produit ON lignesortie.id_produit=produit.id_produit
    //     INNER JOIN commande_sortie ON lignesortie.id_sortie=commande_sortie.id_sortie
    //     WHERE  lignesortie.id_sortie=:id_sortie");
        
    //     $test->bindParam(':id_sortie', $id_sortie, PDO::PARAM_INT);
    //     $test->execute(); 
    //     $resultat = $test->fetchAll(PDO::FETCH_ASSOC);
    //     return $resultat;
    // }


    public function listProduitsortie($id_sortie){
        $connect=$this->connect();
        $requete=$connect->query("SELECT * FROM lignesortie where id_sortie=$id_sortie");
        $resultat=$requete->fetchAll();
        return $resultat;

    }
    
    public function quantitesortieproduit($id_produit,$id_jour){
       
            $role=0;
          $connect=$this->connect();
        $requete=$connect->query("SELECT SUM(quantiteSortie) as qtesortie FROM lignesortie,commande_sortie WHERE lignesortie.id_sortie=commande_sortie.id_sortie and id_produit=$id_produit AND id_jour=$id_jour");
        $result=$requete->fetchAll();
           foreach($result as $name){
              $role=$name['qtesortie'];
           }
           
           if($role==NULL)
           $role=0;
        return $role;
        }


}

?>
