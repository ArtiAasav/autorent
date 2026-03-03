<?php
include("config.php");

$id = $_GET["id"];

$paring = "DELETE FROM cars WHERE id=$id";
mysqli_query($yhendus, $paring);

header("Location: admin.php");
?>