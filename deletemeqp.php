<?php
require('connection.php');

if (isset($_GET['id'])) {
    $id= $_GET['id']; 

    $updateQuery = "UPDATE utilisateur
                    SET equipe = null, projet = null
                    WHERE id = '$id'";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        header('Location: dashboards.php');
    }
}
?>



  



  

