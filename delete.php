
​<?php
include "connection.php";
if (isset($_GET['id_equipe'])) {
    $id = $_GET['id_equipe'];
    $sql = "DELETE FROM equipe WHERE id_equipe ='$id'";
    $result = mysqli_query($conn, $sql);
     if ($result == TRUE) {
        header('Location: dashboards.php');
    }
}
?>
