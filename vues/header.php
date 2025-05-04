
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tableau de bord | Depot Boisson</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- nalika Icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/nalika-icon.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt=""  width="150"/></a>
                <strong><img src="img/logo/logosn.png" alt="" /></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="has-arrow" href="index.html">
								   <i class="icon nalika-home icon-wrap"></i>
								   <span class="mini-click-non">Tableau de bord</span>
								</a>
                        </li>
                        <?php if($_SESSION['role']=="ADMINISTRATEUR"){ ?>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-oui">Gestion jour</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Google Map" href="index.php?page=addjour"><span class="mini-sub-pro">Ajouter Jour</span></a></li>
                                <li><a title="Data Maps" href="index.php?page=listjour"><span class="mini-sub-pro">Liste Jour</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-oui">Gestion User</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Google Map" href="index.php?page=adduser"><span class="mini-sub-pro">Ajouter User</span></a></li>
                                <li><a title="Data Maps" href="index.php?page=listuser"><span class="mini-sub-pro">Liste User</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-oui">Gestion Fournisseur</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Google Map" href="index.php?page=addfournisseur"><span class="mini-sub-pro">Ajouter Fournisseur</span></a></li>
                                <li><a title="Data Maps" href="index.php?page=listfournisseur"><span class="mini-sub-pro">Liste Fournisseur</span></a></li>
                            </ul>
                        </li>          
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-non">Gestion Camion</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <!-- <a title="Google Map" href="google-map.html"></a> -->
                                <li><a title="Google Map" href="index.php?page=addcamion"><span class="mini-sub-pro">Ajouter Camion</span></a></li>
                                <li><a title="Data Maps" href="index.php?page=listcamion"><span class="mini-sub-pro">Liste Camions</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-non">Gestion Chauffeur</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <!-- <a title="Google Map" href="google-map.html"></a> -->
                                <li><a title="Google Map" href="index.php?page=addchauffeur"><span class="mini-sub-pro">Ajouter Chauffeur</span></a></li>
                                <li><a title="Data Maps" href="index.php?page=listchauffeur"><span class="mini-sub-pro">Liste Chauffeurs</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-non">Gestion Vendeur</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Google Map" href="index.php?page=addvendeur"><span class="mini-sub-pro">Ajouter Vendeur</span></a></li>
                                <li><a title="Data Maps" href="index.php?page=listvendeur"><span class="mini-sub-pro">Liste Vendeurs</span></a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        <?php if($_SESSION['jour']!=0){ ?>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-non">Gestion Achat</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Google Map" href="index.php?page=addachat"><span class="mini-sub-pro">Ajouter Achat</span></a></li>
                                <li><a title="Data Maps" href="index.php?page=listachat"><span class="mini-sub-pro">Liste Achat</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-non">Gestion Produit</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Google Map" href="index.php?page=addproduit"><span class="mini-sub-pro">Ajouter Produit</span></a></li>
                                <li><a title="Data Maps" href="index.php?page=listproduit"><span class="mini-sub-pro">Liste Produit</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-oui">Gestion sortie</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Google Map" href="index.php?page=addsortie"><span class="mini-sub-pro">Ajouter sortie</span></a></li>
                                <li><a title="Data Maps" href="index.php?page=listsortie"><span class="mini-sub-pro">Liste sortie</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-oui">Gestion Retour</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Google Map" href="index.php?page=addretour"><span class="mini-sub-pro">Ajouter Retour</span></a></li>
                                <li><a title="Data Maps" href="index.php?page=listretour"><span class="mini-sub-pro">Liste Retour</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-oui">Gestion Perte</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Google Map" href=""><span class="mini-sub-pro">Ajouter perte</span></a></li>
                                <li><a title="Data Maps" href=""><span class="mini-sub-pro">Liste perte</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-oui">Gestion Stock</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Data Maps" href="index.php?page=stock"><span class="mini-sub-pro">Verifier stock</span></a></li>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <!-- <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a> -->
                    </div>
                </div>
            </div>
        </div>
         <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="icon nalika-menu-task"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n hd-search-rp">
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                
                                                
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<i class="icon nalika-user"></i>
															<span class="admin-name"> <?php echo $_SESSION['user']; ?> </span>
															<i class="icon nalika-down-arrow nalika-angle-dw"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        
                                                         <li><a href="lock.html"><span class="icon nalika-settings author-log-ic"></span> Modifier password</a>
                                                        </li>
                                                        <li><a href="index.php?page=logout"><span class="icon nalika-unlocked author-log-ic"></span> Se Deconnecter</a>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="icon nalika-menu-task"></i></a>
           
                                                <!---->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Gestion Jour<span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Pagemob" class="collapse dropdown-header-top">
                                                <li><a href="index.php?page=addjour">Ajouter Jour</a>
                                                </li>
                                                <li><a href="index.php?page=listjour">Liste Jour</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php if($_SESSION['role']=="ADMINISTRATEUR"){ ?>
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Gestion Fournisseur<span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="index.php?page=addfournisseur">Ajouter Fournisseur</a></li>
                                                <li><a href="index.php?page=listfour">Liste Fournisseur</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Gestion Camion <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="index.php?page=addcamion">Ajouter Camion</a>
                                                </li>
                                                <li><a href="index.php?page=listcamion">Liste Camion</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#others" href="#">Gestion Chauffeur<span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="others" class="collapse dropdown-header-top">
                                                <li><a href="index.php?page=addchauffeur">Ajouter Chauffeur</a></li>
                                                <li><a href="index.php?page=listchauffeur">Liste Chauffeur</a></li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Gestion Vendeur<span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                                <li><a href="index.php?page=addvendeur">Ajouter Vendeur</a>
                                                </li>
                                                <li><a href="index.php?page=listvendeur">Liste Vendeur</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <?php } ?>
                                        <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Gestion Achat<span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Chartsmob" class="collapse dropdown-header-top">
                                                <li><a href="index.php?page=addachat">Ajouter Achat</a>
                                                </li>
                                                <li><a href="index.php?page=listeachat">Liste Achat</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Gestion Produit<span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Chartsmob" class="collapse dropdown-header-top">
                                                <li><a href="index.php?page=addproduit">Ajouter Produit</a>
                                                </li>
                                                <li><a href="index.php?page=listproduit">Liste Produit</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Gestion Sortie<span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="index.php?page=addsortie">Ajouter Sortie</a>
                                                </li>
                                                <li><a href="index.php?page=listsortie">Liste Sortie</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#formsmob" href="#">Gestion Retour<span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="formsmob" class="collapse dropdown-header-top">
                                                <li><a href="EnregistreRetour.html">Ajouter Retour</a>
                                                </li>
                                                <li><a href="ListRetour.html">Liste Retour</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Appviewsmob" href="#">Gestion Stock <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                            <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                                <li><a href="index.php?page=stock">Verifier Stock</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
