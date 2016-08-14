<?php
session_start();
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
    header("Location : index.html");
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
    <title>Bootstrap Chat Box Example</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME  CSS -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>


    <div class="container">
        <div class="row pad-top pad-bottom">


            <div class=" col-lg-6 col-md-6 col-sm-6">
                <div class="chat-box-div">
                    <div class="chat-box-head">
                        CHAT HISTORY
                            
                    </div>
                    <div class="panel-body chat-box-main">';
                    $i=1;
                    $TableName=$_SESSION['email'];
                    // echo "$TableName";
                    $sql="SELECT * FROM `". $TableName ."` where 1";

                    $result=mysqli_query($conn, $sql);

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
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="chat-box-online-div">
                    <div class="chat-box-online-head">
                        Send Messages
                    </div>
                    <div class="panel-body chat-box-online">
                    <form action="send.php" method=POST>
                        <input type="text" name="reciever" placeholder="Recipient Username" class="form-control">
                        <input type="text" name="message" placeholder="Message" class="form-control" style="height:50%" autocomplete="off">
                        <input type="password" name="password" placeholder="Message Password" class="form-control" autocomplete="off">
                        <br>
                        <input type="submit" name="submit" class="btn btn-info" " value="Send">
                    <!-- <button class="btn btn-info" type="button">SEND</button> -->

                    </form>
                        
                    </div>

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