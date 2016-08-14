<?php

session_start();

$reciever=NULL;
$message=NULL;
$password=NULL;

if (isset($_POST["reciever"]) && isset($_POST["message"])) {
    $reciever=$_POST['reciever'];
    $message=$_POST['message'];
    $password=$_POST['password'];
}else{  
    echo "A field is empty";
}


$success=0;



$dbServer = 'localhost'; //Define database server host
$dbUsername = 'root'; //Define database username
$dbPassword = ''; //Define database password
$dbName = 'crypten'; //Define database name

// $dbServer = 'mysql.hostinger.in'; //Define database server host
// $dbUsername = 'u554972518_admin'; //Define database username
// $dbPassword = 'bhaijaan'; //Define database password
// $dbName = 'u554972518_youth'; //Define database name

$conn=mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
if (!$conn) 
{
	header("Location : message.php");
}

$sender=$_SESSION['email'];
$sendername=$_SESSION['name'];

$LoginQuery="INSERT INTO `". $reciever ."` (username, fname, message) values ('$sender', '$sendername', '$message') ";

$result=mysqli_query($conn, $LoginQuery);

header("Location: messages.php");

// while ($r=mysqli_fetch_assoc($result)) 
// {
// 	$data = $r['pass'];
//         if($data==$pass)
//         {
//         $success=1;
//         $_SESSION['name']=$r['fname'];
//         $_SESSION['email']=$r['email'];
//         }
// }

// echo "$success";

// if ($success==1) {
// 	header("Location: messages.php");
// }

// else
// {
// 	header("Location: index.html");
// }

?>	