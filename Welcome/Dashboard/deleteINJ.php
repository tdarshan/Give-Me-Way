<?php 
    include '../../connection.php';

    $id = $_GET['id'];

    $sqlDEL = "UPDATE injured SET `isdelete`='1' WHERE `id`='$id'";
    $result = mysqli_query($connection, $sqlDEL);

    header('Location: Injured.php')
?>