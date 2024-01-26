<?php
include '../connection.php';

if (isset($_POST['submit'])) {
    $adminID = $_POST['adminID'];
    $password = $_POST['password'];
    $adminType = $_POST['adminType'];
    $district = $_POST['district'];
    $name = $_POST['name'];
    $address = $_POST['address'];

    $sql = "INSERT INTO `admin` (`adminID`, `password`, `adminType`, `district`, `name`, `address`) VALUES ('$adminID', '$password', '$adminType', '$district', '$name', '$address');";
    $addMun = mysqli_query($connection, $sql);

    $showAlert = "Municipality added successfully";

    echo "<script> alert('$showAlert'); </script>";
    
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Add Municipalty | GiveMeWay</title>
</head>

<body>
    <?php include 'adminNav.php'; ?>

    <h3 class="bg-secondary bg-gradient text-center text-light py-2 my-2">Add Municipalty</h3>


    <div class="container container-fluid my-5">
        <form class="" method="POST" action="addMun.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">AdminID</label>
                <input type="email" name="adminID" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Municipality's Email address" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Admin-type</label>
                <select name="adminType" name="adminType" id="" class="form-control" required>
                    <option value="" class="form-control" selected disabled>--Select One--</option>
                    <option value="Municipality">Municipality</option>
                </select>
            </div>
            <div class="mb-3">
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
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Name of Municipality</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Name of Municipality" required>
            </div>
            <div class="mb-3">
                <label for="form">Address</label>
                <div class="form-floating">
                    <textarea class="form-control" name="address" placeholder="" id="floatingTextarea" required></textarea>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>