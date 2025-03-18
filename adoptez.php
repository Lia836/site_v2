<?php
// Inclure le fichier de configuration
include 'config.php';

// Inclure l'en-tête
include 'header.php';
?>

<section class="adoption">
    <div class="filters">
        <!-- Filtres -->
        <h2>Filtres</h2>
        <button>Type d'animal</button>
        <button>Race</button>
        <button>Âge</button>
        <button>Sexe</button>
        <button>Taille</button>
    </div>

    <div class="adoption-content">
        <!-- Contenu de l'adoption -->
        <h2>Animaux à adopter</h2>
        <div class="animals">
            <?php
            // Récupérer les animaux disponibles depuis la base de données
            $sql = "SELECT 
                        a.id AS animal_id,
                        a.nom AS animal_nom,
                        a.dob AS animal_dob,
                        a.description AS animal_description,
                        e.nom AS espece_nom,
                        r.nom AS race_nom
                    FROM 
                        ipm_animaux_animals AS a
                    LEFT JOIN 
                        ipm_animaux_races AS r ON a.race_id = r.id
                    LEFT JOIN 
                        ipm_animaux_especes AS e ON r.espece_id = e.id
                    LEFT JOIN 
                        ipm_animaux_status_animals AS s ON a.status_id = s.id
                    WHERE 
                        s.nom = 'Disponible'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()): ?>
                    <div class="animal-card">
                        <img src="<?= htmlspecialchars($row["animal_dob"]) ?>" alt="<?= htmlspecialchars($row["animal_nom"]) ?>">
                        <h3><?= htmlspecialchars($row["animal_nom"]) ?>, <?= htmlspecialchars($row["espece_nom"]) ?></h3>
                        <p>Race: <?= htmlspecialchars($row["race_nom"]) ?></p>
                        <p><?= htmlspecialchars($row["animal_description"]) ?></p>
                        <a href="animal.php?id=<?= htmlspecialchars($row["animal_id"]) ?>" class="adopt-button">Voir plus</a>
                    </div>
                <?php endwhile;
            } else { ?>
                <p>Aucun animal disponible pour le moment.</p>
            <?php } ?>
        </div>
    </div>
</section>

<?php
// Inclure le pied de page
include 'footer.php';
?>

