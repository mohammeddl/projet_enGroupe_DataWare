<?php
include "connection.php";

if (isset($_GET["id_qst"])) {
    $id_qst = $_GET['id_qst'];

    $getStatutQuery = "SELECT archive_qst FROM question WHERE id_qst = $id_qst";
    $resultArchive = mysqli_query($conn, $getStatutQuery);
    if ($resultArchive) {
        $row = mysqli_fetch_assoc($resultArchive);
        $currentArchiv = $row['archive_qst'];

        $newArchiv = ($currentArchiv == 1) ? 0 : 1;
        $reqSolution = "UPDATE question SET archive_qst = $newArchiv WHERE id_qst = $id_qst";
        $resultSolution = mysqli_query($conn, $reqSolution);
        
        $resultA = "UPDATE reponse SET archive_rep = $newArchiv WHERE id_qst = $id_qst";
        $res = mysqli_query($conn, $resultA);


        if ($resultSolution) {
            header('Location: newpage.php');
        } else {
            echo "Error updating database: " . mysqli_error($conn);
        }
    } else {
        echo "Error retrieving current status: " . mysqli_error($conn);
    }
}
?>