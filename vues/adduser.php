
        
<?php 
    require("header.php");
 ?>
 <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="back-link back-backend">
                    <a href="index.html" class="btn btn-primary">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center custom-login">
                    <h3>Registration</h3>
                    <p>Admin template with very clean and aesthetic style prepared for your next app. </p>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action="" id="loginForm" method="POST">
                            <div class="row">
                                <!-- <div class="form-group col-lg-12">
                                    <label>Username</label>
                                    <input class="form-control" name="usernames" placeholder="Entrer le nom">
                                </div> -->
                                <div class="form-group col-lg-6">
                                    <label>Username</label>
                                    <input type="text" name="usernames" class="form-control" placeholder="Entrer le nom">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Entrer L' email">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password" name="passwords" class="form-control" placeholder="Entrer le password ">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Roles</label>
                                    <input class="form-control" name="roles" placeholder="Entrer le roles">
                                </div>
                                <!-- <div class="checkbox col-lg-12">
                                    <input type="checkbox" class="i-checks" checked> Sigh up for our newsletter
                                </div> -->
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success loginbtn" name="valider">Valider</button>
                                <button class="btn btn-default">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        </div>
        
        <!-- <div>
      <h2 style="visibility:hidden;">Product List</h2>
			<p style="visibility:hidden;">Welcome to Nalika <span class="bread-ntd">Admin Template</span></p>
            <p style="visibility:hidden;">Welcome to Nalika <span class="bread-ntd">Admin Template
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde esse id dolorem a obcaecati,
              dolore aliquam delectus ullam veritatis quibusdam, iste dolor recusandae enim molestias. 
              Autem dolorem nam culpa eligendi! Lorem ipsum dolor sit, amet consectetur adipisicing elit.
               Voluptates non similique ipsum, earum accusamus natus ex voluptate aspernatur praesentium error 
              nulla facere delectus velit sequi sint at! Dicta, perferendis iure.
        </span></p>
		</div>			 -->


<?php 
    require("footer.php");
?>