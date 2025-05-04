
           

           
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
                            <h4>Liste des utilisateurs</h4>
                            <div class="add-product">
                                <a href="index.php?page=adduser">Nouveau utilisateurs</a>
                            </div>
                            <table>
                                <tr>
                                    <th>USERNAME</th>
                                    <th>EMAIL</th>
                                    <th>PASSWORD</th>
                                    <th>ROLES</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($listuser as $data) { ?>
                                <tr>
                                    <td> <?php echo $data['usernames'] ?> </td>
                                    <td><?php echo $data['email'] ?></td>
                                    <td>
                                    <?php echo $data['passwords'] ?>
                                    </td>
                                    <td><?php echo $data['roles'] ?></td>
                                    <td>
                                    <a href="index.php?page=modifieruser&id=<?php echo $data['id_user'] ?>" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="index.php?page=deleteuser&id=<?php echo $data['id_user'] ?>" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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