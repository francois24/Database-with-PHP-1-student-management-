<?php

include_once ('connection/connection.php');
// connection();
$con = connection();

if (isset($_POST['submit'])){
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];

$id= $_GET['ID'];

 $sql = "UPDATE`test_table` SET `firstname` = '$firstname', `lastname` = '$lastname', `gender`='$gender' WHERE `ID`='$id'";

 $con->query($sql) or die ($con->error);

// $row = $students->fetch_assoc();
echo header ("Location:details.php?ID=".$id);

}

$id= $_GET['ID'];

$sql = "SELECT * FROM test_table where ID = '$id'";
$students = $con->query($sql) or die ($con->error);

$row = $students->fetch_assoc();
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
        <input type='text' name='firstname' id='firstname' value='<?php echo $row['firstname'];?>'>

        <label for="">Lastname</label>
        <input type='text' name='lastname' id='lastname' value='<?php echo $row['lastname'];?>'>

        <label for="">Gender</label>
        <select name="gender" id="gender"  value='<?php echo $row['gender'];?>'>

            <option value='Male'<?php echo ($row['gender']=='male')?'selected':'';?> >Male</option>

            <option value='Female'<?php echo ($row['gender']=='female')?'selected':'';?>  >Female</option>

        </select>
        <input type="submit" name='submit' value='submit'>
        <button><a href="delete.php?ID=<?php echo $row['ID'];?>">Delete</a></button>
   </form>
    <br/>
  

</body>
</html>