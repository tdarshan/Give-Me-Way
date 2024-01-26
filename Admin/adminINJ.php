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
    </style>
</head>

<body>

    <?php include 'adminNav.php'; ?>

    <h3 class="text-center">User Queries</h3>

    <div id="map" class="container my-4"></div>

    <table border="1" align="center" style="border-collapse: collapse;" class="table">
        <tr>
            <th>User</th>
            <th>District</th>
            <th>Animal Type</th>
            <th>Details</th>
            <th>Address</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Time</th>
            <th>location</th>
        </tr>

        <?php
        include '../connection.php';
        $sql = "SELECT * FROM injured";
        $retval = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_array($retval)) {
            $Email = $row['email'];
            $district = $row['district'];
            $aType = $row['aType'];
            $details = $row['details'];
            $address = $row['address'];
            $latitude = $row['latitude'];
            $longitude = $row['longitude'];
            $time = $row['time'];
        ?>
            <tr>
                <td><?php echo $Email; ?></td>
                <td><?php echo $district; ?></td>
                <td><?php echo $aType; ?></td>
                <td><?php echo $details; ?></td>
                <td><?php echo $address; ?></td>
                <td><?php echo $latitude; ?></td>
                <td><?php echo $longitude; ?></td>
                <td><?php echo $time; ?></td>
                <td> <a href="https://www.google.com/maps/@<?php echo $latitude; ?>,<?php echo $longitude; ?>,20z" class="btn btn-primary" target="_blank">
                        Map </a>
                </td>
            </tr>
        <?php } ?>
    </table>


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
            $sql = 'SELECT latitude, longitude FROM injured;';
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