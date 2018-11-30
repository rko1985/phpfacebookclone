<?php 

$con = mysqli_connect("localhost", "root", "", "social");

if(mysqli_connect_errno()){

    echo "Failed to connect: " . mysqli_connect_errno();

}

// Declaring variables to prevent errors
$fname = ""; //First name
$lname = ""; //First name
$em = ""; //email
$em1 = ""; //email2
$password = ""; //password
$password2 = ""; //password 2
$date = ""; //Sign up date
$error_array = ""; //Holds error messages

if(isset($_POST['register_button'])){

    //Registration form values

    //First name
    $fname = strip_tags($_POST['reg_fname']); //Remove html tags
    $fname = str_replace(' ','',$fname); //remove spaces
    $fname = ucfirst(strtolower($fname)); //Uppercase first letter

    //Last name
    $lname = strip_tags($_POST['reg_lname']); //Remove html tags
    $lname = str_replace(' ','',$lname); //remove spaces
    $lname = ucfirst(strtolower($lname)); //Uppercase first letter

    //email
    $em = strip_tags($_POST['reg_email']); //Remove html tags
    $em = str_replace(' ','',$em); //remove spaces
    $em = ucfirst(strtolower($em)); //Uppercase first letter

    //email 2
    $em2 = strip_tags($_POST['reg_email2']); //Remove html tags
    $em2 = str_replace(' ','',$em2); //remove spaces
    $em2 = ucfirst(strtolower($em2)); //Uppercase first letter

    //password
    $password = strip_tags($_POST['reg_password']); //Remove html tags
    $password2 = strip_tags($_POST['reg_password2']); //Remove html tags

    $date = date("Y-m-d"); //Current date

    if($em == $em2){
        //Check if email is in valid format
        if(filter_var($em, FILTER_VALIDATE_EMAIL)){

            $em = filter_var($em, FILTER_VALIDATE_EMAIL);

            //Check if email already exists
            $e_check = mysqli_query($con, "SELECT email FROM users WHERE email = '$em'");

            //Count number of rows returned
            $num_rows = mysqli_num_rows($e_check);

            if($num_rows > 0){
                echo "Email already in use";
            }

        } else {

            echo "Invalid format";

        }

    } else {
        echo "Emails don't match";
    }


} //END isset

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome to Swirlfeed!</title>
</head>
<body>
    
    <form action="register.php" method="POST">
        <input type="text" name="reg_fname" placeholder="First Name" required>
        <br>
        <input type="text" name="reg_lname" placeholder="Last Name" required>
        <br>
        <input type="email" name="reg_email" placeholder="Email" required>
        <br>
        <input type="email" name="reg_email2" placeholder="Confirm Email" required>
        <br>
        <input type="password" name="reg_password" placeholder="Password" required>
        <br>
        <input type="password" name="reg_password2" placeholder="Confirm Password" required>
        <br>
        <input type="submit" name="register_button" value="Register">
    </form>

</body>
</html>