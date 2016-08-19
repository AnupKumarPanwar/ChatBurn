<?php
session_start([
    'cookie_lifetime' => 2592000,
]);

if ($_SESSION['name']==NULL) {
	header("Location: index.php");
}
// $dbServer = 'localhost'; //Define database server host
// $dbUsername = 'root'; //Define database username
// $dbPassword = ''; //Define database password
// $dbName = 'crypten'; //Define database name


$conn=mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
if (!$conn) 
{
    header("Location : index.php");
}

echo '
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Chat Burn</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME  CSS -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script src="jquery.js"></script>

</head>
<body>

<script>
$(document).ready(function(){
	$("#chatbox").hide();
	$("#chatboxbutton").click(function()
	{
		$("#chatbox").slideToggle(500);
	})
	$(".chat-box-div").click(function(){
		$("#chatbox").fadeOut(500);
	})
})
</script>

<script>
setInterval(function(){
	if($("input").is(":focus"))
	{

	}
	else
	{
		location.reload();
	}
},60000)
</script>


    <div class="container">
        <div class="row pad-top pad-bottom">
        		
        	<div class="col-lg-12 col-md-12 col-sm-12">
        	    <div class="chat-box-online-div">
        	        <div class="chat-box-online-head" style="cursor: pointer" id="chatboxbutton">
        	           <img src="images.png" style="width:30px">  Send Messages
        	        </div>
        	        <div class="panel-body chat-box-online" id="chatbox">
        	        <form action="send.php" method=POST>
        	            <input type="text" name="reciever" placeholder="Recipient Email" class="form-control" required >
        	            <input type="text" name="message" placeholder="Message" class="form-control" style="height:50%" autocomplete="off" required>
        	            <input type="password" name="password" placeholder="Message Password" class="form-control" autocomplete="off" required>
        	            <br>
        	            <input type="submit" name="submit" class="btn btn-info" " value="Send">
        	        

        	        </form>
        	            
        	        </div>

        	    </div>


        	</div>




            <div class=" col-lg-12 col-md-12 col-sm-12">
                <div class="chat-box-div">
                    <div class="chat-box-head">
                        CHAT HISTORY
                            
                    </div>
                    <div class="panel-body chat-box-main">';
                    $i=1;
                    $TableName=$_SESSION['email'];
                    $user=$_SESSION['name'];

                    echo "<b>Welcome $user </b><br>";
                    $sql="SELECT * FROM `". $TableName ."` where 1";

                    $result=mysqli_query($conn, $sql);




 if (mysqli_num_rows($result)==0) {
                    	echo "Your inbox is empty<br><br>";
                    	echo "<b>Start your first chat with </b><br>";
                    	$suggest="SELECT fname, lname, email FROM users LIMIT 5";

                    	$suggestedusers=mysqli_query($conn, $suggest);
                    	while ($su=mysqli_fetch_assoc($suggestedusers)) {
                    		echo "- ".$su['fname']." ".$su['lname']."<br>";
                    		echo "&nbsp; &nbsp; &nbsp;".$su['email']."<br><br>";
                    	}



                    }




                    while ($r=mysqli_fetch_assoc($result)) {
                        $msg="msg".$i;
                        $but="but".$i;
                        $pashold="pas".$i;
                        echo '<div class="chat-box-left" id="'.$msg.'">';
                        echo $r['message'];
                        echo '</div>
                        <div class="chat-box-name-left">';
                            
                          echo "  -  " ;
                          echo $r['fname'];
                          echo $r['lname'];
			  echo "<br>";
                          echo $r['username'];

                          // echo "<script>#$but</script>";

                           echo '<div class="input-group">
                            <input type="password" class="form-control" placeholder="Password" id="'.$pashold.'">
                            <span class="input-group-btn">
                                <button class="btn btn-info" type="button" id="'. $but .'">Decrypt</button>
                            </span>
                        </div>
                        </div>

                        <script>

                        $(document).ready(function(){

                            $("#'.$but.'").click(function(){
                            var password'.$i.'=$("#'.$pashold.'").val();
                            // alert(password1);
                                $.post("decrypt.php",
                                \'{"message": "'.$r['message'].'", "password": "\' + password'.$i.' +\'"}\',
                                function(data,status){
                                    $("#'.$msg.'").html(data);
                                    // alert("Data: " + data + "\nStatus: " + status);
                                });
                            });
                        });
                        </script>



                        <hr class="hr-clas" />';
                        $i=$i+1;

                    }


                       



                   echo '</div>
                    

                </div>

            </div>
            
            
          
        </div>
    </div>

    <!-- USING SCRIPTS BELOW TO REDUCE THE LOAD TIME -->
    <!-- CORE JQUERY SCRIPTS FILE -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- CORE BOOTSTRAP SCRIPTS  FILE -->
    <script src="assets/js/bootstrap.js"></script>
</body>

</html>';


?>