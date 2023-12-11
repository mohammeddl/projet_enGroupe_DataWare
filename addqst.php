<?php
include('connection.php');

session_start();

// Retrieve id_pro for the logged-in user
$id_user = $_SESSION['id'];
$sql_pro = "SELECT projet FROM utilisateur WHERE id = $id_user";
$result_pro = mysqli_query($conn, $sql_pro);

if ($result_pro && $row_pro = mysqli_fetch_assoc($result_pro)) {
    $idpro=$row_pro['projet'];
    // if($idpro == NULL){
    //     echo "u don't have a project to ask a question yet";
    // }
    if(isset($_GET['title']) && isset($_GET['desc'])) {
        $title = $_GET['title'];
        $desc = $_GET['desc'];
        $id = $_SESSION['id'];
        $sql = "INSERT INTO question (titre_qst, descrp_qst, date_qst, id_pro, id_user) VALUES ('$title', '$desc', DATE_FORMAT(NOW(), '%Y-%m-%d %H:%i:%s'),'$idpro', '$id')";
        $result = mysqli_query($conn, $sql);
        $last_id = mysqli_insert_id($conn);
        if($result) {
            echo $last_id;
        }
    }
}



