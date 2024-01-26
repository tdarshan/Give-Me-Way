<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="img" id="">
        <input type="submit" value="Submit" name="upload">
    </form>
    <?php 
        if(isset($_POST['upload'])){

            if(move_uploaded_file($_FILES['img']['tmp_name'], "demoUploads/".$_FILES['img']['name'])){
                print_r($_FILES['img']);
            }
        }
    ?>
</body>
</html>