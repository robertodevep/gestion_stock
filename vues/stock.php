


           
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
											<!-- <div class="breadcomb-ctn">
												<h2>Product List</h2>
												<p>Welcome to Nalika <span class="bread-ntd">Admin Template</span></p>
											</div> -->
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
                            <h4>stock</h4>
                            <div class="add-product">
                                <a href="#">stock</a>
                            </div>
                            <table>
                                <tr>
                                    <th>Boisson</th>
                                    <th>QTE init</th>
                                    <th>qt Achat</th>
                                    <th>qt sortie</th>
                                    <th>qt retourné</th>
                                    <th>qt perdu</th>
                                    <th>qt reel en stock</th>
                                    
                                </tr>
                              <?php  foreach($listproduit as $data){ ?>
                                <tr>
                                    <td><?php  echo $data['nom']?></td>
                                    <td>
                                        <?php  
                                            $qteinit=$ligstock->quantiteInit($data['id_produit'],$_SESSION['jour']);
                                        echo $qteinit;
                                        
                                        ?>
                                    </td>
                                    <td>
                                        <?php  $qteachat=$ligachat->quantiteachatproduit($data['id_produit'],$_SESSION['jour']);
                                        echo $qteachat;
                                        ?>
                                    </td>
                                    <td>
                                        <?php  $qtesortie=$ligsortie->quantitesortieproduit($data['id_produit'],$_SESSION['jour']);
                                        echo $qtesortie;
                                        ?>
                                    </td>
                                    <td>
                                        <?php  $qteretour=$ligretour->quantiteretourproduit($data['id_produit'],$_SESSION['jour']);
                                        echo $qteretour;
                                        ?>
                                    </td>
                                    <td>
                                        0
                                    </td>
                                    <td>
                                        <?php  
                                        
                                        $solde=$qteinit+$qteachat+$qteretour-$qtesortie;
                                        echo $solde;
                                        
                                        ?>
                                    </td>
                                    
                                </tr> 
                                <?php  } ?>            
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>



        
<?php 
    require("footer.php");
?>