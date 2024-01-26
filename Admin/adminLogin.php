<?php
include '../connection.php';

$login = false;
$showErr = false;

if (isset($_POST['submit'])) {
    $adminID = $_POST['adminID'];
    $password = $_POST['password'];

    // echo $adminID, $password;

    $sql = "SELECT * FROM admin WHERE `adminID`='$adminID' AND `password`='$password'";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);


    if ($num > 0) {
        $login = true;
        $details = mysqli_fetch_assoc($result);

        $adminID = $details['adminID'];
        $password = $details['password'];
        $adminType = $details['adminType'];
        $district = $details['district'];
        $city = $details['city'];
        $name = $details['name'];
        $contact = $details['contact'];
        $address = $details['address'];

        // echo $adminID . " " . $password . " " . $adminType . " " . $district . " " . $name . " " . $address;

        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['adminID'] = $adminID;
        $_SESSION['adminType'] = $adminType;
        $_SESSION['name'] = $name;
        $_SESSION['contact'] = $contact;
        $_SESSION['district'] = $district;
        $_SESSION['city'] = $city;
        $_SESSION['address'] = $address;
        header('Location: adminHome.php');
    } 
    else {
        $showErr = "invalid input";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <title>Admin | GiveMeWay</title>
    <style>
        body {
            background-image: url('https://images.indianexpress.com/2021/10/stray.jpeg');
            /* background-position: center; */
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

    <?php
    if ($showErr) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Error ! </strong> ' . $showErr . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    ?>
    <div class="container container-flex m-5 p-5 ">
        <form class="m-5 p-5" method="POST" action="adminLogin.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label bg-info text-dark rounded-3 px-3 py-2">Admin-id</label>
                <input type="email" name="adminID" class="form-control bg-light text-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your AdminID">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-dark bg-info rounded-3 px-3 py-2">Password</label>
                <input type="password" name="password" class="form-control bg-light text-dark" id="exampleInputPassword1" placeholder="Enter your Password">
            </div>
            <button name="submit" type="submit" class="btn btn-primary px-4">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>