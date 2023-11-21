<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('db_connection.php');

    $adminUsername = $_POST["admin_username"];
    $adminPassword = password_hash($_POST["admin_password"], PASSWORD_DEFAULT);
    $adminEmail = $_POST["admin_email"];

    $query = "INSERT INTO administration_users (admin_username, admin_password, admin_email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $adminUsername, $adminPassword, $adminEmail);
    $stmt->execute();

    header("Location: admin_login.php");
    exit();
}
?>

<!-- Le formulaire HTML pour l'inscription des administrateurs -->
