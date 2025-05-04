
<?php
  class camion{
    private $idcamion;
    private $nom;
    private $immatriculation;
    private $etat;

    public function connect(){
        $host="localhost";
        $dbname = "gestions_stocks";
        $user = "root";
        $pass = "";

        $connect = new PDO ("mysql:host=$host;dbname=$dbname",$user,$pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $connect;
    }

    public function setidcamion($idcamion){
        $this->idcamion=$idcamion;
    }

    public function setnom($nom){
        $this->nom=$nom;
    }

    public function setimmatriculation($immatriculation){
        $this->immatriculation=$immatriculation;
    }

    public function setetat($etat){
        $this->etat=$etat;
    }

    public function enregistrecamion($nom,$immatriculation){

        try {

            $connect=$this->Connect();
              
           // verifi si l'adresse email est deja present dans la base de donnees avant d'inserer les donnees
           $stmt = $connect->prepare("SELECT COUNT(*) FROM camion WHERE immatriculation = ?");
           // Compte le nombre de client ayant l'adresse email specifier et (?) sera remplacer par la valeur  
           // l'adresse email lors de l'execution de la requete
           $stmt->execute([$immatriculation]);
           // execute la requete en remplacant le parametre "?" par la valeur de l'adresse email
           $count = $stmt->fetchColumn();
           //recupere le resultat de la requete(qui est le nombre de client specifier) 
           if($count > 0){
               // verifie si le nombre de client ayant l'adresse email specifier est > a 0
               // si c'est le cas cela signifie  que l'email entré existe deja dans la BD
               echo  "cette immatriculation exite deja.";
         }else{  

            $connect=$this->Connect();
            $requete=$connect->prepare("INSERT INTO camion VALUES(NULL,:nom,:immatriculation,'en cours')");
            $requete->bindValue(':nom',$nom);
            $requete->bindValue(':immatriculation',$immatriculation);
            $test=$requete->execute();
            return $test;
        
           }
               
              } catch (\Throwable $th) {
                echo " erreur".$th->getMessage();
              }
             
           }
       


    public function modifier_camion($idcamion, $nom, $immatriculation,$etat){
        $connect = $this->Connect();
        $requete = $connect->prepare("UPDATE camion SET nom=:nom, immatriculation=:immatriculation, etat=:etat WHERE id_camion=:idcamion");
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':immatriculation', $immatriculation);
        $requete->bindParam(':etat', $etat);
        $requete->bindParam(':idcamion', $idcamion);
        $test = $requete->execute();
        // if($test === true){
        //     echo "mise a jour effectuer avec succès";
        // } else {
        //     echo "erreur de mise a jour";
        // }
    }

      
    // public function supprimerCamion($idcamion){
    //     $connect=$this->connect();
    //     $requete=$connect->query("DELETE FROM camion WHERE id_camion=$idcamion");
    //     $test=$requete->execute();
  
    //   }


    public function listCamion(){
        $connect=$this->connect();

        $test=$connect->query("SELECT * FROM camion WHERE etat='en cours'");
        $resultats=$test->fetchAll();
        return $resultats;
    
    }


    
    public function suspendreCamion($idcamion){
        $connect=$this->connect();
        $test=$connect->query("UPDATE camion SET etat='arret' WHERE id_camion=$idcamion ");
        // $test=$requete->execute();
      

    }


    public function getNomcamion($idcamion){
        $connect=$this->connect();
        $test=$connect->query("SELECT nom FROM camion WHERE id_camion=$idcamion");
        $resultats=$test->fetchAll();
        foreach($resultats as $name){
            $nom=$name['nom'];
            return $nom;
        }
    }


    public function getimmatriculation($idcamion){
        $connect=$this->connect();
        $test=$connect->query("SELECT immatriculation FROM camion WHERE id_camion=$idcamion");
        $resultats=$test->fetchAll();
        foreach($resultats as $name){
            $nom=$name['immatriculation'];
            return $nom;
        }
    }


       
  public function detailcamion($id){
    $connect=$this->connect();
    $requete=$connect->query("SELECT*FROM camion WHERE etat='en cours' and id_camion=$id");
    $resultat=$requete->fetchAll();
    return $resultat;

  }
}
  
  ?>