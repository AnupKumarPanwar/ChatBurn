<?php
$email=NULL;
$pass=NULL;

if (isset($_POST["email"]) && isset($_POST["pass"])) {
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
	header("Location : index.html");
}

session_set_cookie_params(31536000);
session_start();

$_SESSION['name']=NULL;
$_SESSION['email']=NULL;
$LoginQuery="SELECT * FROM users WHERE email='$email'";

$result=mysqli_query($conn, $LoginQuery);

while ($r=mysqli_fetch_assoc($result)) 
{
	$data = $r['pass'];
        if($data==$pass)
        {
        $success=1;
        $_SESSION['name']=$r['fname'];
        $_SESSION['email']=$r['email'];
        }
}

// echo "$success";

 $AddUserTable='CREATE TABLE `'.$NewTableName.'`(`username` varchar(50),`fname` varchar(50) ,`message` varchar(2000), `senddate` datetime, `isunread` int(2))';
        // echo "Registration Successful.";
    $result=mysqli_query($conn, $AddUserTable);


if ($success==1) {
	header("Location: messages.php");
}

else
{
	header("Location: index.php");
}

?>	