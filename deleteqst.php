
​<?php
include "connection.php";
if (isset($_GET['id_qst'])) {
    $id = $_GET['id_qst'];
    $sql = "DELETE FROM question WHERE id_qst ='$id'";
    $result = mysqli_query($conn, $sql);
     if ($result == TRUE) {
        header('Location: newM.php');
    }
}
?>
