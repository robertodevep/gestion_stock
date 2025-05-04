
<?php
  
require("../utilisateur.php");

$utilisateur=new utilisateur();

if(isset($_POST['okay'])){
    $usernames=$_POST["usernames"];
    $email=$_POST["email"];
    $passwords=$_POST["passwords"];
    $roles=$_POST["roles"];
   $test;
     $test=$utilisateur->enregistrerUser($usernames,$email,$passwords,$roles);
    //  $mai=$four->getNomemail();
    // if($test==true){
    //     echo"insertion reussi";
    // }else{
    //     echo"erreur d'insertion";
    // }

}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forn.css">
    <title>utilisateur</title>
</head>
<body>
   
    <section class= "home-section">
        <div class="home-content">
            <section style = "margin: auto;" class="container">

              <header>FORMULAIRE UTILISATEUR</header>

              <form method="POST"  action ="" class="form">
                      <div class= "input-box">
                    <!-- <label for="">nom</label> -->
                    <input type="text" name="usernames" placeholder="entrez votre nom" required><br><br>
                </div>
                <!---->

                <div class= "input-box">
                    <!-- <label for="">prenom</label> -->
                    <input type="text" name="email" placeholder="entrez votre email" required><br><br>
                </div>

                <div class= "input-box">
                    <!-- <label for="">prenom</label> -->
                    <input type="password" name="passwords" placeholder="entrez votre password" required><br><br>
                </div>


                <!---->
                <div class= "input-box">
                    <!-- <label for="">adresse</label> -->

                    <select name="roles">
                        <option value="ADMINISTRATEUR">ADMINISTRATEUR</option>
                        <option value="MAGASINER">MAGASINER</option>
                    </select>
                </div>
                            
                <button name="okay" type="submit">Login</button><br><br>

              </form>

                
        </div>
        
    
</body>
</html>