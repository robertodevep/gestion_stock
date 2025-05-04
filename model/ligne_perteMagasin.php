
<?php

  class ligneperte_Magasin{

   private $id_stock;
   private $id_produit;
   private $quantite;	
   private $justification;	


   public function connect(){
    $host="localhost";
    $dbname="gestions_stocks";
    $user="root";
    $pass="";

    $connect = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $connect;
   }

    public function enregistreLigne_PerteM($id_stock,$id_produit,$quantite,$justification){
      $connect=$this->connect();
      $requete=$connect->prepare("INSERT INTO ligneperte_magasin VALUES(:id_stock, :id_produit, :quantite, :justification)");
      $requete->bindValue(":id_stock",$id_stock);
      $requete->bindValue(":id_produit",$id_produit);
      $requete->bindValue(":quantite",$quantite);
      $requete->bindValue(":justification",$justification);
      $result=$requete->execute();
      return $result;
    }



    public function supprimerLigne_PerteM($id_stock,$id_produit){
        $connect=$this->connect();
        $requete=$connect->query("DELETE FROM ligneperte_magasin WHERE id_stock=$id_stock AND id_produit=$id_produit ");
        $test=$requete>execute();
    }

    
 }


?>
