<?php
// register.php

session_start();
include('includes/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = $_POST["email"];

    // Validation supplémentaire si nécessaire

    // Insertion des données dans la base de données
    $query = "INSERT INTO administration_users (admin_username, admin_password, admin_email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username, $password, $email);
    $stmt->execute();

    // Redirection vers la page de connexion après l'inscription
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <header>
        <!-- Barre de navigation -->
    </header>

    <div class="container">
        <section>
            <h2>Inscription</h2>

            <!-- Formulaire d'inscription -->
            <form action="register.php" method="post">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>

                <label for="email">Adresse e-mail:</label>
                <input type="email" id="email" name="email" required>

                <button type="submit">S'inscrire</button>
            </form>
        </section>
    </div>

    <footer>
        <p>&copy; 2023 Votre Site. Tous droits réservés.</p>
    </footer>

</body>
</html>
