<!-- remove sm  -->
<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id= $_GET['id']; 

    $updateQuery = "UPDATE utilisateur
                    SET role = 'membre'
                    WHERE id = '$id'";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        header('Location: dashboardp.php');
    }
}
?>



  



  



  

