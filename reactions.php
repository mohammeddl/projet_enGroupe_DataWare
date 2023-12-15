<?php
include('connection.php');
session_start();

$iduser = $_GET['iduser'];
$type = $_GET['type'];
$question =$_GET['question'];


if($question){
        $idqst = $_GET['qstid'];
        $sqlDelete = " DELETE FROM reactions WHERE id_user = $iduser AND id_qst = $idqst";
        mysqli_query($conn, $sqlDelete);
        
        
        
        
        if ($type) {
            
                $sqlDi="INSERT INTO reactions(id_qst,id_user,dislike) values($idqst,$iduser,1)";
        mysqli_query($conn, $sqlDi);
            } else  {
                $sql = "INSERT INTO reactions(id_qst,id_user,likee) values($idqst,$iduser,1)";
        mysqli_query($conn, $sql);
            
        
        } 
}elseif(!$question){
        $idrep = $_GET['repid'];
        $sqlDelete = " DELETE FROM reactionanswer WHERE id_user = $iduser AND id_rep = $idrep";
        mysqli_query($conn, $sqlDelete);
        
        if ($type) {
            
                $sqlDi="INSERT INTO reactionanswer(id_rep,id_user,dislike) values($idrep,$iduser,1)";
        mysqli_query($conn, $sqlDi);
            } else  {
                $sql = "INSERT INTO reactionanswer(id_rep,id_user,likee) values($idrep,$iduser,1)";
        mysqli_query($conn, $sql);
            
        
        } 
}



