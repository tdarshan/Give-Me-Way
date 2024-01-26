<?php 
    include '../../connection.php';

    $id = $_GET['id'];

    $sqlDEL = "UPDATE cattleonroad SET `isdelete`='1' WHERE `id`='$id'";
    $result = mysqli_query($connection, $sqlDEL);

    header('Location: COR.php');

?>