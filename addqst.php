<?php
include('connection.php');

if(isset($_GET['title']) && isset($_GET['desc'])) {
    $title = $_GET['title'];
    $desc = $_GET['desc'];
    $sql = "INSERT INTO question (titre_qst, descrp_qst, date_qst) VALUES ('$title', '$desc', NOW())";
    $result = mysqli_query($conn, $sql);
    $last_id = mysqli_insert_id($conn);
    if($result) {
        echo $last_id;
    }
}

?>

  

