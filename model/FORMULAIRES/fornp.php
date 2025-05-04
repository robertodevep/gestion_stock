
 
<?php
  
  require("../produit.php");
  
  $produit=new produit();
  
  if(isset($_POST['okay'])){
      $nom=$_POST["nom"];
      $quantite=$_POST["quantite"];
      $categorie=$_POST["categorie"];
      $fournisseur=$_POST["fournisseur"];
     $test;
       $test=$produit->enregistrer_produit($nom,$quantite,$categorie,$fournisseur);
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
  
                <header>FORMULAIRE PRODUIT</header>
  
                <form method="POST"  action ="" class="form">
                        <div class= "input-box">
                      <!-- <label for="">nom</label> -->
                      <input type="text" name="nom" placeholder="entrez le nom du produit" required><br><br>
                  </div>
                  <!---->
                  <div class= "input-box">
                      <!-- <label for="">prenom</label> -->
                      <input type="number" name="quantite" placeholder="entrez la quantiter" required><br><br>
                  </div>
                  <!---->
                  <div class= "input-box">
                      <!-- <label for="">adresse</label> -->
                      <input type="text" name="categorie" placeholder="entrez la categorie" required><br><br>
                  </div>
                  <!---->
                  <div class= "input-box">
                      <!-- <label for="">telephone </label> -->
                      <input type="text" name="fournisseur" placeholder="entrez le nom du fournisseur " required><br><br>
                  
                  <button name="okay" type="submit">Login</button><br><br>
  
                </form>
  
                  
          </div>
          
      
  </body>
  </html>