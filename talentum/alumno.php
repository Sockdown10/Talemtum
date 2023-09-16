<?php 
session_start();
require "config/conexion.php";
if($_SESSION['rol']=="alumno"): ?>

<?php

$idUsuario=$_SESSION['id'];
/* Usuario */
$query="SELECT * FROM usuarios WHERE id=?";
$stmt=$conn->prepare($query);
$stmt->execute([$idUsuario]);

$usuario= $stmt->fetch(PDO::FETCH_OBJ); // en vez de sacarlo com array asociativo lo saco como objeto

/* Cursos usuario */
$query="SELECT c.nombreCurso FROM alum_cursos a INNER JOIN cursos c ON a.idCategoria=c.id WHERE idAlumno=?";
$stmt=$conn->prepare($query);
$stmt->execute([$idUsuario]);

$cursos= $stmt->fetchAll(PDO::FETCH_OBJ); // en vez de sacarlo com array asociativo lo saco como objeto

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <!-- Favicons -->
  <link href="../img/favicon.ico" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <header id="header">
        <div class="container-fluid">
            <div class="navbar-brand px-5">
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.php"><img src="../assets/img/logo_talentum.png" alt="Logo Talentum" class="img-fluid"
            width="60"></a>
        </div>
            <button type="button" class="nav-toggle"><i class="bx bx-menu"></i></button>
            <nav class="nav-menu">
                <ul>
                    <li class="active"><a href="#header" class="scrollto">Inici</a></li>
                    <li><a href="https://talentumformacio.wixsite.com/inicio" class="scrollto" target="_blank">Pàgina oficial</a>
                    </li>
                    <li><a href="https://talentumformacio.wixsite.com/inicio/tienda" class="scrollto" target="_blank">Botiga</a>
                    </li>
                    <li><a href="https://talentumformacio.wixsite.com/inicio/blog">Blog</a>
                    <li><a href="#contact" class="scrollto">Contacta'ns</a></li>
                    <li><a href="php/logout.php" class="scrollto">Tanca sessió</a></li>

                </ul>
            </nav><!-- .nav-menu -->
        </div>
    </header><!-- End #header -->
    <section id="hero">
    <div class="hero-container d-flex justify-content-center">
        <h1>Talentum Formació</h1>
        <h2 style="font-size:30px;">Benvingut, <?=$usuario->nombre?></h2>
        <h6>(<?= $usuario->rol?>)</h6>
    </div>
    </section><!-- #hero -->


    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
        <div class="container">
                <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="login_personal_talentum/assets/images/user.png" alt="avatar"
                        class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3"><?= $usuario->nombre." ".$usuario->apellidos  ?></h5>
                        <a href="php/logout.php" class="btn btn-danger"><i class="bi bi-x-circle"></i> Tanca sessió</a>
                    </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Usuari</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $usuario->username ?></p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nom</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $usuario->nombre ?></p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Cognoms</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $usuario->apellidos ?></p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $usuario->email ?></p>
                        </div>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Rol</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= $usuario->rol ?></p>
                        </div>
                        </div>
                        <hr>
                    </div>
                    </div>
                    <div class="row">
                        <h1 class="text-center mb-3">Estat dels teus cursos:</h1>
                    
                    
                    <!--  -->
                    <?php foreach ($cursos as $fila):?>
                        <div class="col-md-6 mb-3">
                        <div class="card mb-4 mb-md-0">   
                        <div class="card-body">
                            <h2 class="mb-4"><?=$fila->nombreCurso?>
                            </h2>
                            <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                            <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">Tema 1</p>
                            <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">Tema 2</p>
                            <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">Tema 3</p>
                            <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">Avaluació final</p>
                            <div class="progress rounded mb-2" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <a href="" class="btn btn-primary mt-3 w-100">Veure el curs</a>
                        </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <!--  -->
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Why Us Section -->



    <!-- ======= Frequenty Asked Questions Section ======= -->
    <section class="faq">
        <div class="container">
            <div class="section-title">
            <h2>Preguntes freqüents</h2> 
            </div>

            <ul class="faq-list">

            <li>
                <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq1">Problemes per ingressar al curs? <i
                    class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur
                    gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
                </div>
            </li>

            <li>
                <a data-bs-toggle="collapse" data-bs-target="#faq2" class="collapsed">Com ingressar al curs? <i
                    class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id
                    donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit
                    ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
                </div>
            </li>

            <li>
                <a data-bs-toggle="collapse" data-bs-target="#faq3" class="collapsed">Hi ha diploma del curs? <i
                    class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum
                    integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt.
                    Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
                </div>
            </li>

            <li>
                <a data-bs-toggle="collapse" data-bs-target="#faq4" class="collapsed">Altres formes de pagament? <i
                    class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id
                    donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit
                    ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
                </div>
            </li>

            <li>
                <a data-bs-toggle="collapse" data-bs-target="#faq5" class="collapsed">De cuant és la durada del curs? <i
                    class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc
                    vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus
                    gravida quis blandit turpis cursus in
                </p>
                </div>
            </li>

            <li>
                <a data-bs-toggle="collapse" data-bs-target="#faq6" class="collapsed">Quins són els horaris del curs? <i
                    class="bx bx-down-arrow-alt icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada
                    nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis
                    tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas
                    fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                </p>
                </div>
            </li>

            </ul>

        </div>
    </section><!-- End Frequenty Asked Questions Section -->

    <section id="contact" class="contact section-bg">
        <div class="container">
            <div class="section-title">
            <h2>Contacte</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-5 mb-5 mb-md-0">
                    <div class="info">
                        <div class="address">
                            <i class="bx bx-map"></i>
                            <p>Carrer dels Calders 32,<br>08203, Sabadell, Barcelona</p>
                        </div>

                        <div class="email">
                            <i class="bx bx-envelope"></i>
                            <p>talentum.sefed@gmail.com</p>
                        </div>

                        <div class="phone">
                            <i class="bx bx-phone-call"></i>
                            <p>931683120</p>
                        </div>
                    </div>

                    <div class="social-links">
                    <a href="https://twitter.com/talentumforma?lang=ca" target="_blank" class="twitter"><i
                        class="bx bxl-twitter"></i></a>
                    <a href="https://www.facebook.com/talentum.formacio.sls" target="_blank" class="facebook"><i
                        class="bx bxl-facebook"></i></a>
                    <a href="https://www.instagram.com/wix/" target="_blank" class="instagram"><i
                        class="bx bxl-instagram"></i></a>
                    <a href="https://es.linkedin.com/in/talentum-formaci%C3%B3-s-a-s-9247a8213" target="_blank"
                        class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Contact Us Section -->
<!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Talentum</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-landing-page/ -->
            Modificat per Yosuart i Yanina <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
        </div>
    </footer><!-- End #footer -->

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
</body>
</html>

<?php elseif($_SESSION['rol']=="admin"): ?>
    <?php header("Location: usuarios.php") ?>
<?php else:?>
    <?php header("Location: ../index.php") ?>
<?php endif;?>