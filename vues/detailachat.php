

        
        
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
                            <h4>Detail Achat</h4>
                            <div class="add-product">
                                <a href="index.php?page=listachat">Retour</a>
                            </div>
                            <div style="color: white">
                               <?php $four=new fournisseur();?>
                               <?php $chauffeur = new chauffeur();?>
                                <?php $camion = new camion();?>
                                <?php $produit = new produit();?>
                            </div>
                            <table>
                                <tr>
                                    <th>PRODUIT</th>
                                    <th>QUANTITE</th>
                                    <th>FOURNISSEUR</th>
                                    <th>CHAUFFEUR</th>
                                    <th>CAMION</th>
                                    <th>DATE ACHAT</th>
                                </tr>
                            <?php foreach($listproduitachat as $data) { ?>							
                                <tr>
                                <td><?php echo $resul=$produit->getNomP($data['id_produit']) ?></td>
                                <td><?php echo $data['quantite']; ?></td>
                                <?php } ?>  
                                <?php foreach($detailachat as $donnees) { ?>
                                    <td><?php echo $resul=$four->getNomFour($donnees['id_fournisseur']) ?></td>
                                    <td><?php echo $resul=$chauffeur->getNomchauf($donnees['id_chauffeur']) ?></td>
                                    <td> <?php echo $resul=$camion->getimmatriculation($donnees['id_camion'])?></td>
                                    <td><?php echo $donnees['dateAchat']; ?></td>
                                    <?php } ?> 
                                </tr>         
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 


       
<?php 
    require("footer.php");
?>
        



        
