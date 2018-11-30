<?php 

$con = mysqli_connect("localhost", "root", "", "social");

if(mysqli_connect_errno()){

    echo "Failed to connect: " . mysqli_connect_errno();

}

$query = mysqli_query($con, "INSERT INTO test VALUES(NULL, 'Optimus Prime')");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    Hello Reece!!!
</body>
</html>