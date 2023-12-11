<?php
require('connection.php');

if (isset($_POST['send'])) {
    $id_utilisateur = $_POST['id'];
    $id_equipe = $_POST['equipe'];
    $selectEquipeQuery = "SELECT id_pro FROM equipe WHERE id_equipe = '$id_equipe'";
    $selectEquipeResult = mysqli_query($conn, $selectEquipeQuery);
    if ($selectEquipeResult && $row = mysqli_fetch_assoc($selectEquipeResult)) {
        $id_projet = $row['id_pro'];
        $updateQuery = "UPDATE utilisateur
                        SET equipe = '$id_equipe', projet = '$id_projet'
                        WHERE id = '$id_utilisateur'";
        $updateResult = mysqli_query($conn, $updateQuery);
        if ($updateResult) {
            header('Location: dashboards.php');
        } 
    } 
}
?>


