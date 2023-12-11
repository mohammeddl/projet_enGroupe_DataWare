<?php
include "connection.php";

if (isset($_GET["id_rep"])) {
    $id_rep = $_GET['id_rep'];
    echo 'hello';

    $getStatutQuery = "SELECT archive_rep FROM reponse WHERE id_rep = $id_rep";
    $resultArchive = mysqli_query($conn, $getStatutQuery);

    if ($resultArchive) {
        $row = mysqli_fetch_assoc($resultArchive);
        $currentArchiv = $row['archive_rep'];

        $newArchiv = ($currentArchiv == 1) ? 0 : 1;
        $reqSolution = "UPDATE reponse SET archive_rep = $newArchiv WHERE id_rep = $id_rep";
        $resultSolution = mysqli_query($conn, $reqSolution);

        if ($resultSolution) {
            header('Location:newpage.php');
        } else {
            echo "Error updating database: " . mysqli_error($conn);
        }
    } else {
        echo "Error retrieving current status: " . mysqli_error($conn);
    }
}
?>