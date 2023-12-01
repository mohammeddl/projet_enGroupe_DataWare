<?php
require('connection.php');

if (isset($_POST['submits'])) {
    $id_projet = $_POST['projet'];
    $id_utilisateur = $_POST['id']; 
    $role = 'ScrumMaster';

    $updateQuery = "UPDATE utilisateur
                    SET  role = '$role', projet = '$id_projet'
                    WHERE id = '$id_utilisateur'";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        header('Location: dashboardp.php');
    }
}
?>


  

