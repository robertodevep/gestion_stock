
<?php
  
require("../fournisseur.php");

$four=new fournisseur();

if(isset($_POST['okay'])){
    $nom=$_POST["nom"];
    $telephone=$_POST["tel"];
    $adresse=$_POST["adresse"];
    $email=$_POST["email"];
   $test;
     $test=$four->enregistrer_fournisseur($nom,$telephone,$adresse,$email);
    //  $mai=$four->getNomemail();
    if($test==true){
        echo"insertion reussi";
    }else{
        echo"erreur d'insertion";
    }

}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forn.css">
    <title>FOURNISSEUR</title>
</head>
<body>
   
    <section class= "home-section">
        <div class="home-content">
            <section style = "margin: auto;" class="container">

              <header>FORMULAIRE FOURNISSEUR</header>

              <form method="POST"  action ="" class="form">
                      <div class= "input-box">
                    <!-- <label for="">nom</label> -->
                    <input type="text" name="nom" placeholder="entrez votre nom" required><br><br>
                </div>
                <!---->
                <div class= "input-box">
                    <!-- <label for="">prenom</label> -->
                    <input type="text" name="tel" placeholder="entrez votre tel" required><br><br>
                </div>
                <!---->
                <div class= "input-box">
                    <!-- <label for="">adresse</label> -->
                    <input type="text" name="adresse" placeholder="entrez votre adresse" required><br><br>
                </div>
                <!---->
                <div class= "input-box">
                    <!-- <label for="">telephone </label> -->
                    <input type="email" name=" email" placeholder="entrez votre email " required><br><br>
                
                <button name="okay" type="submit">Login</button><br><br>

              </form>

                
        </div>
        
    
</body>
</html>