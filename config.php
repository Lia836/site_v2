<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "nom_utilisateur";   // Remplacez par votre nom d'utilisateur
$password = "mot_de_passe";   // Remplacez par votre mot de passe
$dbname = "nom_base_de_données";   // Remplacez par le nom de votre base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}
?>
