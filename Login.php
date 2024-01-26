<?php

$login = false;
$showErr = false;

include "../Main/connection.php";

if (isset($_POST['submit'])) {
    mysqli_select_db($connection, 'cattlehelp');

    $Email = $_POST['email'];
    $Password = $_POST['password'];

    // echo $Email, $Password;

    $sql = "SELECT * FROM register WHERE `email`='$Email' AND `password`='$Password'";

    $result = mysqli_query($connection, $sql);

    $num = mysqli_num_rows($result);
    // echo $num;
    // print_r($result);
    if ($num > 0) {
        $details = mysqli_fetch_assoc($result);
        $u_name = $details['uname'];
        $u_country = $details['country'];
        $u_state = $details['state'];
        $u_district = $details['district'];
        $u_email = $details['email'];
        $u_contact = $details['contact'];
        $u_password = $details['password'];

        // echo $u_name, $u_country, $u_state, $u_district, $u_email, $u_contact, $u_password;
        
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['u_name'] = $u_name;
        $_SESSION['u_country'] = $u_country;
        $_SESSION['u_state'] = $u_state;
        $_SESSION['u_district'] = $u_district;
        $_SESSION['u_email'] = $u_email;
        $_SESSION['u_contact'] = $u_contact;
        $_SESSION['u_password'] = $u_password;
        header('location: Welcome/home.php');
    } else {
        $showErr = "invalid Credentials";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.min.css">

    <title>GiveMeWay</title>
</head>

<body>
    <?php include 'HomeEle/navbar.php'; ?>

    <?php
    if ($login) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> You are logged in
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    if ($showErr) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Error ! </strong> ' . $showErr . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    ?>


    <div class="container container-fluid m-5 p-5">
        <form method="POST" action="../Main/Login.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>