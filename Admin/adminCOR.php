<?php
include '../connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COR Requests</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
    <style>
        #map {
            height: 480px;
            width: 80%;
            margin: auto;
        }
        table{
            text-align: center;
        }
    </style>
</head>

<body>

    <?php include 'adminNav.php'; ?>

    <h3 class="text-center">User Queries</h3>

    <div id="map" class="container my-4"></div>

    <?php
    include '../connection.php';
    session_start();
    $city = $_SESSION['city'];
    $sql = "SELECT * FROM cattleonroad WHERE `city`='$city'";
    $retval = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_array($retval)) {
        $Email = $row['email'];
        $city = $row['city'];
        $details = $row['details'];
        $address = $row['address'];
        $latitude = $row['latitude'];
        $longitude = $row['longitude'];
        $image = '../Welcome/onRoad/'.$row['image'];
        $time = $row['time'];
    ?>
        <table class="table table-striped table-hover mt-5">
            <tr>
                <td><?php echo $Email; ?></td>
                <?php 
                echo '<td rowspan="6"> <img alt="Image here" height="230px" width="480px" src='.$image.'> </td>';
                ?>
            </tr>
            <tr>
                <td><?php echo $details; ?></td>
            </tr>
            <tr>
                <td><?php echo $address; ?></td>
            </tr>
            <tr>
                <td><?php echo $latitude; ?></td>
            </tr>
            <tr>
                <td><?php echo $longitude; ?></td>
            </tr>
            <tr>
                <td><?php echo $time; ?></td>
            </tr>
            <tr>
                <td> <a href="https://www.google.com/maps/@<?php echo $latitude; ?>,<?php echo $longitude; ?>,17z" class="btn btn-primary" target="_blank">
                        Map </a>
                </td>
                <td>
                    <a href="" class="btn btn-info">Reach there</a>
                </td>
            </tr>
        </table>
    <?php } ?>


    <script>
        function initMap() {
            //Map options
            var options = {
                zoom: 7.25,
                center: {
                    lat: 22.7231823,
                    lng: 71.6115477
                }
            }

            //New map
            var map = new google.maps.Map(document.getElementById("map"), options);
            <?php
            $sql = 'SELECT latitude, longitude FROM cattleonroad;';
            $retval = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_array($retval)) {
                $latitude = $row['latitude'];
                $longitude = $row['longitude'];
            ?>
                addMarker({
                    coords: {
                        lat: <?php echo $latitude; ?>,
                        lng: <?php echo $longitude; ?>
                    }
                });
            <?php } ?>


            //addMarker Function
            function addMarker(props) {
                var marker = new google.maps.Marker({
                    position: props.coords,
                    map: map,
                    // icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                    icon: 'https://image0.flaticon.com/icons/png/32/49/49212.png'
                });
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxuoisgiSxSZYFex3MIY-yV7rTkp91mEc&callback=initMap&libraries=&v=weekly" async> </script>
</body>

</html>