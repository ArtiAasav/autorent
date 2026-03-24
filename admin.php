<?php include("config.php");

// $hashed_password = password_hash("admin", PASSWORD_DEFAULT);

session_start();
if ($_SESSION['role'] !== "admin") {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Autod</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
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
      <span class="me-3 text-success fw-semibold">
    <i class="bi bi-shield-lock"></i> Admin sisse logitud
</span>

<button class="btn btn-danger" onclick="window.location.href='logout.php'">
    Logout
</button>
    </div>
  </div>
</nav>
<!-- menüü -->
<div class="container py-5">

    <!-- Pealkiri -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-0">Autod</h2>
            <small class="text-muted">Halda autorendi autode nimekirja.</small>
        </div>
        <a href="add_car.php" class="btn btn-dark">
            <i class="bi bi-plus-lg"></i> Lisa auto
        </a>
    </div>

    <!-- Andmebaasi päring -->
    <?php
$limit = 25;

// Lehekülg
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $limit;

// Kokku ridade arv
$countQuery = "SELECT COUNT(*) as total FROM cars";
$countResult = mysqli_query($yhendus, $countQuery);
$totalRows = mysqli_fetch_assoc($countResult)['total'];
$totalPages = ceil($totalRows / $limit);

// Andmete päring piiranguga
$paring = "SELECT * FROM cars ORDER BY id LIMIT $limit OFFSET $offset";
$valjund = mysqli_query($yhendus, $paring);
?>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Pilt</th>
                        <th>Auto</th>
                        <th>Mootor</th>
                        <th>Kütus</th>
                        <th>Hind</th>
                        <th>Kirjeldus</th>
                        <th>Staatus</th>
                        <th class="text-end">Tegevused</th>
                    </tr>
                </thead>
                <tbody>

                <?php while($rida = mysqli_fetch_row($valjund)) { ?>

                    <tr>
                        <td>
                            <img src="https://loremflickr.com/120/80/<?php echo $rida[1]; ?>"
                                 class="rounded border"
                                 width="80">
                        </td>

                        <td>
                            <strong><?php echo $rida[1]; ?></strong><br>
                            <small class="text-muted"><?php echo $rida[9]; ?></small>
                        </td>

                        <td><?php echo $rida[3]; ?></td>
                        <td><?php echo $rida[4]; ?></td>
                        <td><?php echo $rida[5]; ?> € / päev</td>

                        <td class="text-muted">
                            <?php
                            $kirjeldus = $rida[7];
                            $luhike = mb_strimwidth($kirjeldus, 0, 50, "...");
                            echo htmlspecialchars($luhike);
                            ?>
                        </td>
                        <td><?php echo $rida[8];?></td>
                        <td class="text-end">
                            <a href="edit.php?id=<?php echo $rida[0]; ?>" 
                               class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-pencil"></i> Muuda
                            </a>

                            <a href="delete.php?id=<?php echo $rida[0]; ?>" 
                               class="btn btn-outline-danger btn-sm"
                               onclick="return confirm('Kas oled kindel, et soovid kustutada?')">
                                <i class="bi bi-trash"></i> Kustuta
                            </a>
                        </td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- Pagination -->
<nav class="mt-4">
  <ul class="pagination justify-content-center">

    <!-- EELMINE NUPP -->
    <li class="page-item <?php if($page <= 1) echo 'disabled'; ?>">
      <a class="page-link" href="?page=<?php echo $page-1; ?>">
        Eelmine
      </a>
    </li>

    <?php
    // Näita ainult eelmist numbrit kui olemas
    if ($page > 1) {
        echo '<li class="page-item">
                <a class="page-link" href="?page='.($page-1).'">'.($page-1).'</a>
              </li>';
    }
    ?>

    <!-- AKTIIVNE LEHT -->
    <li class="page-item active">
      <a class="page-link" href="#">
        <?php echo $page; ?>
      </a>
    </li>

    <?php
    // Näita ainult järgmist numbrit kui olemas
    if ($page < $totalPages) {
        echo '<li class="page-item">
                <a class="page-link" href="?page='.($page+1).'">'.($page+1).'</a>
              </li>';
    }
    ?>

    <!-- JÄRGMINE NUPP -->
    <li class="page-item <?php if($page >= $totalPages) echo 'disabled'; ?>">
      <a class="page-link" href="?page=<?php echo $page+1; ?>">
        Järgmine
      </a>
    </li>

  </ul>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>