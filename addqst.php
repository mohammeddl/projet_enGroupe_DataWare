<?php
include('connection.php');

$title = $descrp = $d = "";
session_start();

// Retrieve id_pro for the logged-in user
$id_user = $_SESSION['id'];
$sql_pro = "SELECT projet FROM utilisateur WHERE id = $id_user";
$result_pro = mysqli_query($conn, $sql_pro);

if ($result_pro && $row_pro = mysqli_fetch_assoc($result_pro)) {
    $idpro = $row_pro['projet'];
    mysqli_free_result($result_pro);


    if (isset($_POST['askqst'])) {
        if (isset($_POST['titre_qst'])) {
            $title =  $_POST['titre_qst'];
        }
        if (isset($_POST['descrp_qst'])) {
            $descrp =  $_POST['descrp_qst'];
        }

        $id = $_SESSION['id'];

        $sql = "INSERT INTO question (titre_qst, descrp_qst, date_qst,id_pro, id_user) VALUES ('$title', '$descrp', DATE_FORMAT(NOW(), '%Y-%m-%d %H:%i:%s'),'$idpro', '$id')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('Location: newpage.php');
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

if (isset($_POST['answerqst'])) {

    if (isset($_POST['descrp_rep'])) {
        $d =  $_POST['descrp_rep'];
    }


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