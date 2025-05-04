
<?php

  class ligneStock{

    private $id_produit;
    private $id_stock;
    private $id_jour;
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

    public function enregistreLigneStock($id_produit,$id_stock,$id_jour,$quantite){
         $connect=$this->connect();
         $requete=$connect->prepare("INSERT INTO lignestock VALUES(:id_produit, :id_stock, :id_jour, :quantite)");
         $requete->bindValue(":id_produit",$id_produit);
         $requete->bindValue(":id_stock",$id_stock);
         $requete->bindValue(":id_jour",$id_jour);
         $requete->bindValue(":quantite",$quantite);
         $result=$requete->execute();
         return $result;

    }

    public function supprimerLigneStock($id_stock){
      $connect=$this->connect();
      $requete=$connect->prepare("DELETE FROM lignestock WHERE id_stock=$id_stock AND id_jour=$id_jour AND AND id_jour=$id_jour");
      $test=$requete->execute();
      return $test;
    }

    public function quantiteInit($id_produit,$id_jour){
      $idjour=$id_jour-1;
      if($idjour==0){
        return $idjour;
      }else{
        
        $role=0;
        $connect=$this->connect();
      $requete=$connect->query("SELECT quantite FROM lignestock WHERE id_produit=$id_produit AND id_jour=$id_jour");
      $result=$requete->fetchAll();
         foreach($result as $name){
            $role=$name['quantite'];
         }
      return $role;
      }
      
    }


  }



?>

