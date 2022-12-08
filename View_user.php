<!-- Here we will add our header file. -->
<?php require ('./inc/header.php'); ?>
<?php
session_start();
$conn = mysqli_connect('localhost','root','','final');

if (!isset($_SESSION['email'])){
    echo "<script>window.open('view_user.php','_self');</script>";
}
?>
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
    <h2>View User</h2>
    <?php
    $conn = mysqli_connect('localhost','root','','final');
    if (isset($_GET['del'])){
        $del_id = $_GET['del'];
        $delete = "DELETE FROM user WHERE user_id='$del_id'";
        $run_delete = mysqli_query($conn,$delete);
        if ($run_delete === true){
            echo "Record Has Been Deleted";
        } else {
            echo "Failed to Delete, Please try again";
        }
    }
    ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Image</th>
            <th>Details</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $conn = mysqli_connect('localhost','root','','final');
        $select = "SELECT * FROM user";
        $run = mysqli_query($conn,$select);
        while($row_user = mysqli_fetch_array($run)){
        $user_id = $row_user['user_id'];
        $user_name = $row_user['user_name'];
        $user_email = $row_user['user_email'];
        $user_password = $row_user['user_password'];
        $user_image = $row_user['user_image'];
        $user_details = $row_user['user_details'];
        ?>

        <tr>
            <td><?php echo $user_id; ?></td>
            <td><?php echo $user_name; ?></td>
            <td><?php echo $user_email; ?></td>
            <td><?php echo $user_password; ?></td>
            <td><img src="upload/<?php echo $user_image;?>" height="70px"></td>
            <td><?php echo $user_details; ?></td>
            <td><a class="btn btn-danger" href="view_user.php?del=<?php echo $user_id;?>">Delete</a> </td>
            <td><a class="btn btn-success" href="edit_user.php?edit=<?php echo $user_id;?>">Edit</a> </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
<!-- Let's add our footer file. -->
<?php require ('./inc/footer.php'); ?>

