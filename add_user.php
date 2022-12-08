<!-- Here we will add our header file. -->
<?php require ('./inc/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<br><br>
<div class="container">
    <h2>Add new user</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control"  placeholder="Enter Name" name="user_name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="user_email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" name="user_password">
        </div>

        <div class="form-group">
            <label>Image:</label>
            <input type="file" class="form-control"  placeholder="Enter Name" name="image">
        </div>

        <div class="form-group">
            <label>Details:</label>
          <textarea class="form-control" name="user_details"></textarea>
        </div>

        <input type="submit" name="insert-btn" class="btn btn-primary">
    </form>

    <?php
     $conn = mysqli_connect('localhost','root','','final');

    if (isset($_POST['insert-btn'])){



      $user_name = $_POST['user_name'];
      $user_email = $_POST['user_email'];
      $user_password = $_POST['user_password'];
      $image = $_FILES['image'] ['name'];
      $image_tmp = $_FILES['image'] ['tmp_name'];
      $user_details = $_POST['user_details'];

        $insert = "INSERT INTO user(user_name,user_email,user_password,user_image,user_details) VALUES ('$user_name','$user_email','$user_password','$image','$user_details')";

        $run_insert = mysqli_query($conn,$insert);
        if ($run_insert === true){
            echo "Data Has Been Inserted";
            move_uploaded_file($image_tmp, "upload/$image");
        } else {
            "Failed. Please try again";
        }

    }




    ?>
</div>

</body>
</html>
<!-- Let's add our footer file. -->
<?php require ('./inc/footer.php'); ?>

