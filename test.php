       
 
       
<?php 
    require("header.php");
?>
       
       <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-wp">
											<div class="breadcomb-icon">
												<i class="icon nalika-home"></i>
											</div>
											
										</div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="breadcomb-report">
											<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

     <!---->
            
         
<div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Realiser retour</h4>
                            <div class="add-product">
                                <a href="index.php?page=listretour">Retour</a>
                            </div>
                            <div style="color: white;font-size:1.4em;">

                               <?php $camion=new camion();?>
                               <?php $chauffeur = new chauffeur();?>
                                <?php $vendeur = new vendeur();?>
                                <?php $produit = new produit();
                                echo $id_sortie; ?>
                           
                            
                            <?php foreach($detailretour as $donnees) { ?>
                                <p>Chauffeur : <?php echo $resul=$chauffeur->getNomchauf($donnees['id_chauffeur']) ?></p>
                                <p>Camion : <?php echo $resul=$camion->getimmatriculation($donnees['id_camion'])?></p>
                                <p>Vendeur : <?php echo $resul=$vendeur->getNomVendeur($donnees['id_vendeur'])?></p>
                                <p>Date Sortie : <?php echo $donnees['date_sortie']; ?></p>
                                
                                <?php } ?> 

                                </div>
                                <form action="" method="post">
                            <table>
                                <tr>
                                    <th>PRODUIT</th>
                                    <th>QUANTITE SORTIE</th>
                                    <th>QUANTITE RETOUR</th>
                                </tr>

                            <?php foreach($listproduitretour as $data) { ?>
                                						
                                <tr>
                                <td><?php echo $resul=$produit->getNomP($data['id_produit']) ?></td>
                                <td><?php echo $srt=$data['quantiteSortie']; ?></td>
                                <td>
                                    <input type="number" style="background-color:black" name="retour<?php echo $data['id_produit']; ?>" id="">
                                </td>
                                <?php } ?> 
                                </tr>
                                          
                            </table>
                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="text-center custom-pro-edt-ds">
                                                        <button type="submit" name="valider" class="btn btn-ctl-bt waves-effect waves-light m-r-10" style="margin-right: 100px;" >Valider Retour
                                                            </button>
                                                           
                                                    </div>
                                                </div>
                                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 


       
<?php 
    require("footer.php");
?>
        



        
