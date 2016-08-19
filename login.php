<?php
$email=NULL;
$pass=NULL;

if (isset($_POST["email"]) && isset($_POST["pass"])) {
    $email=$_POST['email'];
    $pass=$_POST['pass'];
}else{  
    echo "A field is empty";
}


$success=0;



// $dbServer = 'localhost'; //Define database server host
// $dbUsername = 'root'; //Define database username
// $dbPassword = ''; //Define database password
// $dbName = 'crypten'; //Define database name




$conn=mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
if (!$conn) 
{
	header("Location : index.html");
}

session_start([
    'cookie_lifetime' => 2592000,
]);
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

if ($success==1) {
	header("Location: messages.php");
}

else
{
	header("Location: index.php");
}

?>	