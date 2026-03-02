<?php include("config.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
      .hero {
        height: 300px;
        /* background-image: url("https://picsum.photos/1200/400");
        background-size: cover;
        background-position: center; */
      }
    </style>

</head>
<body>
    <!-- menüü -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Autorent admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Autod</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reserveeringud</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kasutajad</a>
        </li>
      </ul>
      <button class="btn btn-dark">Logouts</button>
    </div>
  </div>
</nav>
<!-- menüü -->