<?php
include '../connection.php';

session_start();
$inserted = false;
$isInserted = false;

if (isset($_POST['submit'])) {

    $email = $_SESSION['u_email'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $pname = $_POST['pname'];
    $pid = $_POST['pid'];
    $laddress = $_POST['laddress'];
    $uaddress = $_POST['uaddress'];
    $detail = $_POST['detail'];
    $address = $_POST['address'];
    $pimg = $_POST['pimg'];

    // $img = "";

    if (move_uploaded_file($_FILES['pimg']['tmp_name'], "lost/" . $_FILES['pimg']['name'])) {

        $iname = $_FILES['pimg']['name'];
        $sql = "INSERT INTO `lostanimal`(`email`, `district`, `city`, `pet_id`, `pet_name`, `lost_address`, `user_address`, `pet_image`) VALUES ('$email', '$district', '$city', '$pid', '$pname', '$laddress', '$uaddress', '$iname')";

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
                <strong>Success </strong>' . $inserted . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
                </div>';
    }
    ?>

    <div class="container container-fluid m-4 p-4 bg-light bg-gradient">
        <form method="POST" action="lostAnimal.php" id="form" enctype="multipart/form-data">
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
                <label for="" class="form-label">Pet Name:</label>
                <input type="text" name="pname" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Pet id:</label>
                <input type="text" name="pid" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Address:</label>
                <input type="text" class="form-control" name="laddress" id="exampleFormControlInput1" placeholder="lost address" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Address:</label>
                <input type="text" class="form-control" name="uaddress" id="exampleFormControlInput1" placeholder="User address" required>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Pet Image</label>
                <input class="form-control" name="pimg" type="file" id="formFile" accept=".jpg, .png, .jpeg" required>
            </div>

            <button type="submit" class="btn btn-primary px-4 py-2" name="submit">Submit</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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