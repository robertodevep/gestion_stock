
        
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
                            <h4>Liste des Vendeurs</h4>
                            <div class="add-product">
                                <a href="index.php?page=addfournisseur">Nouveau Vendeur</a>
                            </div>
                            <table>
                                <tr>
                                    <th>Nom</th>
                                    <th>Telephone</th>
                                    <th>Adresse</th>
                                    <th>Email</th>
                                    <th>Etat</th>
                                    <th>Action</th>
                                </tr>
                <?php foreach($listvendeur as $data) { ?>
                                <tr>
                                    <td> <?php echo $data['nom'] ?> </td>
                                    <td><?php echo $data['telephone'] ?></td>
                                    <td>
                                    <?php echo $data['adresse'] ?>
                                    </td>
                                    <td><?php echo $data['email'] ?></td>
                                    <td><?php echo $data['etat'] ?></td>
                                    <td>
                                        <a href="index.php?page=modifierVendeur&id=<?php echo $data['id_vendeur'] ?>" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a href="index.php?page=deletevend&id=<?php echo $data['id_vendeur'] ?>" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                <?php } ?>               
                            </table>
                            <div class="custom-pagination">
								<ul class="pagination">
									<li class="page-item"><a class="page-link" href="#">Previous</a></li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">Next</a></li>
								</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        
<?php 
    require("footer.php");
?>