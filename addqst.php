<?php
include('connection.php');

$title = $descrp = "";
if (isset($_POST['askqst'])) {
    if (isset($_POST['titre_qst'])) {
        $title =  $_POST['titre_qst'];
    }
    if (isset($_POST['descrp_qst'])) {
        $descrp =  $_POST['descrp_qst'];
    }

    $sql = "INSERT INTO question (titre_qst, descrp_qst, date_qst) VALUES ('$title', '$descrp', NOW())";
    // if(!empty($_POST('tag'))){
    //   $tag = 
    // }
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: newpage.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

  

