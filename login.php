<?php
session_start();

$plain_password = 'Passw0rd';
$admin_hash = password_hash($plain_password, PASSWORD_DEFAULT);

if (isset($_GET['password'])) {
    $password = $_GET['password'];

    if (password_verify($password, $admin_hash)) {
        session_regenerate_id(true);
        $_SESSION['is_admin'] = true;

        header("Location: admin.php");
        exit();
    } else {
        $error = "Vale parool!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Admin login</h2>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="get">
    <input type="password" name="password" placeholder="Parool">
    <button type="submit">Logi sisse</button>
</form>
<a href="index.php" class="back-button">Tagasi avalehele</a>
</body>
</html>