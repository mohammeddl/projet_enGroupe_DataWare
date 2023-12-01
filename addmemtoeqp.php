<?php
require('connection.php');

if (isset($_POST['send'])) {
    $id_equipe = $_POST['equipe'];
    $id_utilisateur = $_POST['id']; 

    $updateQuery = "UPDATE utilisateur
                    SET equipe = '$id_equipe'
                    WHERE id = '$id_utilisateur'";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        header('Location: dashboards.php');
    }
}
?>


  

