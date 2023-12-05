<?php
include('connection.php');

$title = $descrp = "";
session_start();

if (isset($_POST['askqst'])) {
    if (isset($_POST['titre_qst'])) {
        $title =  $_POST['titre_qst'];
    }
    if (isset($_POST['descrp_qst'])) {
        $descrp =  $_POST['descrp_qst'];
    }

    $id = $_SESSION['id'];

    $sql = "INSERT INTO question (titre_qst, descrp_qst, date_qst, id_user) VALUES ('$title', '$descrp', DATE_FORMAT(NOW(), '%Y-%m-%d %H:%i:%s'), '$id')";
    
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: newpage.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
