<?php
session_start();

include('includes/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userUsername = $_POST["user_username"];
    $userPassword = $_POST["user_password"];

    $query = "SELECT * FROM administration_users WHERE admin_username = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $userUsername);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($userPassword, $user['admin_password'])) {
        $_SESSION["user_id"] = $user["id"];
        header("Location: browse_products.php");
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
    <title>Connexion</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <header>
        <!-- Barre de navigation (vous pouvez ajouter cela plus tard) -->
    </header>

    <div class="container">
        <section>
            <h2>Connexion</h2>
            <form method="POST" action="">
                <label for="user_username">Nom d'utilisateur :</label>
                <input type="text" id="user_username" name="user_username" required>

                <label for="user_password">Mot de passe :</label>
                <input type="password" id="user_password" name="user_password" required>

                <button type="submit">Se connecter</button>
            </form>

            <?php
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

