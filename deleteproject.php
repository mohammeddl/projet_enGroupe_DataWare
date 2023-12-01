
​<?php
include "connection.php";
if (isset($_GET['id_pro'])) {
    $id = $_GET['id_pro'];
    $sql = "DELETE FROM projet WHERE id_pro ='$id'";
    $result = mysqli_query($conn, $sql);
     if ($result == TRUE) {
        header('Location: dashboardp.php');
    }
}
?>
