
<?php

class utilisateur{

    private $usernames;
    private $email;
    private $passwords;
    private $roles;

    public function connect(){
        $host="localhost";
        $dbname="gestions_stocks";
        $user="root";
        $pass="";

        $connect = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $connect;
    }


    public function isUser($username,$password){
        $connect=$this->connect();
        $stmt=$connect->query("SELECT COUNT(*) FROM utilisateur WHERE usernames='$username' AND passwords='$password'");

        // $stmt=$requete->execute();
        $count = $stmt-> fetchColumn();
        if($count > 0){
            return true;
       
       }else{

        return false;

        }
    }
        
    
    public function enregistrerUser($usernames,$email,$passwords,$roles){

       try {

        $connect=$this->connect();

        // verifi si l'adresse email est deja present dans la base de donnees avant d'inserer les donnees
        
        $stmt = $connect->prepare("SELECT COUNT(*) FROM utilisateur WHERE email = ?");
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

        $requete=$connect->prepare("INSERT INTO utilisateur VALUES(NULL,:usernames,:email,:passwords,:roles)");
        $requete->bindValue(':usernames',$usernames);
        $requete->bindValue(':email',$email);
        $requete->bindValue(':passwords',$passwords);
        $requete->bindValue(':roles',$roles);
        $test=$requete->execute();
        return $test;

       }
       
    }
    catch (\Throwable $th) {
        echo "erreur".$th->getMessage();
      }
    }



    public function modifierUser($id_user, $usernames, $email, $passwords, $roles){
        try {
            $connect = $this->connect();
            $requete = $connect->prepare("UPDATE utilisateur SET usernames=:usernames, email=:email, passwords=:passwords, roles=:roles WHERE id_user=:id_user");
            $requete->bindValue(':usernames', $usernames);
            $requete->bindValue(':email', $email);
            $requete->bindValue(':passwords', $passwords);
            $requete->bindValue(':roles', $roles);
            $requete->bindValue(':id_user', $id_user);
            $test = $requete->execute();
            return $test;
        } catch (\Throwable $th) {
            echo "Erreur: " . $th->getMessage();
        }
    }
    

    public function supprimerUser($id_user){
        $connect=$this->connect();
        $requete=$connect->query("DELETE FROM utilisateur WHERE id_user=$id_user ");
        $test=$requete->execute();
    }



    public function modifierPassword($email,$passwords){
        $connect=$this->connect();
        $requete=$connect->prepare("UPDATE utilisateur SET passwords='$passwords' WHERE email='$email'");
        $test=$requete->execute();
    }


    public function getRole($username){
        $connect = $this->connect();
        $requete = $connect->prepare("SELECT roles FROM utilisateur WHERE usernames='$username'");
        // $requete->bindValue(":email", $email);
        $requete->execute(); // Execute the query
        $resultat = $requete->fetchAll();
        return $resultat;
    }

    public function getRolesUser($username){

        $connect=$this->connect();

        $test=$connect->query("SELECT roles FROM utilisateur WHERE usernames='$username'");
        // $test=$requete->execute();
         $resultats=$test->fetchAll();
         foreach($resultats as $name){
            $role=$name['roles'];
         }
        return $role;
    }

    
    public function isconnect($passwords){
        $connect=$this->connect();
        $stmt=$connect->query("SELECT COUNT(*) FROM utilisateur WHERE passwords='$passwords'");
        $count = $stmt->fetchColumn();
        if($count > 0){
            echo "true";
       
       }else{

       echo "false";

        }
    }

       
    public function getIduser($username){
        $role=0;
        $connect = $this->connect();
        $requete = $connect->query("SELECT id_user FROM utilisateur WHERE usernames='$username'");
        
        $resultat = $requete->fetchAll();
        foreach($resultat as $name){
            $role=$name['id_user'];
         }
        return $role;
    }

    

    public function listuser(){
        $connect=$this->connect();

        $test=$connect->query("SELECT * FROM utilisateur");
        $resultats=$test->fetchAll();
        return $resultats;
    
    }


    public function detailuser($id){
        $connect=$this->connect();
        $requete=$connect->query("SELECT*FROM utilisateur WHERE  id_user=$id");
        $resultat=$requete->fetchAll();
        return $resultat;
  
      }

}

?>