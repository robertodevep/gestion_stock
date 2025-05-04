 
  <?php
    require("../jour.php");
    $jour= new jour();
    if(isset($_POST['okay'])){
        $nomj=$_POST["jour"];
        $datej=$_POST["date"];
       $test;
         $test=$jour->enregistrer_jour($nomj,$datej);
         
        if($test==true){
            echo"insertion reussi";
        }else{
            echo"erreur d'insertion";
        }

        if(isset($_POST['sup'])){
            $nomj=$_POST["jour"];
            $datej=$_POST["date"];
            $t=$jour->supprimer_jour($id_jour);
            if($t==true){
                echo"suppression reussi";
            }else{
                echo"erreur de suppression";
            }
    

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
    <title>JOUR</title>
</head>
<body>
   
    <section class= "home-section">
        <div class="home-content">
            <section style = "margin: auto;" class="container">

              <header>FORMULAIRE JOUR</header>

              <form method="POST"  action ="" class="form">
                      <div class= "input-box">
                    <!-- <label for="">nom</label> -->
                    <input type="text" name="jour" placeholder="entrez un jour" required><br><br>
                </div>
                <!---->
                <div class= "input-box">
                    <!-- <label for="">prenom</label> -->
                    <input type="date" name="date" placeholder="entrez votre la date" required><br><br>
                </div>
                <div class= "input-box">
                    <!-- <label for="">prenom</label> -->
                    <input type="number" name="number" placeholder="id a modifier" required><br><br>
                </div>
                <!---->
                <button name="okay" type="submit">Login</button><br><br>
                <button name="sup" type="submit">SUPPRIMER</button><br><br>



              </form>

               
                
        </div>
        
    
</body>
</html>