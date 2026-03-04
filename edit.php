<?php
include("config.php");


if id=
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Muuda auto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<!-- menüü -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Autorent</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Avaleht</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Autod</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Hinnad</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kontakt</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Otsi" aria-label="Search" name="search"/>
        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
      </form>
      <button class="btn btn-success ms-5" onclick="window.location.href='admin.php'">Login</button>
    </div>
  </div>
</nav>
<!-- menüü -->
<div class="container mt-5">
    <div class="card-body">

        <!-- Kaardi päis -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Muuda auto andmeid</h2>
            <a href="admin.php" class="btn btn-outline-secondary btn">Tagasi</a>
        </div>
         <hr>
        <div class="card-body">

            <form method="GET">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Mark</label>
                        <input type="text" name="mark" class="form-control"
                               value="<?= $make['mark']; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mudel</label>
                        <input type="text" name="model" class="form-control"
                               value="<?= $car['model']; ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Mootor</label>
                        <input type="text" name="engine" class="form-control"
                               value="<?= $car['engine']; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kütus</label>
                        <select name="fuel" class="form-select">
                            <option value="Bensiin" <?= $car['fuel']=="Bensiin"?"selected":"" ?>>Bensiin</option>
                            <option value="Diisel" <?= $car['fuel']=="Diisel"?"selected":"" ?>>Diisel</option>
                            <option value="Elekter" <?= $car['fuel']=="Elekter"?"selected":"" ?>>Elekter</option>
                            <option value="Hübriid" <?= $car['fuel']=="Hübriid"?"selected":"" ?>>Hübriid</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Hind (€ / päev)</label>
                        <input type="number" name="price" class="form-control"
                               value="<?= $car['price']; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Auto pilt</label>
                        <input type="file" name="image" class="form-control">
                        <br>
                        <img src="<?= $car['image']; ?>" width="120" class="img-thumbnail">
                    </div>
                </div>

                <hr>

                <button type="submit" class="btn btn-dark">Uuenda</button>
                <a href="admin.php" class="btn btn-secondary">Tühista</a>

            </form>

        </div>
    </div>
</div>

</body>
</html>