<?php

include "connection.php";
$showAlert = false;
$showErr = false;

if (isset($_POST['submit'])) {
    mysqli_select_db($connection, 'cattlehelp');
    $Uname = $_POST['Uname'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $Email = $_POST['Email'];
    $Contact = $_POST['Contact'];
    $Password = $_POST['Password'];

    // check for duplication
    $checkDupl = "SELECT * FROM register WHERE Email='$Email' OR Contact='$Contact'";
    $checkResult = mysqli_query($connection, $checkDupl);
    $numExitsRow = mysqli_num_rows($checkResult);

    if ($numExitsRow > 0) {
        $showErr = "Email Or Contact number Already exists";
    } else {
        //insert in database query
        $sql = "insert into register(uname, state, district, email, contact, password) values('$Uname', '$state', '$district', '$Email', '$Contact', '$Password')";

        $insert_rec = mysqli_query($connection, $sql);
        if ($insert_rec) {
            $showAlert = true;
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="bootstrap.min.css">

    <title>Signup</title>
</head>

<body>
    <?php include 'HomeEle/navbar.php'; ?>

    <?php
    if ($showErr) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Sorry! </strong> ' . $showErr . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button> </div>';
    }
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Success</strong> Your account has been created, Login to continue
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
    }
    ?>

    <div class="container container-fluid my-5 p-2">
        <h1 class="text-center"> Register to our website </h1>

        <form method="POST" action="register.php">
            <div class="mb-3">
                <label for="Username" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Uname" placeholder="Enter Username" required>
            </div>

            <div class="mb-3">
                <div class="f-group">
                    <label class="form-label" for="state"> State </label>
                    <select class="form-select" name="state" id="slct1" onchange="populate(this.id,'slct2')">
                        <option value="">--Choose state--</option>
                        <option value="Gujarat">Gujarat</option>
                    </select>
                </div>

                <div class="f-group">
                    <label class="form-label" for="dist">dist</label>
                    <select class="form-select" name="district" id="slct2"></select>
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
            </div>

            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputPassword1" name="Email" placeholder="Enter a valid Email address" required>
            </div>

            <div class="mb-3">
                <label for="Contact-Number" class="form-label">Contact-Number</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="Contact" placeholder="Enter 10-Digit mobile number" required>
            </div>

            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="Password" placeholder="Enter Password" required>
            </div>


            <input type="submit" class="btn btn-primary" value="Register" name="submit">
        </form>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>

</html>