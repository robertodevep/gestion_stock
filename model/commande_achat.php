

<?php

  class commande_achat{
    private $montantAchat;
    private $dateAchat;
    private $idfour;
    private $idchauffeur;
    private $idcamion;
    private $id_user;
    private $idjour;

    public function Connect(){
        $host="localhost";
        $dbname="gestions_stocks";
        $user="root";
        $pass="";
    $connect= new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    return $connect;
    }
    public function setIdjour($idjour){
        $this->idjour=$idjour;
    }
    public function setDateAchat($dateAchat){
        $this->dateAchat=$dateAchat;
    }
    public function setIdfour($idfour){
        $this->idfour=$idfour;
    }
    public function setIdchauffeur($idchauffeur){
        $this->idchauffeur=$idchauffeur;
    }
    public function setIdcamion($idcamion){
        $this->idcamion=$idcamion;
    }


    public function setMontantAchat($montantAchat){
        $this->montantAchat=$montantAchat;
    }

    public function setIduser($id_user){
        $this->id_user=$id_user;
    }


    public function enregistrer_commandeF($idfour,$idchauffeur,$idcamion,$id_user,$idjour,$montantAchat,$dateAchat){
        $connect=$this->Connect();
        $requete=$connect->prepare("INSERT INTO commande_achat VALUES (NULL,:idfour,:idchauffeur,:idcamion,:id_user,:idjour,:montantachat,:dateAchat)");
        $requete->bindValue(':dateAchat',$dateAchat);
        $requete->bindValue(':idfour',$idfour);
        $requete->bindValue(':idchauffeur',$idchauffeur);
        $requete->bindValue(':idcamion',$idcamion);
        $requete->bindValue(':id_user',$id_user);
        $requete->bindValue(':idjour',$idjour);
        $requete->bindValue(':montantachat',$montantAchat);
        $requete->execute();
        $test=$connect->lastInsertId();
        return $test;
        // if ($test==true) {
        //     echo "insertion reussi";
        // }else{
        //     echo "echer";
        // }
    }

    public function supprimerCommande_achat($idachat){

        $connect=$this->Connect();
        $requete=$connect->prepare("DELETE FROM commande_achat WHERE id_achat=$idachat");
        
        $test=$requete->execute();
    }


     public function modifierCommande($idachat, $dateAchat,$idfour,  $idcamion, $id_user,$idchauffeur, $idjour,$montantAchat){
         $connect=$this->connect();
        $requete=$connect->prepare(" UPDATE commande_achat SET id_fournisseur=$idfour,id_chauffeur=$idchauffeur,id_camion=$idcamion, id_user=$id_user,id_jour=$idjour,montantachat=$montantAchat,dateAchat='$dateAchat' WHERE  id_achat = $idachat");
        $test=$requete->execute();
        if($test===true){
        echo "mise a jour effectuer avec succer";

        }else{
            echo "erreur de mise a jour";
        }

     }


    // public function listCommandeJour($idjour){

    //     $connect=$this->connect();

    //     $test=$connect->query("SELECT * FROM commande_achat WHERE id_jour=$idjour");
    //     $resultats=$test->fetchAll();
    //     return $resultats;

    // }


    public function listCommandeJour($idjour){

        try {
            $connect=$this->connect();
            $test = $connect->prepare("SELECT fournisseur.nom AS nom_fournisseur, chauffeur.nom AS nom_chauffeur, camion.nom AS nom_camion, utilisateur.roles, jour.nom_jour, montantAchat, dateAchat  
            FROM commande_achat 
            INNER JOIN fournisseur ON commande_achat.id_fournisseur = fournisseur.id_fournisseur
            INNER JOIN chauffeur ON commande_achat.id_chauffeur = chauffeur.id_chauffeur
            INNER JOIN camion ON commande_achat.id_camion = camion.id_camion
            INNER JOIN utilisateur ON commande_achat.id_user = utilisateur.id_user
            INNER JOIN jour ON commande_achat.id_jour = jour.id_jour
            WHERE commande_achat.id_jour = :id_jour");
            
            $test->bindParam(':id_jour', $idjour, PDO::PARAM_INT);
            $test->execute(); 
            $resultat = $test->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (\Throwable $th) {
            // echo "Erreur: " . $th->getMessage();
        }

    }

    public function listCmdeFournisseur($idfour){
        $connect=$this->connect();

    try {
        $connect=$this->connect();
        $test = $connect->prepare("SELECT fournisseur.nom AS nom_fournisseur, chauffeur.nom AS nom_chauffeur, camion.nom AS nom_camion, utilisateur.roles, jour.nom_jour, montantAchat, dateAchat  
        FROM commande_achat 
        INNER JOIN fournisseur ON commande_achat.id_fournisseur = fournisseur.id_fournisseur
        INNER JOIN chauffeur ON commande_achat.id_chauffeur = chauffeur.id_chauffeur
        INNER JOIN camion ON commande_achat.id_camion = camion.id_camion
        INNER JOIN utilisateur ON commande_achat.id_user = utilisateur.id_user
        INNER JOIN jour ON commande_achat.id_jour = jour.id_jour
        WHERE commande_achat.id_fournisseur = :id_fournisseur");
        
        $test->bindParam(':id_fournisseur', $idfour, PDO::PARAM_INT);
        $test->execute(); 
        $resultat = $test->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    } catch (\Throwable $th) {
        // echo "Erreur: " . $th->getMessage();
    }
    }


     //liste des commande concernant un chauffeur
    public function listCmdChauffeur($idchauffeur){
        $connect=$this->connect();

        try {

           $connect=$this->connect();
        $test = $connect->prepare("SELECT fournisseur.nom AS nom_fournisseur, chauffeur.nom AS nom_chauffeur, camion.nom AS nom_camion, utilisateur.roles, jour.nom_jour, montantAchat, dateAchat  
        FROM commande_achat 
        INNER JOIN fournisseur ON commande_achat.id_fournisseur = fournisseur.id_fournisseur
        INNER JOIN chauffeur ON commande_achat.id_chauffeur = chauffeur.id_chauffeur
        INNER JOIN camion ON commande_achat.id_camion = camion.id_camion
        INNER JOIN utilisateur ON commande_achat.id_user = utilisateur.id_user
        INNER JOIN jour ON commande_achat.id_jour = jour.id_jour
        WHERE commande_achat.id_chauffeur = :id_chauffeur");
        
        $test->bindParam(':id_chauffeur', $idchauffeur, PDO::PARAM_INT);
        $test->execute(); 
        $resultat = $test->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
        } catch (\Throwable $th) {
             // echo "Erreur: " . $th->getMessage();
        }

  }

     // liste des commande concernant un camion
    public function listCmdCamion($idcamion){

        $connect=$this->connect();

        try {

           $connect=$this->connect();
        $test = $connect->prepare("SELECT fournisseur.nom AS nom_fournisseur, chauffeur.nom AS nom_chauffeur, camion.nom AS nom_camion, utilisateur.roles, jour.nom_jour, montantAchat, dateAchat  
        FROM commande_achat 
        INNER JOIN fournisseur ON commande_achat.id_fournisseur = fournisseur.id_fournisseur
        INNER JOIN chauffeur ON commande_achat.id_chauffeur = chauffeur.id_chauffeur
        INNER JOIN camion ON commande_achat.id_camion = camion.id_camion
        INNER JOIN utilisateur ON commande_achat.id_user = utilisateur.id_user
        INNER JOIN jour ON commande_achat.id_jour = jour.id_jour
        WHERE commande_achat.id_camion = :id_camion");
        
        $test->bindParam(':id_camion', $idcamion, PDO::PARAM_INT);
        $test->execute(); 
        $resultat = $test->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
        } catch (\Throwable $th) {
             // echo "Erreur: " . $th->getMessage();
        }
    }

    public function listCommandeUser($id_user){

        try {
            $connect=$this->connect();
         $test = $connect->prepare("SELECT fournisseur.nom AS nom_fournisseur, chauffeur.nom AS nom_chauffeur, camion.nom AS nom_camion, utilisateur.roles, jour.nom_jour, montantAchat, dateAchat  
         FROM commande_achat 
         INNER JOIN fournisseur ON commande_achat.id_fournisseur = fournisseur.id_fournisseur
         INNER JOIN chauffeur ON commande_achat.id_chauffeur = chauffeur.id_chauffeur
         INNER JOIN camion ON commande_achat.id_camion = camion.id_camion
         INNER JOIN utilisateur ON commande_achat.id_user = utilisateur.id_user
         INNER JOIN jour ON commande_achat.id_jour = jour.id_jour
         WHERE commande_achat.id_user = :id_user");
         
         $test->bindParam(':id_user', $id_user, PDO::PARAM_INT);
         $test->execute(); 
         $resultat = $test->fetchAll(PDO::FETCH_ASSOC);
         return $resultat;
         } catch (\Throwable $th) {
              // echo "Erreur: " . $th->getMessage();
         }
    }
 
    // liste des commande par date
    public function listCmdJour($idjour){

        $connect=$this->connect();

        $test=$connect->query("SELECT * FROM commande_achat WHERE id_jour = $idjour");
        // $test=$requete->execute();
         $resultats=$test->fetchAll();
        return $resultats;
    }

    public function detailachat($idachat){

        $connect=$this->connect();

        $test=$connect->query("SELECT * FROM commande_achat WHERE id_achat = $idachat ");
        // $test=$requete->execute();
         $resultats=$test->fetchAll();
        return $resultats;
    }


     
// public function detail1achat($id_achat){
    
    
//     $connect=$this->connect();
//     $test=$connect->prepare("SELECT produit.nom AS nom_produit, ligneachat.quantite FROM ligneachat 
//     INNER JOIN produit ON ligneachat.id_produit=produit.id_produit
//     INNER JOIN commande_achat ON ligneachat.id_achat=commande_achat.id_achat
//     WHERE  ligneachat.id_achat=:id_achat");
    
//     $test->bindParam(':id_achat', $id_achat, PDO::PARAM_INT);
//     $test->execute(); 
//     $resultat = $test->fetchAll(PDO::FETCH_ASSOC);
//     return $resultat;
// }

    // public function listCommandeUser($id_user){
    //     $connect=$this->connect();
    //     $requete=$connect->query("SELECT*FROM  WHERE  date_sortie = '$date_sortie'");
    //     $test=$requete->fetchAll();
    //     return $test;

    // }


}

?>
