
            
        
<?php
require("header.php")
?> <!-- Single pro tab start-->
<div class="single-product-tab-area mg-b-30">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-tab-pro-inner">
                        <ul id="myTab3" class="tab-review-design">
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i> Ajouter Produit</a></li>
                            
                        </ul>
                        <form action="" method="post">
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12 mx-5 ">
                                        <div class="review-content-section">
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"></i></span>
                                                <select name="produit" class="form-control pro-edt-select form-control-primary">
                                                    <option>Selectionner Le Nom Du produit</option>
                                                    <?php foreach($listproduit as $data2) { ?>
															<option value="<?php echo $data2['id_produit'] ?>">
                                                                 <?php echo $data2['nom'] ?>
                                                            </option>
															
                                                            <?php } ?> 
                                                </select>
                                            </div>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" placeholder="Entrer La Quantite" name="quantite">
                                            </div>
                                           
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center custom-pro-edt-ds">
                                                <button type="submit" name="addproduit" class="btn btn-ctl-bt waves-effect waves-light m-r-10" style="margin-right: 100px;" >Ajouter Produit
                                                    </button>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <!---tableau-->
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
                                                                <th>NOM DU PRODUIT</th>
                                                                <th>QUANTITE</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <?php for($j=0;$j<count($_SESSION['sortie']);$j++) { ?>
															
															<tr>
                                                                <td><?php echo $_SESSION['sortie'][$j]['nomproduit'] ?></td>
                                                                <td><?php echo $_SESSION['sortie'][$j]['quantite'] ?></td>
                                                                
                                                                <td>
                                                                    <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                                </td>
                                                            </tr>
                                                            <?php } ?> 
                                                            
                                                        </table> 
                                                        
                                                    </div>
                                                    <form action="" method="post">
                                                    <div class="row" style="margin-bottom: 150px;">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                                <button type="submit" name="valider" class="btn btn-ctl-bt waves-effect waves-light m-r-10" style="margin-right: 100px;" >Valider
                                                                </button>
                                                    
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php
require("footer.php")
?>