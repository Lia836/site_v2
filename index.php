<?php
// Inclure le fichier de configuration et l'en-tête
include 'config.php';
include 'includes/header.php';
?>

    <section class="hero">
        <h1>Bienvenue chez New Life Pets</h1>
        <h2>Les animaux changent notre vie. Nous pouvons changer la leur.</h2>
        <p>New Life Pets est une organisation à but non lucratif...</p>
    </section>

    <!-- Carrousel des animaux à adopter -->
    <section class="carousel">
        <?php
        // Récupérer les animaux disponibles depuis la base de données
        $sql = "SELECT * FROM ipm_animaux_animals WHERE status_id = (SELECT id FROM ipm_animaux_status_animals WHERE nom = 'Disponible')";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<div class="carousel-inner">';
            while($row = $result->fetch_assoc()) {
                echo '<div class="carousel-item">';
                echo '<img src="' . $row["dob"] . '" alt="' . $row["nom"] . '">';
                echo '<div class="carousel-caption">';
                echo '<h3>' . $row["nom"] . '</h3>';
                echo '<p>' . $row["description"] . '</p>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "<p>Aucun animal disponible pour le moment.</p>";
        }
        ?>
    </section>

<?php
// Inclure le pied de page
include 'includes/footer.php';
?>
