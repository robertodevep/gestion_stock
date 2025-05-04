
<?php

class ligneRetour{
    private $id_produit;
    private $id_sortie;
    private $quantite;


    public function connect(){

        $host="localhost";
        $dbname="gestions_stocks";
        $user="root";
        $pass="";
        $connect = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $connect;
  
      }


      
    public function enregistrerRetour($id_produit,$id_sortie,$quantite){
        $connect=$this->connect();
        $requete=$connect->prepare("INSERT INTO ligne_retour(id_produit, id_sortie, quantite) VALUES (:id_produit, :id_sortie, :quantite)");
        $requete->bindValue(":id_produit", $id_produit);
        $requete->bindValue(":id_sortie", $id_sortie);
        $requete->bindValue(":quantite", $quantite);
        $test=$requete->execute();
        return $test;
    }


    public function modifierRetour($id_produit,$id_sortie,$quantite){
        $connect=$this->connect();
        $requete=$connect->prepare("UPDATE ligne_retour SET quantite=$quantite WHERE id_produit=$id_produit AND id_sortie=$id_sortie ");
        $test=$requete->execute();
        return $test;
    }

    
    // public function supprimerRetour($id_sortie){
    //     $connect=$this->connect();
    //     $requete=$connect->query("DELETE FROM ligne_retour WHERE id_sortie=$id_sortie");
    //     $test=$requete>execute();
    // }
    
     public function detailretour($id_sortie){
        
        
        $connect=$this->connect();
        $test=$connect->prepare("SELECT ligne_retour.id_produit as idproduit, lignesortie.quantiteSortie as qtesortie, ligne_retour.quantite as qteretour FROM lignesortie, ligne_retour
        WHERE   lignesortie.id_sortie=ligne_retour.id_sortie AND lignesortie.id_produit=ligne_retour.id_produit AND lignesortie.id_sortie =:id_sortie");
        
        $test->bindParam(':id_sortie', $id_sortie, PDO::PARAM_INT);
        $test->execute(); 
        $resultat = $test->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }
    
    public function quantiteretourproduit($id_produit,$id_jour){
       
           
          $connect=$this->connect();
        $requete=$connect->query("SELECT SUM(quantite) as qteretour FROM ligne_retour,commande_sortie WHERE ligne_retour.id_sortie=commande_sortie.id_sortie and id_produit=$id_produit AND id_jour=$id_jour");
        $result=$requete->fetchAll();
           foreach($result as $name){
              $role=$name['qteretour'];
           }
           if($role==NULL)
           $role=0;
        return $role;
        }

}


?>