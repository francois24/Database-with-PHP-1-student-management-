<?php

if(!isset($_SESSION)){
    session_start();
}

if (isset($_SESSION['access']) && $_SESSION['access']=='admin1'){
    echo 'welcome '.$_SESSION['userlogin']."</br> </br>";
    // session_start();
}else{
    // echo 'Welcome guests';
    echo header("Location:index.php");
}

include_once ('connection/connection.php');
// connection();
$con = connection();

$id= $_GET['ID'];

$sql = "SELECT * FROM test_table where ID = '$id'";
$students = $con->query($sql) or die ($con->error);

$row = $students->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body >

         <a href="edit.php?ID=<?php echo $row['ID'];?>">Edit</a>
         <a href="index.php">Home</a>
   
    
    <h1>Personal Information</h1>
    <table  class="table">
        <thead class="table-dark">
            <!-- <th>Information</th> -->
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Gender</th>
        </thead>

        <tbody>
            <?php do { ?>
            <tr>
                <!-- <td><a href="details.php?ID=<?php echo $row['ID'];?>">view</a></td> -->

                <td><?php echo $row['firstname'];?></td>
                <td><?php echo $row['lastname'];?></td>
                <td><?php echo $row['gender'];?></td>
            </tr>
            <?php }while($row = $students->fetch_assoc()); ?>
        </tbody>
    </table>
    
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>
</html>