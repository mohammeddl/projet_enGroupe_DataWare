
​<?php
include "connection.php";
if (isset($_GET['id_rep'])) {
    $id = $_GET['id_rep'];
    $sql = "DELETE FROM reponse WHERE id_rep ='$id'";
    $result = mysqli_query($conn, $sql);
     if ($result == TRUE) {
        header('Location: newM2.php');
    }
}
?>
