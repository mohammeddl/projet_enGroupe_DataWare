<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $titre = $_GET['titre'];
    $myvalues = json_decode($_GET['tags']);

    if ($myvalues) {
        mysqli_begin_transaction($conn);

     
            foreach ($myvalues as $tag) {
                $tagName = mysqli_real_escape_string($conn, $tag);
                $sql = "INSERT INTO tags (nom_tag, id_qst) VALUES (?, ?)";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "si", $tagName, $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                $sql2 = "INSERT INTO tag_qst VALUES (?, ?, ?)";
                $stmt2 = mysqli_prepare($conn, $sql2);
                mysqli_stmt_bind_param($stmt2, "iss", $id, $titre, $tagName);
                mysqli_stmt_execute($stmt2);
                mysqli_stmt_close($stmt2);
            }
            mysqli_commit($conn);   
        } 
    }


