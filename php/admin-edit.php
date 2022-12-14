<?php
session_start();
include "config.php";
include "mysql.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Edit</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

</head>
<body>
<div class="background"></div>
    <div class="container">
        <h2>Admin Edit</h2>
        <small>Email is unique* so doesn't change it.</small>
        <form action="" method="post" id="edit-admin">
        <?php

$admin = $_SESSION['ad_email'];
if($admin == true){

}
else{
    header("location:../admin.html");
}
if(isset($_POST['edit_data'])){
    $email=$_POST['edit_email'];
    $query=$conn->prepare("SELECT * from users WHERE email=?");
    $query->bind_param("s",$email);
    $query->execute();
    $result=$query->get_result();
        if($result->num_rows > 0){
            $query = array('email'=>$email);
            $result=$collection->find($query);
            foreach($result as $row){
                ?>
            <div class="form-item">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"> <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/> </svg>
                </span>
                <input type="text" name="fname" id="fname" placeholder="Enter First name" value="<?php echo $row['fname']?>">
                <span class="error" id="fname_error_message"></span>
            </div>
            <div class="form-item">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16"> <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/> </svg>
                </span>
                <input type="text" name="lname" id="lname" placeholder="Enter Last name" value="<?php echo $row['lname']?>">
                <span class="error" id="lname_error_message"></span>
            </div>
            <div class="form-item">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16"> <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/> </svg>
                </span>
                <input type="text" name="email" id="email" placeholder="Enter Email " readonly value="<?php echo $row['email']?>">
                <span class="error" id="email_error_message"></span>
            </div>
            <div class="form-item">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16"> <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/> </svg>
                </span>
                <input type="password" name="password" id="password" placeholder="Enter Password " value="<?php echo $row['password']?>">
                <span> <i class="fa-solid fa-eye" id="togglePassword" style="cursor: pointer;"></i></span>
                <span class="error" id="password_error_message"></span>
            </div>
            <div class="form-item">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/> </svg>
                </span>
                <input type="text" name="mobile" id="mobile" placeholder="Enter Mobile " value="<?php echo $row['mobile']?>">
                <span class="error" id="mobile_error_message"></span>
            </div>
            <div class="form-item">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-calendar-fill" viewBox="0 0 16 16"> <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z"/> </svg>
                </span>
                <input type="date" name="dob" id="dob" placeholder="Enter DOB" value="<?php echo $row['dob']?>">
                <span class="error" id="dob_error_message"></span>
            </div>
            <?php
            }
        }else{
            echo "<h4>No record found</h4>";
        }
    }
        ?>
        <div class="options">
             
                <input type="button" id="update" value="Update" class="button">
                <input type="reset" value="Reset" class="button">
            
            </div>
            <div class="btn">
                <button><a href="dashboard.php">Back to Home</a></button>
            </div>
    </form>
</div>
<script type="text/javascript" src="../js/admin-update.js"></script>
</body>
</html>