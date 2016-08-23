<?php
$fname=NULL;
$lname=NULL;
$email=NULL;
$pass=NULL;
$confirmpass=NULL;


if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["pass"])) {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pass=$_POST['pass']; 
}else{  
    header("Location: index.php");
}



$success=0;



$dbServer = 'localhost'; //Define database server host
$dbUsername = 'root'; //Define database username
$dbPassword = ''; //Define database password
$dbName = 'crypten'; //Define database name

$conn=mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
if (!$conn) 
{
	echo "Error";
}

session_set_cookie_params(31536000);
session_start();

$SignupQuery="SELECT * FROM users WHERE email='$email'";

$result=mysqli_query($conn, $SignupQuery);


 if(mysqli_num_rows($result)==0)
 {
    $AddUser="INSERT INTO users (fname, lname, email, pass) values ('$fname', '$lname', '$email', '$pass')";

 $NewTableName=$_POST['email'];


    $AddUserTable='CREATE TABLE If Not exists `'.$NewTableName.'`(`username` varchar(50),`fname` varchar(50) ,`message` varchar(2000), `senddate` datetime, `isunread` int(2))';
        // echo "Registration Successful.";




    if( mysqli_query($conn, $AddUser))
{


  $result=mysqli_query($conn, $AddUserTable);


    $_SESSION['name']=$fname;
    $_SESSION['email']=$email;

    if ($result) {
        header("Location: messages.php");
    }
else
{
	// echo "User Already exists please login";
    header("Location: index.php");
}



}

else
{
	// echo "User Already exists please login";
    header("Location: index.php");
}




   
  
    
 }
else
{
	// echo "User Already exists please login";
    header("Location: index.php");
}


?>	