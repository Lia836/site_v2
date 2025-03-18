<?php
// Inclure le fichier de configuration
include 'config.php';

// Inclure l'en-tête
include 'header.php';
?>

<section class="temoignages">
    <h2>Témoignages</h2>
    <div class="testimonial-cards">
        <?php
        // Requête SQL pour récupérer les témoignages
        $sql = "SELECT 
                    t.titre AS temoignage_titre, 
                    t.texte AS temoignage_texte, 
                    t.note AS temoignage_note, 
                    u.name AS utilisateur_nom, 
                    t.img1 AS image1, 
                    t.img2 AS image2, 
                    t.img3 AS image3
                FROM 
                    ipm_animaux_temoignages AS t
                LEFT JOIN 
                    ipm_animaux_users AS u ON t.user = u.id
                WHERE 
                    t.deleted_at IS NULL";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()): ?>
                <div class="testimonial-card">
                    <!-- Images du témoignage -->
                    <?php if (!empty($row["image1"])): ?>
                        <img src="<?= htmlspecialchars($row["image1"]) ?>" alt="Image du témoignage">
                    <?php endif; ?>
                    
                    <!-- Titre et contenu -->
                    <h3><?= htmlspecialchars($row["temoignage_titre"]) ?></h3>
                    <p><?= htmlspecialchars($row["temoignage_texte"]) ?></p>
                    
                    <!-- Note et utilisateur -->
                    <p>Note : <?= htmlspecialchars($row["temoignage_note"]) ?>/5</p>
                    <p>Par : <?= htmlspecialchars($row["utilisateur_nom"]) ?></p>
                </div>
            <?php endwhile;
        } else { ?>
            <p>Aucun témoignage disponible pour le moment.</p>
        <?php } ?>
    </div>
</section>

<?php
// Inclure le pied de page
include 'footer.php';
?>
