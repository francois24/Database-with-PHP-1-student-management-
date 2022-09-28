<?php

include_once ('connection/connection.php');
// connection();
$con = connection();

if (isset($_POST['submit'])){
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];

 $sql = "INSERT INTO `test_table` ( `firstname`, `lastname`, `gender`) VALUES ( '$firstname', '$lastname','$gender')";
$students = $con->query($sql) or die ($con->error);

// $row = $students->fetch_assoc();
echo header ("Location:index.php");

}

// $sql = "SELECT * FROM sample";
// $students = $con->query($sql) or die ($con->error);

// $row = $students->fetch_assoc();


// $sql = "SELECT * FROM test_table";
// $students = $con->query($sql) or die ($con->error);

// $row = $students->fetch_assoc();
// $con = connection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info</title>
    <style>
        <?php include 'css/index-style.css'?>
    </style>
</head>
<body>
   <form action="" method='POST'>
        <label for="">Firstname</label>
        <input type='text' name='firstname' id='firstname'>
        <label for="">Lastname</label>
        <input type='text' name='lastname' id='lastname'>
        <label for="">Gender</label>
        <select name="gender" id="gender">
            <option value='Male'>Male</option>
            <option value='Female'>Female</option>
        </select>
        <input type="submit" name='submit' value='submit'>
   </form>
    <br/>
 
</body>
</html>