<?php
// Inclure le fichier de configuration
include 'config.php';

// Inclure l'en-tête
include 'header.php';
?>

<section class="equipe">
    <h2>Notre équipe</h2>
    <p>Découvrez les membres dévoués qui font vivre New Life Pets.</p>

    <div class="team-members">
        <?php
        // Requête SQL pour récupérer les membres de l'équipe
        $sql = "SELECT 
                    u.name AS nom_equipe, 
                    u.email AS email_equipe, 
                    r.nom AS role_equipe
                FROM 
                    ipm_animaux_users AS u
                LEFT JOIN 
                    ipm_animaux_roles AS r ON u.role = r.id
                WHERE 
                    u.deleted_at IS NULL";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()): ?>
                <div class="team-member">
                    <!-- Image du membre -->
                    <img src="images/membre_equipe.jpg" alt="<?= htmlspecialchars($row["nom_equipe"]) ?>">
                    
                    <!-- Nom et rôle -->
                    <h3><?= htmlspecialchars($row["nom_equipe"]) ?></h3>
                    <p>Role: <?= htmlspecialchars($row["role_equipe"]) ?></p>
                    
                    <!-- Email -->
                    <p><?= htmlspecialchars($row["email_equipe"]) ?></p>
                </div>
            <?php endwhile;
        } else { ?>
            <p>Aucun membre de l'équipe disponible pour le moment.</p>
        <?php } ?>
    </div>
</section>

<?php
// Inclure le pied de page
include 'footer.php';
?>
