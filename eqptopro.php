<?php
require('connection.php');

if (isset($_POST['sbmt'])) {
    $id_equipe = $_POST['id_equipe'];
    $id_pro = $_POST['id_pro']; 

    $updateQuery = "UPDATE equipe
                    SET id_pro = '$id_pro'
                    WHERE id_equipe = '$id_equipe'";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        header('Location: dashboards.php');
    }
}
?>


  

