<?php

// http://stackoverflow.com/questions/18382740/cors-not-working-php

if (isset($_SERVER['HTTP_ORIGIN']))
	{
	header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Max-Age: 86400'); // cache for 1 day
	}

// Access-Control headers are received during OPTIONS requests

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS')
	{
	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
	exit(0);
	}



// Check connection


function Decrypt($password, $data)
{

    $data = base64_decode($data);
    $salt = substr($data, 8, 8);
    $ct   = substr($data, 16);

    $key = md5($password . $salt, true);
    $iv  = md5($key . $password . $salt, true);

    $pt = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $ct, MCRYPT_MODE_CBC, $iv);

    return $pt;
}


// http://stackoverflow.com/questions/15485354/angular-http-post-to-php-and-undefined

$postdata = file_get_contents("php://input");

if (isset($postdata))
	{
		// echo "$postdata";
	$request = json_decode($postdata);
	// echo "$request";
	$message = $request->message;
	$pass=$request->password;

	$DecryptMsg=Decrypt($pass, $message);
	echo "$DecryptMsg";

	
	}
  


?>	