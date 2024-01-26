<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>GiveMeWay</title>
    <style>
        .carousel .carousel-item {
            height: 80vh;
        }
    </style>
</head>

<body>
    <?php include 'HomeEle/navbar.php'; ?>

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
                
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-center align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?php echo $total_REQ; ?></h3>
                            <p class="fs-5">Total Requests</p>
                        </div>
                    </div>
                
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

    <?php include 'HomeEle/carousel.php'; ?>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>