<?php
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $myvalues = json_decode($_GET['tags']);

    if ($myvalues) { 
        foreach ($myvalues as $tag) {
            $tagName = mysqli_real_escape_string($conn, $tag);
            $sql = "INSERT INTO tags (nom_tag, id_qst) VALUES ('$tagName', $id)";
            $result = mysqli_query($conn, $sql);

        }}}
