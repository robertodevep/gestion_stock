
<?php
 class stocks{ 

        private $id_jour;
        private $date;
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

   // MODIFIER
        public function enregistrer_mouvementStock($id_jour){
        $connect=$this->connect();
        $requete=$connect->prepare("INSERT INTO stock VALUES(NULL,:id_jour)");
        $requete->bindValue(':id_jour',$id_jour);
        $test=$requete->execute();
        return $test;

         }

    }
?>
