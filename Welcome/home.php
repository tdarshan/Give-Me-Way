<?php
include '../connection.php';
session_start();
// print_r($_SESSION);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../bootstrap.min.css">

    <title>Home</title>
</head>

<body>

    <?php include 'welcome_nav.php'; ?>

    <div class="alert alert-info" role="alert">
        <?php echo "Welcome...  " . $_SESSION['u_name']; ?>
    </div>
    <?php
    $sqlNum = "SELECT * FROM `injured`;";
    $resultNum = mysqli_query($connection, $sqlNum);
    $rowNum = mysqli_num_rows($resultNum);

    ?>

    <div class="container-fluid px-4">
        <?php
        include 'connection.php';

        $sql_COR = "SELECT * FROM cattleonroad";
        $result_COR = mysqli_query($connection, $sql_COR);
        $row_COR = mysqli_num_rows($result_COR);

        $sql_INJ = "SELECT * FROM injured";
        $result_INJ = mysqli_query($connection, $sql_INJ);
        $row_INJ = mysqli_num_rows($result_INJ);

        $sql_Lost = "SELECT * FROM lostanimal";
        $result_Lost = mysqli_query($connection, $sql_Lost);
        $row_Lost = mysqli_num_rows($result_Lost);

        $total_REQ = $row_COR + $row_INJ + $row_Lost;
        ?>
        <div class="row g-3 my-2">

            <div class="col-md-3">
                <center>
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-center align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?php echo $total_REQ; ?></h3>
                            <p class="fs-5">Total Requests</p>
                        </div>
                    </div>
                </center>
            </div>

            <hr>


            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"><?php echo $row_Lost; ?></h3>
                        <p class="fs-5">Lost Animals</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>

                        <h3 class="fs-2"><?php echo $row_COR; ?></h3>
                        <p class="fs-5"> Cattles on Road </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"><?php echo $row_INJ; ?></h3>
                        <p class="fs-5">Injured Animals Requests</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <?php include '../HomeEle/carousel.php'; ?>

    <div class="container">
        <form action="home.php" method="POST">
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
                <div class="f-group mt-2">
                    <button class="btn btn-outline-danger" type="submit" name="find">Find</button>
                </div>
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
                <input type="submit" value="Find" name="find" class="btn btn-outline-dark">
            </div>

        </form>
        <table class="table table-hover">
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Contact</th>
            </tr>

            <?php
            if (isset($_POST['find'])) {
                $dist = $_POST['district'];
                $city = $_POST['city'];

                $sql = "SELECT * FROM `admin` WHERE adminType = 'NGO' AND district = '$dist' AND city = '$city';";
                $result = mysqli_query($connection, $sql);

                while ($fetch = mysqli_fetch_array($result)) {
                    $name = $fetch['name'];
                    $address = $fetch['address'];
                    $contact = $fetch['contact'];
            ?>
                    <tr>
                        <td> <?php echo $name; ?> </td>
                        <td> <?php echo $address; ?> </td>
                        <td> <?php echo $contact; ?> </td>
                    </tr>
            <?php }
            } ?>

        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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