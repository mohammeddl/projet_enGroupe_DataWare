<?php
include('connection.php');
session_start();
$idqst = $_GET['qstid'];
$iduser = $_GET['iduser'];
// $likes = $_GET['likes']; => to remove 
// $dislikes = $_GET['dislikes'];
$type = $_GET['type'];



$sqlDelete = " DELETE FROM reactions WHERE id_user = $iduser AND id_qst = $idqst";
mysqli_query($conn, $sqlDelete);


if ($type) {
    
        $sqlDi="INSERT INTO reactions(id_qst,id_user,dislike) values($idqst,$iduser,1)";
mysqli_query($conn, $sqlDi);
    } else  {
        $sql = "INSERT INTO reactions(id_qst,id_user,likee) values($idqst,$iduser,1)";
mysqli_query($conn, $sql);
    

} 



