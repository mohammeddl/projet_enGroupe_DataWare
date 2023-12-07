<?php
include('connection.php');

if (isset($_GET['search'])) {
    $titre = $_GET['search'];
}
$sql = "SELECT id_qst, titre_qst FROM question WHERE titre_qst = ? OR titre_qst LIKE ? OR titre_qst LIKE ? OR titre_qst LIKE ?";
$stmt = mysqli_prepare($conn, $sql);
$searchPattern = "%" . $titre . "%";
mysqli_stmt_bind_param($stmt, "ssss", $titre, $searchPattern, $searchPattern, $searchPattern);

mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $idqst, $titre); 
if($stmt)
{while (mysqli_stmt_fetch($stmt)) {
   ?><a class='py-2 bg-gray-50 qstbtn' href="mysearch.php?idqst=<?=$idqst?>"><?=$titre?></a><?php
}}else{
    ?><div><h3>No data was found</h3></div><?php
}

mysqli_stmt_close($stmt);

?>
