<?php 
session_start();
require_once 'koneksi.php';

if (isset($_POST['delete'])) {
    $proyek_id = $_POST['delete'];
    $query = "DELETE FROM proyek WHERE id='$proyek_id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header('Location: proyek.php');
    } else {
        echo 'Failed to delete project.';
    }
}

if (isset($_POST['reset'])) {
    $query = "ALTER TABLE users AUTO_INCREMENT = 1";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        header('Location: proyek.php');
    } else {
        echo 'Failed to reset ID.';
    }
}

?>

<!doctype html>
<!--
	Lamoda by TEMPLATE STOCK
	templatestock.co @templatestock
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->


<html lang="en-gb" class="no-js">
  <head>
    <meta charset="utf-8">
	<title>Manajemen Proyek</title>
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">		
		
	<!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    	

     <!--styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="stylesheet" href="css/etlinefont.css">
    <link href="css/style.css" type="text/css"  rel="stylesheet"/>

   
	<body  data-spy="scroll" data-target="#main-menu">
 

  <!--Start Page loader -->
  <div id="pageloader">   
        <div class="loader">
          <img src="images/progress.gif" alt='loader' />
        </div>
   </div>
   <!--End Page loader -->
   
      
   <!--Start Navigation-->
   <header id="header">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu">
								<span class="sr-only">Toggle navigation</span>
								<span class="fa fa-bars"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="clear-toggle"></div>
							<div id="main-menu" class="collapse scroll navbar-right">
								<ul class="nav">
                                
									<li class=""> <a href="index.php">Beranda</a> </li>
									
									<li class="active"> <a href="proyek.php">Proyek</a> </li>
										
								</ul>
							</div>
						</div>
					</div>
				</div>
			</header>
    <!--End Navigation-->

		<!--start page-header -->
		<section id="page-header" class="parallax">
             <div class="overlay"></div>
			<div class="container">
				<h1>Proyek</h1>
                <!--Start Breadcrumb-->
                <div class="breadcrumb">
					<ul>
						<li>
							<a href="index.php">Beranda</a>
						</li>
						<li class="current">
							<a href="proyek.php">Proyek</a>
						</li>
					</ul>
				</div>
                <!--End Breadcrumb-->
			</div>
		</section>
		<!--End page-header -->

        <!-- main -->
        <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="card-body">
                <div class="mb-3">
                </div>
                <a href="tambah_proyek.php" class="btn btn-primary float-end">Tambah Proyek</a>
                <h4></h4>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Nama Proyek</th>
                            <th>Jenis</th>
                            <th>Bulan</th>
                            <th>Penanggung Jawab</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM proyek";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $counter = 1;
                                foreach ($query_run as $proyek) {
                                    ?>
                                    <tr>
                                        <td><?= $counter++; ?></td>
                                        <td>
                                            <form method="post" style="display: inline;">
                                                <button type="submit" name="delete" value="<?= $proyek['id'];?>" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                        <td><?= $proyek['nama'];?></td>
                                        <td><?= $proyek['jenis'];?></td>
                                        <td><?= $proyek['bulan'];?></td>
                                        <td><?= $proyek['pj'];?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<h5> No Record Found </h5>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- main -->
            
   <!--Start Footer-->
   <footer>
       <div class="container">
           <div class="row">
               <!--Start copyright-->
               <div class="col-md-6 col-sm-6 col-xs-6">
                   <div class="copyright"><p>Copyright © 2016 All Rights reserved by: <a href="http://templatestock.co">Template Stock</a>
                 </p></div>
               </div>
               <!--End copyright-->
               
               <!--start social icons-->
               <div class="col-md-6 col-sm-6 col-xs-6">
                   <div class="social-icons">
                       <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                       </ul>
                    </div>
               </div>
               <!--End social icons-->
           </div> <!-- /.row-->
       </div> <!-- /.container-->
   </footer>
   <!--End Footer-->

   <a href="#" class="scrollup"> <i class="fa fa-chevron-up"> </i> </a>

    <!--Plugins-->
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="js/owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/jquery.easypiechart.js"></script>
    <script type="text/javascript" src="js/jquery.appear.js"></script>
    <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    
 </body>
</html>

