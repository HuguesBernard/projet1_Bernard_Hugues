<?php
// browse_products.php

session_start();
include('db_connection.php');

// Récupération de la liste des produits depuis la base de données
$query = "SELECT * FROM administration_products";
$result = $conn->query($query);

// Vous pouvez également ajouter la logique de recherche/filtrage ici
// ...

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcourir les Produits</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <!-- Barre de navigation -->
    </header>

    <div class="container">
        <section>
            <h2>Parcourir les Produits</h2>

            <!-- Ajoutez un formulaire de recherche/filtrage ici si nécessaire -->
            <!-- <form action="browse_products.php" method="get">
                 ...
            </form> -->

            <div class="product-list">
                <?php
                // Afficher la liste des produits
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="product">';
                        echo '<h3>' . $row['product_name'] . '</h3>';
                        echo '<p>' . $row['product_description'] . '</p>';
                        echo '<p>Prix: $' . $row['product_price'] . '</p>';
                        // Ajoutez un bouton "Ajouter au panier" ou d'autres actions ici
                        echo '</div>';
                    }
                } else {
                    echo '<p>Aucun produit disponible.</p>';
                }
                ?>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; 2023 Votre Site. Tous droits réservés.</p>
    </footer>

</body>
</html>
