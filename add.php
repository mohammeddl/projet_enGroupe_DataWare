<?php
include('connection.php');

$name = $date = "";
if (isset($_POST['submit'])) {
    if (isset($_POST['nom_equipe'])) {
        $name =  $_POST['nom_equipe'];
    }
    if (isset($_POST['date_creation'])) {
        $date =  $_POST['date_creation'];
    }

    $sql = "INSERT INTO  equipe (nom_equipe, date_creation ) VALUES ('$name', '$date' )";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      header('Location: dashboards.php');
    }
}
?>

  

