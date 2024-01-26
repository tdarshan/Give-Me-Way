<?php
include '../connection.php';

session_start();
$inserted = false;
$isInserted = false;

if (isset($_POST['submit'])) {

    $email = $_SESSION['u_email'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $aType = $_POST['aType'];
    $detail = $_POST['detail'];
    $address = $_POST['address'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    // $img = "";

    if (move_uploaded_file($_FILES['image']['tmp_name'], "injured/" . $_FILES['image']['name'])) {

        $iname = $_FILES['image']['name'];
        $sql = "INSERT INTO `injured`(`email`, `district`, `city`, `aType`, `details`, `address`, `latitude`, `longitude`, `image`) 
                VALUES ('$email','$district','$city','$aType','$detail','$address','$latitude','$longitude','$iname');";

        $result = mysqli_query($connection, $sql);

        if ($result) {
            $inserted = "Complaint registered Sucessfully! Error resolved soon.";
            $isInserted = true;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint | Injured Animals</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
</head>

<body>
    <?php include 'welcome_nav.php'; ?>

    <?php
    if ($isInserted == true) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> 
                <strong>Success</strong>' . $inserted . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
                </div>';
    }
    ?>

    <div class="container container-fluid m-4 p-4 bg-light bg-gradient">
        <form method="POST" action="injured.php" id="form" enctype="multipart/form-data">
            <p id="coordinates"></p>
            <!-- <div class="mb-3">
                <div class="f-group">
                    <label class="form-label" for="state"> State </label>
                    <select class="form-select" name="state" id="slct1" onchange="populate(this.id,'slct2')" required>
                        <option value="">--Choose state--</option>
                        <option value="Gujarat">Gujarat</option>
                    </select>
                </div>

                <div class="f-group">
                    <label class="form-label" for="dist">dist</label>
                    <select class="form-select" name="district" id="slct2" required></select>
                </div>
                <script>
                    function populate(s1, s2) {
                        var s1 = document.getElementById('slct1');
                        var s2 = document.getElementById('slct2');

                        s2.innerHTML = "";
                        if (s1.value == "Gujarat") {
                            var optionArr = ['Ahmedabad|Ahmedabad', 'Amreli|Amreli', 'Anand|Anand', 'Aravalli|Aravalli', 'Banaskantha|Banaskantha', 'Bharuch|Bharuch', 'Bhavnagar|Bhavnagar', 'Botad|Botad', 'Chhota Udepur|Chhota Udepur', 'Dahod|Dahod', 'Dang|Dang', 'Devbhoomi Dwarka|Devbhoomi Dwarka', 'Gandhinagar|Gandhinagar', 'Gir Somnath|Gir Somnath', 'Jamnagar|Jamnagar', 'Junagadh|Junagadh', 'Kutch|Kutch', 'Kheda|Kheda', 'Mahisagar|Mahisagar', 'Mehsana|Mehsana', 'Morbi|Morbi', 'Narmada|Narmada', 'Navsari|Navsari', 'Panchmahal|Panchmahal', 'Patan|Patan', 'Porbandar|Porbandar', 'Rajkot|Rajkot', 'Sabarkantha|Sabarkantha', 'Surat|Surat', 'Surendranagar|Surendranagar', 'Tapi|Tapi', 'Vadodara|Vadodara', 'Valsad|Valsad'];
                        }
                        for (var option in optionArr) {
                            var pair = optionArr[option].split("|");
                            var newOption = document.createElement("option");

                            newOption.value = pair[0];
                            newOption.innerHTML = pair[1];
                            s2.options.add(newOption);
                        }
                    }
                </script>
            </div> -->

            <div class="mb-3">
                <label for="" class="form-label">Choose District</label>
                <select name="district" id="dist" onchange="choose()" class="form-control">
                    <option value="" disabled selected>--select one--</option>
                    <option value="Bhavnagar">Bhavnagar</option>
                    <option value="Ahmedabad">Ahmedabad</option>
                    <option value="Rajkot">Rajkot</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Choose City</label>
                <select name="city" id="city" class="form-control"></select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Animal type</label>
                <select class="form-select" name="aType" id="" required>
                    <option value="" disabled selected>--Choose animal type--</option>
                    <option value="domestic">Domestic</option>
                    <option value="wild">Wild</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Details</label>
                <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Specify Location</label>
                <input type="text" class="form-control" name="address" id="exampleFormControlInput1" placeholder="**Hint_About_Location**" required>
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control" name="latitude" id="latitude" aria-describedby="emailHelp" required readonly>
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control" name="longitude" id="longitude" aria-describedby="emailHelp" required readonly>
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" name="image" type="file" id="formFile" accept=".jpg, .png, .jpeg" required>
            </div>

            <button type="submit" class="btn btn-primary px-4 py-2" name="submit">Submit</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script type="text/javascript">
        /*  Home :   21.7606938, 72.1133746    */
        let form = document.getElementById('form');
        form.addEventListener('click', function() {
            var latitude = document.getElementById("latitude");
            var longitude = document.getElementById("longitude");
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                cords.innerHTML = "Geolocation is not supported by this browser.";
            }
        });

        function showPosition(position) {
            latitude.value = position.coords.latitude;
            longitude.value = position.coords.longitude;
        }
    </script>
    <script>
        function choose() {
            let dist = document.getElementById("dist");
            let city = document.getElementById("city");

            if (dist.value == "Bhavnagar") {
                city.innerHTML = `<option value="" disabled>--select one--</option>
        <option value="Bhavnagar">Bhavnagar</option>
        <option value="Sihor">Sihor</option>
        <option value="Vallbhipur">Vallbhipur</option>
        <option value="Talaja">Talaja</option>`;
            } else if (dist.value == "Ahmedabad") {
                city.innerHTML = `<option value="" disabled>--select one--</option>
        <option value="Ahmedabad">Ahmedabad</option>
        <option value="Dholera">Dholera</option>
        <option value="Dholka">Dholka</option>
        <option value="Viramgam">Viramgam</option>`;
            } else if (dist.value == "Rajkot") {
                city.innerHTML = `<option value="" disabled>--select one--</option>
        <option value="Rajkot">Rajkot</option>
        <option value="Gondal">Gondal</option>
        <option value="Upleta">Upleta</option>
        <option value="Jetpur">Jetpur</option>`;
            }
        }
    </script>

</body>

</html>