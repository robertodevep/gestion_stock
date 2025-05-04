
        

           
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
                            <h4>Liste des jours</h4>
                            <div class="add-product">
                                <form action="" method="post">
                                <button class="primary" name="valider">Nouveau jour</button>
                                </form>
                            </div>
                            <table>
                                <tr>
                                    <th>Designation</th>
                                    <th>date</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($listjour as $data) { ?>
                                <tr>
                                    <td> <?php echo $data['nom_jour'] ?> </td>
                                    <td><?php echo $data['date'] ?></td>
                                    <td>
                                    <a href="index.php?page=fermerjour&id=<?php echo $data['id_jour'] ?>" class="pd-setting-ed">Fermer Jour</a>
                                    </td>
                                </tr>
                      <?php } ?>               
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>



        
<?php 
    require("footer.php");
?>