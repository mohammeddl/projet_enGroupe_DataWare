<?php
// Inclure la connexion à la base de données
include('connection.php');

// Récupérer l'ID de l'utilisateur à archiver depuis le formulaire
$id_question_a_archiver = $_POST['id_qst'];

// Archiver l'utilisateur en mettant la colonne "archived" à 1
$query = "UPDATE question SET archived = 1 WHERE id = $id_question_a_archiver";
$result = $connexion->query($query);

// Vérifier si la requête a réussi
if ($result) {
    echo "L'utilisateur avec l'ID $id_question_a_archiver a été archivé avec succès.";
} else {
    echo "Erreur : " . $connexion->error;
}

// Fermer la connexion
$connexion->close();
?>
