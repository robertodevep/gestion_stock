
<?php

 class ligne_perteVendeur{
      
        private $id_produit;
        private $id_sortie;
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

        public function enregistreLigne_PerteV($id_produit,$id_sortie,$quantite,$justification){
         $connect=$this->connect();
        $requete=$connect->prepare("INSERT INTO ligne_pertevendeur VALUES(:id_produit, :id_sortie, :quantite, :justification )");
        $requete->bindValue(":id_produit", $id_produit);
        $requete->bindValue(":id_sortie", $id_sortie);
        $requete->bindValue(":quantite", $quantite);
        $requete->bindValue(":justification", $justification);
        $test=$requete->execute();
        return $test;
        }



        public function SupprimerLigne_PerteV($id_sortie){
         $connect=$this->connect();
        $requete=$connect->query("DELETE FROM ligne_pertevendeur WHERE id_sortie=$id_sortie");
        $test=$requete->execute();
        }


     }

?>
