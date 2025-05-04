
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

        <div class="single-product-tab-area mg-b-30">
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="" aria-hidden="true"></i> Retour</a></li>
                                    <!-- <li><a href="#reviews"><i class="icon nalika-picture" aria-hidden="true"></i> Pictures</a></li>
                                    <li><a href="#INFORMATION"><i class="icon nalika-chat" aria-hidden="true"></i> Review</a></li> -->
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12 mx-5 ">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"></i></span>
                                                        <select name="vendeur" class="form-control pro-edt-select form-control-primary">
                                                        <option > selectionner un vendeur</option>
                                                        <?php foreach($listvend as $data1) { ?>
															<option value="<?php echo $data1['id_vendeur']; ?>">
                                                                 <?php echo $data1['nom']; ?>
                                                            </option>
                                                            <?php } ?>  
														</select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="text-center custom-pro-edt-ds">
                                                        <button type="submit" name="affiche" class="btn btn-ctl-bt waves-effect waves-light m-r-10" style="margin-right: 100px;" >affiche
                                                            </button>
                                                           
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--tableau-->

                                <div class="product-status mg-b-30">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="product-status-wrap"> 
                                                        <!-- <h4>Products List</h4> -->
                                                         <!-- <div class="add-product">
                                                            <a href="product-edit.html">Add Product</a>
                                                        </div>  -->
                                                         <table>
                                                            <tr>
                                                                <th>ID_SOTIE</th>
                                                                <th>CHAUFFEUR</th>
                                                                <th>CAMION</th>
                                                                <th>UTILISATEUR</th>
                                                                <th>VENDEUR</th>
                                                                <th>DATE</th>
                                                                <th>Action</th>
                                                            </tr>
                                                                 <?php foreach($listsortievendeur as $resul) { ?>
                                                                   <tr>
                                                                  <td><?php echo $resul['id_sortie']; ?></td>
                                                                  <td><?php echo $resul['nom_chauffeur']; ?></td>
                                                                  <td><?php echo $resul['nom_camion']; ?></td>
                                                                  <td><?php  echo $_SESSION['user'] ?></td>
                                                                  <td><?php echo $resul['nom_vendeur']; ?></td>
                                                                  <td><?php  echo $resul['date_sortie'] ?></td>                                                                 
                                                                <td>
                                                                    <a href="index.php?idsortie=<?php echo $resul['id_sortie']; ?>&page=addretour" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true">Realiser le retour</i></a>
                                                                </td>
                                                            </tr>
                                                            <?php } ?> 
                                                            
                                                        </table> 
                                                        
                                                    </div>
                                                <!-- <form action="" method="post">
                                                    <div class="row" style="margin-bottom: 150px;">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                                <button type="submit" name="valider" class="btn btn-ctl-bt waves-effect waves-light m-r-10" style="margin-right: 100px;" >Valider
                                                                </button>
                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                        

   <?php
     require("footer.php")
   ?>
          
           