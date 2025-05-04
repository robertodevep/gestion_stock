<?php

class fournisseur{

    private $nom;
    private $telephone;
    private $adresse;
    private $email;
    private $etat;

    public function Connect(){
        $host="localhost";
        $dbname="gestions_stocks";
        $user="root";
        $pass="";
    $connect= new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    return $connect;
    }
    

    public function enregistrer_fournisseur($nom,$telephone,$adresse,$email){

       try {

     $connect=$this->Connect();
       
    // verifi si l'adresse email est deja present dans la base de donnees avant d'inserer les donnees
    $stmt = $connect->prepare("SELECT COUNT(*) FROM fournisseur WHERE email = ?");
    // Compte le nombre de client ayant l'adresse email specifier et (?) sera remplacer par la valeur  
    // l'adresse email lors de l'execution de la requete
    $stmt->execute([$email]);
    // execute la requete en remplacant le parametre "?" par la valeur de l'adresse email
    $count = $stmt->fetchColumn();
    //recupere le resultat de la requete(qui est le nombre de client specifier) 
    if($count > 0){
        // verifie si le nombre de client ayant l'adresse email specifier est > a 0
        // si c'est le cas cela signifie  que l'email entré existe deja dans la BD
        echo  "cet email existe deja.";
  }else{  
        
        $requete=$connect->prepare("INSERT INTO fournisseur VALUES(NULL,:nom,:telephone,:adresse,:email,'en cours')");
        $requete->bindValue(':nom',$nom);
        $requete->bindValue(':telephone',$telephone);
        $requete->bindValue(':adresse',$adresse);
        $requete->bindValue(':email',$email);
        // $requete->bindValue(':etat','en cours');

        $test=$requete->execute();
        return $test;

    }
        
       } catch (\Throwable $th) {
        //  echo " erreur".$th->getMessage();
       }
      
    }

    
    public function modifier_fourniseure($idfour,$nom,$telephone,$adresse,$email,$etat){

        $connect=$this->connect();
          
        $requete=$connect->prepare(" UPDATE fournisseur SET nom='$nom',telephone='$telephone',adresse='$adresse',email='$email',etat='$etat'  WHERE id_fournisseur=$idfour");
        $test=$requete->execute();
    }



    public function suspendreFournisseur($idfour){

        
        $connect=$this->connect();

        $test=$connect->query("UPDATE fournisseur SET etat='arret' WHERE id_fournisseur=$idfour ");
        // $test=$requete->execute();
      

    }

    public function getNomFour($idfour){

        $connect=$this->connect();

        $test=$connect->query("SELECT nom FROM fournisseur WHERE id_fournisseur = $idfour ");
         $resultats=$test->fetchAll();
         foreach($resultats as $name){
            $nom=$name['nom'];
         }
        return $nom;
    }


    
    
    // public function getNomemail(){

    //     $connect=$this->connect();

    //     $result=$connect->query("SELECT email FROM fournisseur");
    //     // $test=$requete->execute();
    //     //  $result=$test->fetchAll();
    //     // $emails= array();
    //     // if($result->num)

    //      foreach($resultats as $name){
    //         $nom=$name['email'];
    //      }
    //      return $nom;
    // }

    public function listFournisseur(){
        $connect=$this->connect();

        $test=$connect->query("SELECT * FROM fournisseur WHERE etat='en cours'");
        $resultats=$test->fetchAll();
        return $resultats;
    
    }


    public function detailFour($id){
        $connect=$this->connect();
        $requete=$connect->query("SELECT*FROM fournisseur WHERE etat='en cours' and id_fournisseur=$id");
        $resultat=$requete->fetchAll();
        return $resultat;
  
      }

}
 
