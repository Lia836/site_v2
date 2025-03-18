<?php
// Inclure le fichier de configuration
include 'config.php';

// Inclure l'en-tête
include 'header.php';
?>

<section class="aider">
    <div class="image-section">
        <img src="images/aide.jpg" alt="Chien avec un jouet">
    </div>

    <div class="text-section">
        <h2>Comment vous pouvez nous aider :</h2>
        <p>Vous pouvez faire un don (quel qu’en soit le montant), nous rejoindre comme bénévole ou encore accueillir temporairement l’un de nos compagnons.</p>

        <ul class="options">
            <li><a href="don.php">Faire un don</a></li>
            <li><a href="benevolat.php">Devenir bénévole</a></li>
            <li><a href="accueil.php">Accueillir un animal</a></li>
        </ul>
    </div>
</section>

<?php
// Inclure le pied de page
include 'footer.php';
?>
