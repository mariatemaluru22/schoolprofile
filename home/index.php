<?php
require_once '../helper/connection.php';

session_start();
?>


<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERVIEW</title>
    
    <!-- All CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <nav class="navbar navbar-light bg-light justify-content-between">
        <div class="container">
          <a class="navbar-brand" href="#"><head>
    </head>
    <body>
    <header>
    
    <img src="img/logo.jpg" alt="logo" height="50" width="50">
</header> 
<h4><b>SMK INDONESIA DIGITAL</b></h4>
        <h5>maju seiring perkembangan digital</h5>
    </body>
</html>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
              </li>        
            </ul>
          </div>
        </div>
      </nav>
         
         
         
         <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <?php
            $query ="SELECT * FROM foto";
            $result = $connection->query($query);
            for($i=0; $i<$result->num_rows;$i++){
                echo '
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="'.$i.'"';
                if($i==0){
                echo 'class="active" aria-current="true"';
                }
                echo'></button>';
            }
            ?>
          <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
        </div>
        <div class="carousel-inner">
        <?php
          $query ="SELECT * FROM foto";
          $result = $connection->query($query);
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                if($row['id'] == 1){
                echo'<div class="carousel-item active">';}else{echo'<div class="carousel-item">';}
                echo'<img src="../foto/'.$row['file'].'" class="d-block w-100" alt="'.$row['judul'].'">
                    <div class="carousel-caption d-none d-md-block">
                    <h5>'.$row['judul'].'</h5>
                    </div>  
                </div>';
            }}
            ?>   
     
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <!-- about section starts -->
      <section id="about" class="about section-padding">
          <div class="container">
              <div class="row">
                  <div class="col-lg-4 col-md-12 col-12">
                      <div class="about-img">
                        <img src="img/keg.jpg" class="rounded float-right" width="400px" >
                      </div>
                  </div>
                  <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                      <div class="about-text">
                            <h2>Gallery Kegiatan Sekolah</h2>
                                <?php
            $query ="SELECT galery.id, galery.post_id, post.judul, post.isi, galery.position, galery.status FROM galery JOIN post ON post.id = galery.post_id;";
            $result = $connection->query($query);
                if($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()) {
                    if($row['id'] == 1){
                    echo'<div>';}else{echo'<div>';}
                    echo'
                        <h5>'.$row['judul'].'</h5>
                        <p>'.$row['isi'].'</p>

                        </div>  
                    </div>';
                }}
            ?>   
                            
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- about section Ends -->
      <!-- services section Starts -->
      
      <section id="about" class="about section-padding">
          <div class="container">
              <div class="row">
                  <div class="col-lg-4 col-md-12 col-12">
                      
                  </div>
                  <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                      <div class="about-text">
                            <h2>AGENDA SEKOLAH</h2>
                           <p>*SOSIALISASI SMK Pusat Keunggulan</p>
                           <p>*MERDEKA BELAJAR</p>
                           <p>*RAPAT UNTUK STUDY TOUR KELAS 11</p>
                           <p>*RAPAT KELULUSAN KELAS 12 2023/2024</p>
                            
      </section><!-- End About Section -->
  
      <!-- ======= Clients Section ======= -->
      <section id="clients" class="clients">
        <div class="container" data-aos="zoom-in">
  
          <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
              <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
  
        </div>
      </section><!-- End Clients Section -->
  
      <!-- ======= Features Section ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">
  
          <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="float-right" data-aos-delay="100">
              <img src="img/brosur.jpg" class="rounded float-right" width="400px" >
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
              <h2>Informasi Terkini</h2>
              <?php
              $result = mysqli_query($connection, "SELECT post.id, petugas.username, kategori.kategori_name, post.judul, post.isi, post.status, post.created_at
              FROM ((post
              INNER JOIN petugas ON post.petugas_id = petugas.id)
              INNER JOIN kategori ON post.kategori_id = kategori.id);
              ");
                while ($data = mysqli_fetch_array($result)) :
                ?>
                <div class="card">
                    <div class="container">
                    <h5><?= $data['judul'] ?></h5>
                                    <p><?= $data['isi'] ?></p>
                    </div>
                    </div>
               

                <?php
                endwhile;
                ?>
            
            </div>
          </div>
  
        </div>
      </section>

      
      <!-- Contact starts -->
      <section id="contact" class="contact section-padding">
        <div class="container mt-5 mb-5">
            <div class="row">
                
					</form>
				</div>
			</div>
		</div>
      </section>
      <!-- contact ends -->
      <!-- footer starts -->
     
<footer class="color color-quaternary" id="footer">
     <div class="container">
        <div class="row">
           
            <div class="col-md-4">
               <h5 class="mb-sm">LOKASI</h5>
               <iframe src="https://maps.google.com/maps?q=smks 1 triple j&amp;t=&amp;z=10&amp;ie=UTF8&amp;iwloc=&amp;output=embed" width="200%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
              <div class="about-text">
                <h1><p align="right">Peta Sekolah</p></h1>
                <h8><p align="right">Jl. Landbow No.01, Karang Asem Barat, Kec. Citeureup, 
                  <h8><p align="right">Kabupaten Bogor, Jawa Barat 16810
                 
                   
              </div>
                    
              </div>
			
                </div>
              </form>
            </div><!-- End Contact Form -->
  
          </div>
         
        </div>
  
      </section><!-- /Contact Section -->
              <p class="text-white">All Right Reserved By @2024</p>
          </div>
      </footer>
      <!-- footer ends -->








    
    
    <!-- All Js -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>




<!--for getting the form download the code from download button-->