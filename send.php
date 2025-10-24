<?php

session_set_cookie_params(31536000);
session_start();

$reciever=NULL;
$message=NULL;
$password=NULL;

if (isset($_POST["reciever"]) && isset($_POST["message"])) {
    $reciever=$_POST['reciever'];
    $message=$_POST['message'];
    $password=$_POST['password'];
}else{  
    header("Location: messages.php");
}


$success=0;


$dbServer = 'localhost'; //Define database server host
$dbUsername = 'root'; //Define database username
$dbPassword = ''; //Define database password
$dbName = 'crypten'; //Define database name


$conn=mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
if (!$conn) 
{
	header("Location : messages.php");
}

$sender=$_SESSION['email'];
$sendername=$_SESSION['name'];

if($sender==NULL)
{
 header("Location: messages.php");
}


function Encrypt($password, $data)
{
    // Use MD5 to create a simple XOR-based encryption
    $key = md5($password);
    $keyLength = strlen($key);
    $dataLength = strlen($data);
    $encrypted = '';
    
    for ($i = 0; $i < $dataLength; $i++) {
        $encrypted .= chr(ord($data[$i]) ^ ord($key[$i % $keyLength]));
    }
    
    return base64_encode($encrypted);
}


$message= Encrypt($password, $message);

$LoginQuery="INSERT INTO `". $reciever ."` (username, fname, message, senddate, isunread) values ('$sender', '$sendername', '$message', now(), 1) ";

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