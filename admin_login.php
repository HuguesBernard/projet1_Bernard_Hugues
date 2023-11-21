<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('db_connection.php');

    $adminUsername = $_POST["admin_username"];
    $adminPassword = $_POST["admin_password"];

    $query = "SELECT * FROM administration_users WHERE admin_username = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $adminUsername);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin && password_verify($adminPassword, $admin['admin_password'])) {
        $_SESSION["admin_id"] = $admin["id"];
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Identifiants invalides.";
    }
}
?>

<!-- Le formulaire HTML pour la connexion des administrateurs -->
