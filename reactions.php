<?php
include('connection.php');
$idqst = $_GET['qstid'];
$iduser = $_GET['iduser'];
$likes = $_GET['likes'];
$dislikes = $_GET['dislikes'];
$type = $_GET['type'];
// echo "idqst is $idqst";
// echo "iduser is $iduser";
// echo "likes is $likes";

if ($type) {
    if (isset($_GET['insert']) && $_GET['insert'] === 'insert') {
     
        $sql = "UPDATE reactions set dislike = $dislikes where id_qst = $idqst";
        mysqli_query($conn, $sql);
    } elseif (isset($_GET['update']) && $_GET['update'] === 'update') {
        $sql = "UPDATE reactions set dislike = $dislikes where id_qst = $idqst";
        mysqli_query($conn, $sql);
    }
} else {

    if (isset($_GET['insert']) && $_GET['insert'] === 'insert') {
        $sql = "INSERT INTO reactions(id_qst,id_user,likee) values($idqst,$iduser,$likes)";
        mysqli_query($conn, $sql);
    } elseif (isset($_GET['update']) && $_GET['update'] === 'update') {
        $sql = "UPDATE reactions set likee = $likes where id_qst = $idqst";
        mysqli_query($conn, $sql);
    }
}
