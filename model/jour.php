<?php

  class jour{
    
    private $nomj;
    private $datej;
    private $etat;

    public function connect(){
        $host="localhost";
        $dbname="gestions_stocks";
        $user="root";
        $pass="";

        $connect = new PDO("mysql:host=$host;dbname=$dbname",$user, $pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $connect;

    }

    public function setnom($nomj){
        $this->nom=$nomj;
    }

    public function setetat($etat){
        $this->etat=$etat;
    }

    public function enregistrer_jour($nomj,$datej){
        
        $connect=$this->connect();
        $requete=$connect->prepare("INSERT INTO jour VALUES(NULL,:nom_jour,:date,'en cours')");
        $requete->bindValue(':nom_jour',$nomj);
        $requete->bindValue(':date',$datej);
        // $requete->bindValue(':etat',$etat);
        $test=$requete->execute();
        return $test;
        // if($test=true){
        //     echo "insertion reussi!!!";
        // }else{
        //     echo "erreur lors des insertions";
        // }
    }




    public function supprimer_jour($id_jour){
        $connect=$this->Connect();
        $requete=$connect->prepare("DELETE FROM jour WHERE id_jour=$id_jour");
        $test=$requete->execute();
        // if($test==true){
        //     echo "suppression reussi!!!";
        // }else{
        //     echo "erreur lors de la suppression";
        // }


    }
    
    public function modifier_jour($id_jour, $nomj, $datej, $etat){
        $connect = $this->Connect();
        $requete=$connect->prepare(" UPDATE jour SET nom_jour='$nomj',date='$datej',etat='$etat'  WHERE id_jour=$id_jour");
         $test=$requete->execute();
        // if($test === true){
        //     echo "mise a jour effectuer avec succès";
        // } else {
        //     echo "erreur de mise a jour";
        // }
    }


    
    public function listjour(){
        $connect=$this->connect();
        $test=$connect->query("SELECT*FROM jour WHERE etat='en cours'");
        $resultats=$test->fetchAll();
        return $resultats;
    
    }

    public function suspendre_jour($id_jour){
        $connect=$this->connect();
        $test=$connect->query("UPDATE jour SET etat='arret' WHERE id_jour=$id_jour");
    }


   


    public function getNomjour($idjour){
        $connect=$this->connect();
        $test =$connect->query("SELECT nom_jour FROM jour WHERE id_jour=$idjour");
        $resutats=$test->fetchAll();
         foreach($resutats as $name){
            $nom=$name['nom_jour'];
         }
        return $nom;
    }

    public function getIdLastjour(){
        $id=0;
        $connect=$this->connect();
        $test =$connect->query("SELECT id_jour FROM jour where etat='en cours' order by id_jour desc limit 1");
        $resutats=$test->fetchAll();
         foreach($resutats as $name){
            $id=$name['id_jour'];
         }
        return $id;
    }

    }


?>
