
        
<?php
require("header.php")
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
												<h2>Product Edit</h2>
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
            
               
      <!---->
  
   <div class="single-product-tab-area mg-b-30">
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Achat</a></li>
                                    <!-- <li><a href="#reviews"><i class="icon nalika-picture" aria-hidden="true"></i> Pictures</a></li>
                                    <li><a href="#INFORMATION"><i class="icon nalika-chat" aria-hidden="true"></i> Review</a></li> -->
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                    <form action="" method="post">  
                                    <div class="row">
                                            <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12 mx-5 ">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                        <select name="four" class="form-control pro-edt-select form-control-primary">
                                                        <option > selectionner un fournisseur</option>
                                                        <?php foreach($listfour as $data1) { ?>
															<option value="<?php echo $data1['id_fournisseur'] ?>">
                                                                 <?php echo $data1['nom'] ?>
                                                            </option>
															
                                                            <?php } ?>  
														</select>
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                        <select name="chauffeur" class="form-control pro-edt-select form-control-primary">
                                                        <option > selectionner un chauffeur</option>
                                                        <?php foreach($listchauffeur as $data2) { ?>
															<option value="<?php echo $data2['id_chauffeur'] ?>">
                                                                 <?php echo $data2['nom'] ?>
                                                            </option>
															
                                                            <?php } ?>  
														</select>
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"></i></span>
                                                        <select name="camion" class="form-control pro-edt-select form-control-primary">
                                                        <option > selectionner un camion</option>
                                                        <?php foreach($listcamion as $data3) { ?>
															<option value="<?php echo $data3['id_camion'] ?>">
                                                                 <?php echo $data3['immatriculation'] ?>
                                                            </option>
															
                                                            <?php } ?>  
														</select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="text-center custom-pro-edt-ds">
                                                        <button  type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10" style="margin-right: 100px;" name="next">Next
                                                            </button>
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
   
<?php
require("footer.php")
?>