<?php
// admin_login.php

session_start();
include('includes/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $adminUsername = $_POST["admin_username"];
    $adminPassword = $_POST["admin_password"];

    // Recherche de l'administrateur dans la base de données
    $query = "SELECT * FROM administration_users WHERE admin_username = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $adminUsername);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    // Vérification du mot de passe
    if ($admin && password_verify($adminPassword, $admin['admin_password'])) {
        // Authentification réussie, enregistrement de l'ID de l'administrateur dans la session
        $_SESSION["admin_id"] = $admin["id"];

        // Redirection vers le tableau de bord de l'administration
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Identifiants invalides.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administrateur</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <header>
        <!-- Barre de navigation -->
    </header>

    <div class="container">
        <section>
            <h2>Connexion Administrateur</h2>

            <!-- Formulaire de connexion pour les administrateurs -->
            <form action="admin_login.php" method="post">
                <label for="admin_username">Nom d'utilisateur:</label>
                <input type="text" id="admin_username" name="admin_username" required>

                <label for="admin_password">Mot de passe:</label>
                <input type="password" id="admin_password" name="admin_password" required>

                <button type="submit">Se connecter</button>
            </form>

            <?php
            // Afficher un message d'erreur si l'authentification échoue
            if (isset($error)) {
                echo '<div class="message error">' . $error . '</div>';
            }
            ?>
        </section>
    </div>

    <footer>
        <p>&copy; 2023 Votre Site. Tous droits réservés.</p>
    </footer>

</body>
</html>
