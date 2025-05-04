
<?php

 class vendeur{
    private $nom;
    private $telephone;
    private $adresse;
    private  $email;
    private  $etat;


    public function connect(){

      $host="localhost";
      $dbname="gestions_stocks";
      $user="root";
      $pass="";
      $connect = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
      $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      return $connect;

    }

    public function enregistrer_vendeur($nom,$telephone,$adresse,$email){

    try {
      $connect=$this->connect();

   // verifi si l'adresse email est deja present dans la base de donnees avant d'inserer les donnees
   
   $stmt = $connect->prepare("SELECT COUNT(*) FROM vendeur WHERE email = ?");
   // Compte le nombre de client ayant l'adresse email specifier et (?) sera remplacer par la valeur  
   // l'adresse email lors de l'execution de la requete
   $stmt->execute([$email]);
   // execute la requete en remplacant le parametre "?" par la valeur de l'adresse email
   $count = $stmt->fetchColumn();
   //recupere le resultat de la requete(qui est le nombre de client specifier) 
   if($count > 0){
       // verifie si le nombre de client ayant l'adresse email specifier est > a 0
       // si c'est le cas cela signifie  que l'email entré existe deja dans la BD
       // echo  "cet email existe deja.";

 }else{  
       
  
  $requete=$connect->prepare("INSERT INTO vendeur VALUES(NULL,:nom,:telephone,:adresse,:email,'en cours')");

  $requete->bindValue(":nom",$nom);
  $requete->bindValue(":telephone",$telephone);
  $requete->bindValue(":adresse",$adresse);
  $requete->bindValue(":email",$email);
  $test=$requete->execute();
  return $test;

       }
         
     } catch (\Throwable $th) {
       echo "erreur".$th->getMessage();
     }
    }


    public function suspendre_vendeur($id_vendeur){
      $connect=$this->connect();
      $test=$connect->query("UPDATE vendeur SET etat='arret' WHERE id_vendeur=$id_vendeur");
    }

    public function modifierV($id_vendeur,$nom,$telephone,$adresse,$email,$etat){

        $connect=$this->connect();
       $requete=$connect->prepare(" UPDATE vendeur SET nom='$nom',telephone='$telephone', adresse='$adresse',email='$email',etat='$etat' WHERE  id_vendeur = $id_vendeur");
       $test=$requete->execute();
      //  if($test===true){
      //  echo "mise a jour effectuer avec succer";

      //  }else{
      //      echo "erreur de mise a jour";
      //  }

    }

      
    public function supprimerVendeur($id_vendeur){
      $connect=$this->connect();
      $requete=$connect->query("DELETE FROM vendeur WHERE id_vendeur=$id_vendeur");
      $test=$requete->execute();

    }

    public function getNomVendeur($id_vendeur){
      $connect=$this->connect();
      $requete=$connect->query("SELECT nom FROM vendeur WHERE id_vendeur=$id_vendeur");
      $resultat=$requete->fetchAll();
      foreach($resultat as $name){
        $nom=$name['nom'];
      }
      return $nom;
    }

    
    public function listVendeur(){
      $connect=$this->connect();
      $requete=$connect->query("SELECT*FROM vendeur WHERE etat='en cours'");
      $resultat=$requete->fetchAll();
      return $resultat;

    }
    
    public function detailVendeur($id){
      $connect=$this->connect();
      $requete=$connect->query("SELECT*FROM vendeur WHERE etat='en cours' and id_vendeur=$id");
      $resultat=$requete->fetchAll();
      return $resultat;

    }



    }
 

  
  