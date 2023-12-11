<?php
include "connection.php";

if (isset($_GET["id_rep"])) {
    $id_rep = $_GET['id_rep'];

    $getStatutQuery = "SELECT statut_rep FROM reponse WHERE id_rep = $id_rep";
    $resultStatut = mysqli_query($conn, $getStatutQuery);

    if ($resultStatut) {
        $row = mysqli_fetch_assoc($resultStatut);
        $currentStatus = $row['statut_rep'];

        $newStatus = ($currentStatus == 1) ? 0 : 1;

        $reqSolution = "UPDATE reponse SET statut_rep = $newStatus WHERE id_rep = $id_rep";
        $resultSolution = mysqli_query($conn, $reqSolution);

        if ($resultSolution) {
            header('Location: newM.php');
        } else {
            echo "Error updating database: " . mysqli_error($conn);
        }
    } else {
        echo "Error retrieving current status: " . mysqli_error($conn);
    }
}
?>
