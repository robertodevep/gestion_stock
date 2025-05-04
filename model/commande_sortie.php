<?php

 class commande_sortie{

    private $date_sortie;
   private $id_sortie;
    private $id_chauffeur;
    private $id_jour;
    private $id_camion;
    private $id_vendeur;
    private $id_user;


    
    public function connect(){

        $host="localhost";
        $dbname="gestions_stocks";
        $user="root";
        $pass="";
        $connect = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $connect;
      }

      public function setIdjour($id_jour){
        $this->id_jour=$id_jour;
    }
    public function setdate_sortie($date_sortie){
        $this->date_sortie=$date_sortie;
    }
    public function setid_chauffeur($id_chauffeur){
        $this->id_chauffeur=$id_chauffeur;
    }
    public function setid_camion($id_camion){
        $this->id_camion=$id_camion;
    }
    public function setid_vendeur($id_vendeur){
        $this->id_vendeur=$id_vendeur;
    }
    public function setid_user($id_user){
        $this->id_user=$id_user;
    }
  

    // public function enregistrer_sortie($id_chauffeur,$id_jour,$id_camion,$id_user,$id_vendeur,$date_sortie){

    //     $connect=$this->connect();
    //     $requete=$connect->prepare("INSERT INTO commande_sortie VALUES(NULL,:id_chauffeur,:id_jour,:id_camion,:id_user,:id_vendeur,:date_sortie)");
    //     $requete->bindValue(":id_chauffeur",$id_chauffeur);
    //     $requete->bindValue(":id_jour",$id_jour);
    //     $requete->bindValue(":id_camion",$id_camion);
    //     $requete->bindValue(":id_user",$id_user);
    //     $requete->bindValue(":id_vendeur",$id_vendeur);
    //     $requete->bindValue(":date_sortie",$date_sortie);
    //     $test=$requete->execute();
    //     $test=$connect->lastInsertId();
    //     return $test;
    //     }



        

public function enregistrer_sortie($id_chauffeur, $id_jour, $id_camion, $id_user, $id_vendeur, $date_sortie){
  try {
    $connect = $this->connect();
    // Utilisation de la méthode prepare() pour préparer la requête avec des paramètres nommés
    $requete = $connect->prepare("INSERT INTO commande_sortie (id_chauffeur, id_jour, id_camion, id_user, id_vendeur, date_sortie) VALUES (:id_chauffeur, :id_jour, :id_camion, :id_user, :id_vendeur, :date_sortie)");
    // Liaison des valeurs aux paramètres nommés
    $requete->bindValue(":id_chauffeur", $id_chauffeur);
    $requete->bindValue(":id_jour", $id_jour);
    $requete->bindValue(":id_camion", $id_camion);
    $requete->bindValue(":id_user", $id_user);
    $requete->bindValue(":id_vendeur", $id_vendeur);
    $requete->bindValue(":date_sortie", $date_sortie);
    // Exécution de la requête préparée
    $requete->execute();
    // Récupération de l'ID de la dernière ligne insérée
    $lastInsertId = $connect->lastInsertId();
    // Retourne l'ID de la dernière ligne insérée
    return $lastInsertId; 
  } catch (PDOException $e) {
    // En cas d'erreur, affiche l'erreur
    echo "Erreur d'insertion : " . $e->getMessage();
  }
}



        public function modifierCommandeSortie($id_sortie,$id_chauffeur,$id_jour,$id_camion,$id_user,$id_vendeur,$date_sortie){ 
            $connect=$this->connect();
            $requete=$connect->prepare("UPDATE commande_sortie SET id_chauffeur=:id_chauffeur, id_jour=:id_jour, id_camion=:id_camion,id_user=:id_user, id_vendeur=:id_vendeur, date_sortie=:date_sortie WHERE id_sortie=:id_sortie");
            $requete->bindValue(":id_chauffeur",$id_chauffeur);  // Assignation des valeurs aux placeholders
            $requete->bindValue(":id_jour",$id_jour);
            $requete->bindValue(":id_camion",$id_camion);
            $requete->bindValue(":id_user",$id_user);
            $requete->bindValue(":id_vendeur",$id_vendeur);
            $requete->bindValue(":date_sortie",$date_sortie);
            $requete->bindValue(":id_sortie",$id_sortie);
            $test=$requete->execute();
            return $test;
        }

    public function supprimerSortie($id_sortie){
        $connect=$this->connect();
        $requete=$connect->prepare("DELETE FROM commande_sortie WHERE id_sortie =$id_sortie");
        $test=$requete->execute();
        return $test;

    }



    public function listCamionSortie($id_camion){


        try {
            $connect=$this->connect();
         $test = $connect->prepare("SELECT  chauffeur.nom AS nom_chauffeur, jour.nom_jour, camion.nom AS nom_camion, utilisateur.roles, vendeur.nom AS nom_vendeur, date_sortie  
         FROM commande_sortie 
         INNER JOIN chauffeur ON commande_sortie.id_chauffeur = chauffeur.id_chauffeur
         INNER JOIN jour ON commande_sortie.id_jour = jour.id_jour
         INNER JOIN camion ON commande_sortie.id_camion = camion.id_camion
         INNER JOIN utilisateur ON commande_sortie.id_user = utilisateur.id_user
         INNER JOIN vendeur ON commande_sortie.id_vendeur = vendeur.id_vendeur
         WHERE commande_sortie.id_camion = :id_camion");
         
         $test->bindParam(':id_camion', $id_camion, PDO::PARAM_INT);
         $test->execute(); 
         $resultat = $test->fetchAll(PDO::FETCH_ASSOC);
         return $resultat;
         } catch (\Throwable $th) {
              echo "Erreur: " . $th->getMessage();
         }
           
    }


    public function listChauffeurSortie($id_chauffeur){

        $connect=$this->connect();
        try {
         $test = $connect->prepare("SELECT  chauffeur.nom AS nom_chauffeur, jour.nom_jour, camion.nom AS nom_camion, utilisateur.roles, vendeur.nom AS nom_vendeur, date_sortie  
         FROM commande_sortie 
         INNER JOIN chauffeur ON commande_sortie.id_chauffeur = chauffeur.id_chauffeur
         INNER JOIN jour ON commande_sortie.id_jour = jour.id_jour
         INNER JOIN camion ON commande_sortie.id_camion = camion.id_camion
         INNER JOIN utilisateur ON commande_sortie.id_user = utilisateur.id_user
         INNER JOIN vendeur ON commande_sortie.id_vendeur = vendeur.id_vendeur
         WHERE commande_sortie.id_chauffeur = :id_chauffeur");
         
         $test->bindParam(':id_chauffeur', $id_chauffeur, PDO::PARAM_INT);
         $test->execute(); 
         $resultat = $test->fetchAll(PDO::FETCH_ASSOC);
         return $resultat;
         } catch (\Throwable $th) {
              echo "Erreur: " . $th->getMessage();
         }

    }

    public function listJournerS($id_jour){

        try {
            $connect=$this->connect();
         $test = $connect->prepare("SELECT  chauffeur.nom AS nom_chauffeur, jour.nom_jour, camion.nom AS nom_camion, utilisateur.roles, vendeur.nom AS nom_vendeur, date_sortie  
         FROM commande_sortie 
         INNER JOIN chauffeur ON commande_sortie.id_chauffeur = chauffeur.id_chauffeur
         INNER JOIN jour ON commande_sortie.id_jour = jour.id_jour
         INNER JOIN camion ON commande_sortie.id_camion = camion.id_camion
         INNER JOIN utilisateur ON commande_sortie.id_user = utilisateur.id_user
         INNER JOIN vendeur ON commande_sortie.id_vendeur = vendeur.id_vendeur
         WHERE commande_sortie.id_jour = :id_jour");
         
         $test->bindParam(':id_jour', $id_jour, PDO::PARAM_INT);
         $test->execute(); 
         $resultat = $test->fetchAll(PDO::FETCH_ASSOC);
         return $resultat;
         } catch (\Throwable $th) {
              echo "Erreur: " . $th->getMessage();
         }


    }

    public function listVendeurS($id_vendeur){

        try {
            $connect=$this->connect();
         $test = $connect->prepare("SELECT id_sortie, chauffeur.nom AS nom_chauffeur, camion.nom AS nom_camion, vendeur.nom AS nom_vendeur, date_sortie  
         FROM commande_sortie 
         INNER JOIN chauffeur ON commande_sortie.id_chauffeur = chauffeur.id_chauffeur
         INNER JOIN camion ON commande_sortie.id_camion = camion.id_camion
         INNER JOIN vendeur ON commande_sortie.id_vendeur = vendeur.id_vendeur
         WHERE commande_sortie.id_vendeur = :id_vendeur");
         
         $test->bindParam(':id_vendeur', $id_vendeur, PDO::PARAM_INT);
         $test->execute(); 
         $resultat = $test->fetchAll(PDO::FETCH_ASSOC);
         return $resultat;
         } catch (\Throwable $th) {
              echo "Erreur: " . $th->getMessage();
         }

    }


    public function listCmdJours($idjour){

        $connect=$this->connect();

        $test=$connect->query("SELECT * FROM commande_sortie WHERE id_jour = $idjour");
        // $test=$requete->execute();
         $resultats=$test->fetchAll();
        return $resultats;
    }

    
    public function listparDate($date_sortie){

        $connect=$this->connect();

        // try {
        //     $connect=$this->connect();
        //  $test = $connect->prepare("SELECT  chauffeur.nom AS nom_chauffeur, jour.nom_jour, camion.nom AS nom_camion, utilisateur.roles, vendeur.nom AS nom_vendeur, date_sortie  
        //  FROM commande_sortie 
        //  INNER JOIN chauffeur ON commande_sortie.id_chauffeur = chauffeur.id_chauffeur
        //  INNER JOIN jour ON commande_sortie.id_jour = jour.id_jour
        //  INNER JOIN camion ON commande_sortie.id_camion = camion.id_camion
        //  INNER JOIN utilisateur ON commande_sortie.id_user = utilisateur.id_user
        //  INNER JOIN vendeur ON commande_sortie.id_vendeur = vendeur.id_vendeur
        //  WHERE commande_sortie.date_sortie = $date_sortie");
         
        // //  $test->bindParam(':date_sortie', $date_sortie, PDO::PARAM_INT);
        //  $test->execute(); 
        //  $resultat = $test->fetchAll(PDO::FETCH_ASSOC);
        //  return $resultat;
        //  } catch (\Throwable $th) {
        //       echo "Erreur: " . $th->getMessage();
        //  }

        $connect=$this->connect();
        $requete=$connect->query("SELECT*FROM commande_sortie WHERE  date_sortie = '$date_sortie'");
        $test=$requete->fetchAll();
        return $test;

    }

    public function listCommandeSortiUser($id_user){
        $connect=$this->connect();

        try {
            $connect=$this->connect();
         $test = $connect->prepare("SELECT  chauffeur.nom AS nom_chauffeur, jour.nom_jour, camion.nom AS nom_camion, utilisateur.roles, vendeur.nom AS nom_vendeur, date_sortie  
         FROM commande_sortie 
         INNER JOIN chauffeur ON commande_sortie.id_chauffeur = chauffeur.id_chauffeur
         INNER JOIN jour ON commande_sortie.id_jour = jour.id_jour
         INNER JOIN camion ON commande_sortie.id_camion = camion.id_camion
         INNER JOIN utilisateur ON commande_sortie.id_user = utilisateur.id_user
         INNER JOIN vendeur ON commande_sortie.id_vendeur = vendeur.id_vendeur
         WHERE commande_sortie.id_user = :id_user");
         
         $test->bindParam(':id_user', $id_user, PDO::PARAM_INT);
         $test->execute(); 
         $resultat = $test->fetchAll(PDO::FETCH_ASSOC);
         return $resultat;
         } catch (\Throwable $th) {
              echo "Erreur: " . $th->getMessage();
         }
    
    }

   



        
    public function detailsortie($id_sortie){

        $connect=$this->connect();

        $test=$connect->query("SELECT * FROM commande_sortie WHERE id_sortie =$id_sortie ");
        // $test=$requete->execute();
         $resultats=$test->fetchAll();
        return $resultats;
    }

}

?>



