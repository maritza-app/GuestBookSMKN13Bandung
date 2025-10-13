<?php
include 'config.php'; // koneksi ke database

// Ambil 3 data kunjungan terakhir dari tiap tabel
$ortu_query = mysqli_query($conn, "SELECT nama_ortu_wali,keperluan, tanggal_kunjungan_ow FROM kunjungan_ortu_wali ORDER BY tanggal_kunjungan_ow DESC LIMIT 5");
$instansi_query = mysqli_query($conn, "SELECT nama_pengunjung,nama_instansi,keperluan,tanggal_kunjungan_instansi  FROM kunjungan_instansi ORDER BY tanggal_kunjungan_instansi DESC LIMIT 5");
$umum_query = mysqli_query($conn, "SELECT nama_pengunjung_umum, berkunjung_sebagai,keperluan ,tanggal_kunjungan FROM kunjungan_umum ORDER BY tanggal_kunjungan DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Guest Book </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Space+Grotesk&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light border-bottom border-2 border-white">
               <a href="index.html" class="navbar-brand d-flex align-items-center">
    <img style="width: 60px; margin-right: 10px;" src="img/logobukutamu.png" alt="">
    <h1 class="mb-0 fs-4">Guest Book SMK Negeri 13 Bandung</h1>
</a>

                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="team.html" class="nav-item nav-link">Development</a>
                         <a href="data.php" class="nav-item nav-link">5 Data Kunjungan terakhir</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

 <!-- ====== Section: Kunjungan Terakhir ====== -->
    <div class="container py-5 wow fadeIn" data-wow-delay="0.2s">
        <h2 class="text-center mb-5">📋 Data Kunjungan Terakhir</h2>

        <div class="row g-4">

            <!-- Orang Tua/Wali -->
            <div class="col-lg-4 col-md-6">
                <div class="card shadow border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary mb-3 text-center">👨‍👩‍👧 Orang Tua / Wali</h5>
                        <table class="table table-sm table-bordered text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Ortu/Wali</th>
                                    <th>Keperluan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(mysqli_num_rows($ortu_query) > 0){ 
                                    while($data = mysqli_fetch_assoc($ortu_query)){ ?>
                                    <tr>
                                        <td><?= htmlspecialchars($data['nama_ortu_wali']); ?></td>
                                         <td><?= htmlspecialchars($data['keperluan']); ?></td>
                                        <td><?= date('d M Y', strtotime($data['tanggal_kunjungan_ow'])); ?></td>
                                    </tr>
                                <?php } } else { ?>
                                    <tr><td colspan="2">Belum ada data</td></tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Instansi -->
            <div class="col-lg-4 col-md-6">
                <div class="card shadow border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title text-success mb-3 text-center">🏢 Instansi</h5>
                        <table class="table table-sm table-bordered text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama Perwakilan</th>
                                    <th>Nama Instansi</th>
                                    <th>Keperluan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(mysqli_num_rows($instansi_query) > 0){ 
                                    while($data = mysqli_fetch_assoc($instansi_query)){ ?>
                                    <tr>
                                        <td><?= htmlspecialchars($data['nama_pengunjung']); ?></td>
                                                                                <td><?= htmlspecialchars($data['nama_instansi']); ?></td>
                                                                                                                        <td><?= htmlspecialchars($data['keperluan']); ?></td>
                                        <td><?= date('d M Y', strtotime($data['tanggal_kunjungan_instansi'])); ?></td>
                                    </tr>
                                <?php } } else { ?>
                                    <tr><td colspan="2">Belum ada data</td></tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Umum -->
            <div class="col-lg-4 col-md-6">
                <div class="card shadow border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title text-info mb-3 text-center">🙋‍♂️ Umum</h5>
                        <table class="table table-sm table-bordered text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama</th>
                                       <th>Berkunjung sebagai</th>
                                          <th>Keperluan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(mysqli_num_rows($umum_query) > 0){ 
                                    while($data = mysqli_fetch_assoc($umum_query)){ ?>
                                    <tr>
                                        <td><?= htmlspecialchars($data['nama_pengunjung_umum']); ?></td>
                                                                                <td><?= htmlspecialchars($data['berkunjung_sebagai']); ?></td>
                                                                                                                        <td><?= htmlspecialchars($data['keperluan']); ?></td>
                                        <td><?= date('d M Y', strtotime($data['tanggal_kunjungan'])); ?></td>
                                    </tr>
                                <?php } } else { ?>
                                    <tr><td colspan="2">Belum ada data</td></tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="lib/wow/wow.min.js"></script>
    <script>new WOW().init();</script>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <a href="index.html" class="d-inline-block mb-3">
                        <h1 class="text-white">Guest Book 13</h1>
                    </a>
                    <p class="mb-0">Dengan Guest Book 13, semua data tamu tercatat secara akurat hanya dalam hitungan detik. Lebih cepat, efisien, dan terjamin keamanannya. Saatnya tinggalkan cara lama, beralih ke yang lebih smart!</p>
                </div>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <h5 class="text-white mb-4">Get In Touch</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>JL. SOEKARNO-HATTA KM. 10 BANDUNG</p>
                    <p><i class="fa fa-phone-alt me-3"></i>0227318960</p>
                    <p><i class="fa fa-envelope me-3"></i>smk13bdg@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="#!"><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="#!"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="#!"><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="#!"><i
                                class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-primary btn-square border-2 me-2" href="#!"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="container wow fadeIn" data-wow-delay="0.1s">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy;MFN Squad</a>, All Right Reserved.

    
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#!" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>