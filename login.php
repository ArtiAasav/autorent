<?php
include("config.php");
session_start();

// $plain_password = 'Passw0rd';
// $admin_hash = password_hash($plain_password, PASSWORD_DEFAULT);

// if (isset($_GET['password'])) {
//     $password = $_GET['password'];

//     if (password_verify($password, $admin_hash)) {
//         session_regenerate_id(true);
//         $_SESSION['is_admin'] = true;

//         header("Location: admin.php");
//         exit();
//     } else {
//         $error = "Vale parool!";
//     }
// }


// $stmt = $yhendus->prepare("SELECT * FROM users WHERE email = ?");
// $stmt->bind_param("s", $_POST['email']);
// $stmt->execute();
// $user = $stmt->get_result()->fetch_assoc();


// if (!isset($_POST['email'], $_POST['password_hash']) || 
//     empty($_POST['email']) || 
//     empty($_POST['password_hash'])) {
//         echo "Täda kõik väljad";
//     }
//     else {
if(isset($_POST['email']) && isset($_POST['password'])){


$email = $_POST['email'];
$password = $_POST['password'];

$paring = "SELECT password_hash, role FROM users WHERE email='$email'";

$result = mysqli_query($yhendus, $paring);
$rida = mysqli_fetch_assoc($result);

if ($rida && password_verify($password, $rida['password_hash'])) {
    echo "OK";
    $_SESSION['email'] = $email;
    $_SESSION['role'] = $rida['role'];
    header("Location: admin.php");
} else {
    echo "Viga";
}
// }
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

<form method="post">
    <input type="email" name="email" placeholder="email" value="itkeenjus@gmail.com"><br>
    <input type="password" name="password" placeholder="Parool">
    <button type="submit">Logi sisse</button>
</form>
<a href="index.php" class="back-button">Tagasi avalehele</a>
</body>
</html>