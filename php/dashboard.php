<?php
session_start();
// echo "Welcome." .$_SESSION['ad_email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>

</head>
<body>
<div class="background"></div>
    <h3>ADMIN PANEL</h3>
   <a href="admin-logout.php" class="ancher"><input type="submit" value="Back to Home"></a>
</div>
<?php

include "config.php";
include "mysql.php";

$admin = $_SESSION['ad_email'];
if($admin == true){

}
else{
    header("location:../admin.html");
}
$query="SELECT * FROM users";
$query_run=mysqli_query($conn,$query);
if(mysqli_num_rows($query_run) > 0){
$i=0;
?>
<div class='container table-responsive'>
    <table class="table table-bordered table-condensed">
        <thead>
            <tr class="bg-info">
                <th>S.No</th>
                <th>FNAME</th>
                <th>LNAME</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
                <th>MOBILE</th>
                <th>DOB</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row = mysqli_fetch_assoc($query_run))
                {
                ?>
            <tr>
                <td><?php echo $i=$i+1 ?></td>
                <td><?php echo $row['fname'] ?></td>
                <td><?php echo $row['lname'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['password'] ?></td>
                <td><?php echo $row['mobile'] ?></td>
                <td><?php echo $row['dob'] ?></td>
                <form action="admin-edit.php" method="post">
                <td>
                    <input type="hidden" name="edit_email" value="<?php echo $row['email']?>">
                    <button type="submit" name="edit_data">Edit</button>
                </td>
                </form>
                <form action="admin-delete.php" method="post">
                    <td>
                        <input type="hidden" name="del_email" value="<?php echo $row['email']?>">
                        <button type="submit" name="del_btn">Delete</button>
                    </td>   
                </form>
            </tr>
            <?php
            }
            ?> 
        </tbody>
    </table>
    <?php
}
else{
    echo "<h1 class='text-info text-center'>No Records Found :)</h1>";
}
?>
</div>
</body>
</html>