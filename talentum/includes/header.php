<?php
//  Me conecto a la BD PostgreSQL
include "config/conexion.php";
include "config/funciones.php";
?>
<?php 
session_start();
if($_SESSION['rol']=="admin"): ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Estilo datatables -->
    <link href="http://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Mi estilo propio -->
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../../assets/img/logo_talentum.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Administración
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="cursos.php">Cursos</a></li>
            <li><a class="dropdown-item" href="usuarios.php">Usuaris</a></li>
            <li><a class="dropdown-item" href="inscribir.php">Inscriure Usuaris</a></li>
          </ul>
        </li>
        <li></li>
      </ul>
    </div>
    <a href="PHP/logout.php" class="btn btn-danger"><i class="bi bi-x-circle"></i> Tancar sessió</a>
  </div>
</nav>
<div class="container mt-5 caja">
<?php elseif($_SESSION['rol']=="alumno"): ?>
  <?php header("Location: alumno.php")?>

<?php else:?>
  <?php header("Location: ../index.php")?>
<?php endif;?>
