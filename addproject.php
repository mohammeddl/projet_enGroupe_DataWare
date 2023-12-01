<?php
include('connection.php');

$name = $desc = $msg = "";
if (isset($_POST['submit'])) {
    if (isset($_POST['nom_pro'])) {
        $name =  $_POST['nom_pro'];
    }
    if (isset($_POST['descrp_pro'])) {
        $desc =  $_POST['descrp_pro'];
    }

    $sql = "INSERT INTO  projet (nom_pro, descrp_pro ) VALUES ('$name', '$desc' )";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      header('Location: dashboardp.php');

    }
}
?>

  

