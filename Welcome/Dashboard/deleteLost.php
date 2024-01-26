<?php 
    include '../../connection.php';

    $id = $_GET['id'];

    $sqlDEL = "UPDATE lostanimal SET `isdelete`='1' WHERE `id`='$id'";
    $result = mysqli_query($connection, $sqlDEL);

    header('Location: COR.php');

?>