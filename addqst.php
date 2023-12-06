<?php
include('connection.php');

$title = $descrp = $d = "";
session_start();

if (isset($_POST['askqst'])) {
    if (isset($_POST['titre_qst'])) {
        $title =  $_POST['titre_qst'];
    }
    if (isset($_POST['descrp_qst'])) {
        $descrp =  $_POST['descrp_qst'];
    }

    // Get the user ID from the session
    $id = $_SESSION['id'];

$sql = "INSERT INTO question (titre_qst, descrp_qst, date_qst, id_user) VALUES ('$title', '$descrp', DATE_FORMAT(NOW(), '%Y-%m-%d %H:%i:%s'), '$id')";
    
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: newpage.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['answerqst'])) {

    if (isset($_POST['descrp_rep'])) {
        $d =  $_POST['descrp_rep'];
    }

    // Get the user ID from the session
    $ida = $_SESSION['id'];
    $idqst = $_POST['id_qst'];

    $sql = "INSERT INTO reponse (descrp_rep, date_rep, id_user,id_qst) VALUES ('$d', DATE_FORMAT(NOW(), '%Y-%m-%d %H:%i:%s'), '$ida' ,'$idqst')";
    
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: newpage.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}



?>
