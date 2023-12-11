 <?php 

 include('connection.php');
 if (isset($_POST['answerqst'])) {

if (isset($_POST['descrp_rep'])) {
    $d =  $_POST['descrp_rep'];
}


$ida = $_SESSION['id'];
$idqst = $_POST['id_qst'];

$sql = "INSERT INTO reponse (descrp_rep, date_rep, id_user,id_qst) VALUES ('$d', DATE_FORMAT(NOW(), '%Y-%m-%d %H:%i:%s'), '$ida' ,'$idqst')";

$result = mysqli_query($conn, $sql);
if ($result) {
    header('Location: newpage.php');
} else {
    echo "Error: " . mysqli_error($conn);
}
}
