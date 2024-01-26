<?php
include '../../connection.php';
session_start();
$email = $_SESSION['u_email'];
// echo $email;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Injured Requests | GiveMeWay</title>
    <link rel="stylesheet" href="../../bootstrap.min.css">
    <link rel="stylesheet" href="../profileStyle.css">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user-secret me-2"></i> <a href="../home.php" class="list-group-item list-group-item-action bg-transparent second-text active">GiveMeWay</a> </div>
            <div class="list-group list-group-flush my-3">
                <a href="../Profile.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="COR.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-project-diagram me-2"></i>Cattle On Road</a>
                <a href="Injured.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-chart-line me-2"></i>Injured Animals</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-paperclip me-2"></i>Lost Animals</a>
                <a href="../../logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>

        <div class="container-fluid px-4">
            <div class="row my-5">
                <h3 class="fs-4 mb-3">Your Requests</h3>
                <div class="col">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                            <tr class="bg-dark text-light text-center">
                                <th scope="col" width="50">District</th>
                                <th scope="col">Animal Type</th>
                                <th scope="col">Details</th>
                                <th scope="col">Address</th>
                                <th scope="col">Latitude</th>
                                <th scope="col">Longitude</th>
                                <th scope="col">Time</th>
                                <th scope="col">Buttons</th>
                            </tr>
                        </thead>
                        <?php 
                            $sql_COR = "SELECT * FROM injured WHERE `email`='$email' AND `isdelete`='0'";
                            $result = mysqli_query($connection, $sql_COR);

                            while ($res = mysqli_fetch_array($result)) 
                            {
                        ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $res['district'];?></th>
                                <td><?php echo $res['aType'];?></td>
                                <td><?php echo $res['details'];?></td>
                                <td><?php echo $res['address'];?></td>
                                <td><?php echo $res['latitude'];?></td>
                                <td><?php echo $res['longitude'];?></td>
                                <td><?php echo $res['time'];?></td>
                                <td>
                                    <button class="btn">
                                        <a href="deleteINJ.php?id=<?php echo $res['id'];?>" class="btn btn-danger">Delete</a>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>

</html>