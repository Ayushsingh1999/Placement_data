<?php
$insert = false;
if(isset($_POST['name'])){ 
    // set connection variables
$server ="localhost"; 
$username = "root";
$password = "";

// Create a database connected
$con = mysqli_connect($server, $username , $password);

// check for connection success
if(!$con)
{
die("connection to this database failed due to".mysqli_connect_error());
} 
//  echo "Success connecting to the db";

// collect post variables

$name = $_POST['name'];
$Branch = $_POST['Branch'];
$year = $_POST['year'];
$percentage = $_POST['percentage'];
$email = $_POST['email'];
$mob = $_POST['mob'];
$gender = $_POST['gender'];
$des = $_POST['des'];
$sql = "INSERT INTO `placement_uiet`.`placement`  ( `Name`, `Branch`, `Passing Year`, `Percentage`, `email`, `mobile`, `Gender`, `other`, `dd`) VALUES ( '$name', '$Branch', '$year', '$percentage', '$email', '$mob', '$gender', '$des', current_timestamp());"; 
// echo $sql;

// Execute the query

if ($con-> query($sql)==true ) {

    // Flag for successful insertion
   $insert = true; 
}
else{
    echo "ERROR: $sql <br> $con->error";
}


// close the database connection
$con->close(); 
 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placement Cell UIET</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="bg.jpeg" alt="UIET CSJMU" class="bg">
    <div class="container">
        <h1>Welcome to UIET CSJM Placement Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the drives</p>
        <?php
        if ($insert==true) {
            echo  "<p class='submitmsg'>thanks for submitting the data ,we will contact u soon!</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="Branch" id="branch"  placeholder="Enter your Branch">
            <input type="text" name="year" id="year" placeholder="Enter your passing year">
            <input type="text" name="percentage" id="percentage" placeholder="Enter your last percentage">
            <input type="email" name="email" id="email" placeholder="enter the email">
            <input type="text" name="mob" id="mob" placeholder="Enter your mobile number"> 
            <input type="text" name="gender" id="gender" placeholder="Gender">
            <textarea name="des" id="des" cols="30" rows="10" placeholder="Enter about yourself"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
            <!-- INSERT INTO `placement` (`s.no`, `Name`, `Branch`, `Passing Year`, `Percentage`, `email`, `mobile`, `Gender`, `other`, `dd`) VALUES ('1', 'ayush singh', 'ece', '2023', '73.1', 'ayushsingh842018@gmail.com', '8174883345', 'Male', 'hello there my name is ayushsingh , i am looking for an job/internship', current_timestamp());  -->

        
 

        </form>
    </div>
    <script src="index.js"></script> 
</body>
</html>
