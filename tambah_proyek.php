<?php
session_start();
require_once 'koneksi.php';

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $bulan = $_POST['bulan'];
    $pj = $_POST['pj'];

    // Check if any of the input fields are empty
    if (empty($nama) || empty($jenis) || empty($bulan) || empty($pj)) {
        $response = array('status' => 'error', 'message' => 'Semua kolom harus diisi');
    } else {
        $query = mysqli_query($conn, "INSERT INTO proyek (nama, jenis, bulan, pj) VALUES ('$nama', '$jenis', '$bulan', '$pj')");

        if ($query) {
            $response = array('status' => 'success', 'message' => 'Buku berhasil ditambahkan');
        } else {
            $response = array('status' => 'error', 'message' => 'Gagal menambahkan buku');
        }
    }

    // Set header to JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
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
						<li>
							<a href="proyek.php">Proyek</a>
						</li>
						<li class="current">
							<a href="">Tambah Proyek</a>
						</li>
					</ul>
				</div>
                <!--End Breadcrumb-->
			</div>
		</section>
		<!--End page-header -->

            <!-- main -->
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1></h1>
            <div>
                <a href="proyek.php" class="btn btn-primary">Kembali</a>
            </div>
            <h1></h1>
        </header>
        <form class="row g-3" id="tambahProyekForm" method="post" action="namafilenya.php">
            <div class="col-6">
                <label for="name" class="form-label">Nama Proyek</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Proyek">
            </div>
            <div class="col-6">
                <label for="jenis" class="form-label">Jenis Proyek</label>
                <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan Jenis Proyek">
            </div>
            <div class="col-6">
                <label for="bulan" class="form-label">Bulan</label>
                <input type="text" class="form-control" id="bulan" name="bulan" placeholder="Masukkan Bulan Proyek">
            </div>
            <div class="col-6">
                <label for="pj" class="form-label">Penanggung Jawab</label>
                <input type="text" class="form-control" id="pj" name="pj" placeholder="Masukkan Penanggung Jawab Proyek">
            </div>
            <div class="col-12">
                <h4></h4>
                <button type="button" id="tambah" name="tambah" class="btn btn-primary" onclick="tambahBuku()">Tambah</button>
            </div>
            <h1></h1>
        </form>
    </div>
    <h1></h1>
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

   <script>
        function tambahProyek() {
            // Mendapatkan nilai dari form
            var judul = document.getElementById('nama').value;
            var penerbit = document.getElementById('jenis').value;
            var tahun = document.getElementById('bulan').value;
            var tahun = document.getElementById('pj').value;

            // Melakukan request POST menggunakan JavaScript (Anda mungkin ingin menggunakan library seperti axios atau fetch)
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'namafilenya.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle respons dari server
                    var response = JSON.parse(xhr.responseText);
                    alert(response.message);  // Ubah ini sesuai kebutuhan Anda
                }
            };
            var data = 'nama=' + nama + '&jenis=' + jenis + '&bulan=' + bulan + '&pj=' + pj;
            xhr.send(data);
        }
    </script>
    
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

