<?php 
//faire un if quand on est connecté avec un admin
require './lib/php/adm_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>
<html>
    <head>
        <link rel ="stylesheet" type="text/css" href="./lib/css/bootstrap-4.0.0/dist/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="./lib/css/styleAdmin.css"/>
        <link rel="stylesheet" href="./lib/css/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="./lib/css/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="./lib/css/AdminLTE/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="./lib/css/AdminLTE/dist/css/skins/_all-skins.min.css">
        <script language="javascript" src="./lib/js/jquery-3.3.1.js"></script>
        <script src="./lib/js/popper.js"></script>
        <script src="./lib/css/bootstrap-4.0.0/dist/js/bootstrap.js"></script>
        <!-- SlimScroll -->
        <script src="./lib/css/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="./lib/css/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="./lib/css/AdminLTE/dist/js/adminlte.min.js"></script>
        <!--Script coté utilisateur-->
        <script src="./lib/js/scriptAdmin.js"></script>
        <meta charset="UTF-8">
        <title>Mess Condorcet</title>
    </head>
    <body class="hold-transition skin-green sidebar-collapse sidebar-mini">
        <section>
            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo" >
                  <!-- mini logo for sidebar mini 50x50 pixels -->
                  <span class="logo-mini"><b>Mess</b></span>
                  <!-- logo for regular state and mobile devices -->
                  <span class="logo-lg"><b>Mess</b> Condorcet</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                  <!-- Sidebar toggle button-->
                  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <h3>Administration</h3>
                  <input type="button" class=" btn btn-link deconnecter" id="btn_co_admin" value="Se déconnecter" />
                  <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                      <li>
                          <img src="./images/logo.jpg" alt="Condorcet" width="50px" class="pull-right" title="logo-condorcet"/> 
                      </li>
                    </ul>
                  </div>
                </nav>
              </header>
        </section>
        <section class="main">
                <div id="menu">
                    <?php 
                    if(file_exists("./lib/php/menu.php")){
                        include './lib/php/menu.php';
                    }
                    ?>
                </div>
                <div class="content-wrapper">
                    <?php
                        if(!isset($_SESSION['page'])){
                            $_SESSION['page']="accueil";
                        }
                        if(isset($_GET['page'])){
                            $_SESSION['page']=$_GET['page'];
                        }
                        $path='./pages/'.$_SESSION['page'].'.php';
                        if(file_exists($path)){
                            include ($path);
                        }
                        else {
                            print "Oups...";
                        }
                    ?>  
                </div>
             <div class="footer">
                    <b>Editeur responsable : Ricour Christopher - christopher.ricour@condorcet.be</b>
                </div>  
        </section>
    </body>
</html>


