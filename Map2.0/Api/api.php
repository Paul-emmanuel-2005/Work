<?php
header('Content-Type: application/json');

// Paramètres de connexion à la base de données
$servername = "localhost";
$username = "root";  // Remplace par ton nom d'utilisateur
$password = "";  // Remplace par ton mot de passe
$dbname = "dbdrh";                // Remplace par le nom de ta base de données

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête SQL pour récupérer les établissements
$sql = "SELECT NOM, PRENOMS, EMPLOI, CONTACT, LAT, LNG FROM t_sites";
$result = $conn->query($sql);
$etablissements = array();

if ($result->num_rows > 0) {
    // Récupérer chaque ligne et l'ajouter au tableau
    while($row = $result->fetch_assoc()) {
        $etablissements[] = $row;
    }
}

// Envoyer la réponse JSON
echo json_encode($etablissements , JSON_PRETTY_PRINT); 

// Fermer la connexion
$conn->close();
?>
 