<?php
// Inclure le fichier de configuration
include 'config.php';

// Inclure l'en-tête
include 'header.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $montant = $_POST["montant"];
    $consentement = isset($_POST["consentement"]);

    // Valider les données
    if (empty($nom) || empty($email) || empty($montant)) {
        $erreur = "Veuillez remplir tous les champs.";
    } elseif (!$consentement) {
        $erreur = "Veuillez accepter les termes et conditions.";
    } else {
        // Enregistrer les données dans la base de données
        $sql = "INSERT INTO ipm_animaux_dons (nom, email, montant, date) VALUES ('$nom', '$email', '$montant', NOW())";

        if ($conn->query($sql) === TRUE) {
            $succes = "Merci pour votre don !";
        } else {
            $erreur = "Erreur lors de l'enregistrement du don : " . $conn->error;
        }
    }
}
?>

<section class="don">
    <h2>Faire un don</h2>

    <?php if (isset($erreur)): ?>
        <p class="erreur"><?= htmlspecialchars($erreur) ?></p>
    <?php endif; ?>

    <?php if (isset($succes)): ?>
        <p class="succes"><?= htmlspecialchars($succes) ?></p>
    <?php endif; ?>

    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="montant">Montant :</label>
        <input type="number" id="montant" name="montant" min="1" required>

        <label for="consentement">
            <input type="checkbox" id="consentement" name="consentement" required>
            Je comprends et j’accepte que les données personnelles que j’ai indiquées dans ce formulaire soient transmises à New Life Pets dans le cadre du traitement de ma demande de contact auprès du service donateur et adhérent de l'association.
        </label>

        <button type="submit">Faire un don</button>
    </form>
</section>

<?php
// Inclure le pied de page
include 'footer.php';
?>
