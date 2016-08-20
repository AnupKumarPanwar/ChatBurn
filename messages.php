<?php
session_set_cookie_params(31536000);
session_start();
if ($_SESSION['name']==NULL) {
    header("Location: index.php");
}

$dbServer = 'localhost'; //Define database server host
$dbUsername = 'root'; //Define database username
$dbPassword = ''; //Define database password
$dbName = 'crypten'; //Define database name

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


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.2.0/material.min.js"></script>

</head>


<style>
.unread
{
    background-color:antiquewhite;
}
</style>


<body style="overflow-x:hidden">

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
                        <input type="text" name="reciever" placeholder="Recipient Email" class="form-control" required id="msgrec" >
                        <input type="text" name="message" placeholder="Message" class="form-control" style="height:50%" autocomplete="off" required id="msgcont">
                        <input type="password" name="password" placeholder="Message Password" class="form-control" autocomplete="off" required id="msgpas">
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
                    <div class="panel-body chat-box-main" style="overflow-x:hidden">';
                    $i=1;
                    $TableName=$_SESSION['email'];
                    $user=$_SESSION['name'];

                    echo "<b>Welcome $user </b><br><br>";
                    $sql="SELECT * FROM `". $TableName ."` where 1 order by senddate DESC";

                    $result=mysqli_query($conn, $sql);




 if (mysqli_num_rows($result)==0) {
                        echo "Try Decrypting the following message with password <b><em>abc123</em></b><br><br>";








                        echo '<div class="chat-box-left" id="testmsg">';
                                                echo "U2FsdGVkX19A6XpPrPniboRdcGaqFqZT8/Pw8OaRCuEMTbTFtGd5MkAtJrEr0r4IT+1EKMO5cilR0N2hzBbOyD+siBxLw3vzYOgyu9N0zhkUYc57WyQnWr2OkswYkDmbNF+GaNXo1vPnw6H06MariJPFc1CQmkI/SC+ma66c0wm6Qu46FxaGGY8fnVjXDs5NyKhOy22otuvhBBZf6cY+x4iSRIrI8jDIQwY7t5S6lMJNUO3PfpKJ34NMV/4BlXEhwnvGBi0s2EDS+nwPoqWlVSyOBfbifx+zbEm8ApPjQPxnAWAFvjN/ydY1PmU3/jiUr63QrJ6bv6O6BS9eR/k/bJO3SqLhMrlDOp1+Kzl7JhFPEehIOy2mEt8MIicaaUAT
";
                                                echo '</div>
                                                <div class="chat-box-name-left">';
                                                    
                                                  echo "  -  " ;
                                                  echo "Anup ";
                                                  echo "Panwar";
                                      echo "<br>";
                                                  echo "1anuppanwar@gmail.com";

                                                  // echo "<script>#$but</script>";

                                                   echo '<div class="input-group">
                                                    <input type="password" class="form-control" placeholder="Password" id="testpas">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" type="button" id="testbut">Decrypt</button>
                                                    </span>
                                                </div>
                                                </div>

                                                <script>

                                                                        $(document).ready(function(){

                                                                            $("#testbut").click(function(){
                                                                            var passwordtest=$("#testpas").val();
                                                                            // alert(password1);
                                                                                $.post("decrypt.php",
                                                                                \'{"message": "U2FsdGVkX19A6XpPrPniboRdcGaqFqZT8/Pw8OaRCuEMTbTFtGd5MkAtJrEr0r4IT+1EKMO5cilR0N2hzBbOyD+siBxLw3vzYOgyu9N0zhkUYc57WyQnWr2OkswYkDmbNF+GaNXo1vPnw6H06MariJPFc1CQmkI/SC+ma66c0wm6Qu46FxaGGY8fnVjXDs5NyKhOy22otuvhBBZf6cY+x4iSRIrI8jDIQwY7t5S6lMJNUO3PfpKJ34NMV/4BlXEhwnvGBi0s2EDS+nwPoqWlVSyOBfbifx+zbEm8ApPjQPxnAWAFvjN/ydY1PmU3/jiUr63QrJ6bv6O6BS9eR/k/bJO3SqLhMrlDOp1+Kzl7JhFPEehIOy2mEt8MIicaaUAT", "password": "\' + passwordtest +\'"}\',
                                                                                function(data,status){
                                                                                    $("#testmsg").html(data);
                                                                                    // alert("Data: " + data + "\nStatus: " + status);
                                                                                });
                                                                            });
                                                                        });
                                                </script>



                                                <hr class="hr-clas" />';











                        echo "<br><b><center>Start your first chat with password <b><em>abc123</em></b><br>Here are some suggested users</b><br>";
                        $suggest="SELECT fname, lname, email FROM users LIMIT 5";

                        $suggestedusers=mysqli_query($conn, $suggest);
                        while ($su=mysqli_fetch_assoc($suggestedusers)) {
                            echo "- ".$su['fname']." ".$su['lname']."<br>";
                            echo "&nbsp; &nbsp; &nbsp;".$su['email']."<br><br>";
                        }

                     echo "</center>";

                    }




                    while ($r=mysqli_fetch_assoc($result)) {
                        $msg="msg".$i;
                        $but="but".$i;
$divid="divmsg".$i;
                        $pashold="pas".$i;
echo '<div id="'.$divid.'">';
                        echo $r['senddate'];
                        echo '<div class="chat-box-left" id="'.$msg.'">';
                        echo $r['message'];
                        echo '</div>
                        <div class="chat-box-name-left">';
                            
                          echo "  -  " ;
                          echo $r['fname'];
                          
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

                        if($r['isunread']==1)
                        {
                            echo '<script>
                                $("#'.$divid.'").addClass("unread");
                            </script>';

                        }

                   echo "</div>";


                        $i=$i+1;

                    }


                       



                   echo '</div>
                    

                </div>

            </div>
            
            
          
        </div>
    </div>










<div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text"></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>
<script>
(function() {
  "use strict";
  
  var snackbarContainer = document.querySelector("#demo-toast-example");
  var showToastButton = document.querySelector(".btn-info");
  showToastButton.addEventListener("click", function() {
    "use strict";
   var data = {message: "Message Sent"};
    snackbarContainer.MaterialSnackbar.showSnackbar(data);

  });
}());
</script>













    <!-- USING SCRIPTS BELOW TO REDUCE THE LOAD TIME -->
    <!-- CORE JQUERY SCRIPTS FILE -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- CORE BOOTSTRAP SCRIPTS  FILE -->
    <script src="assets/js/bootstrap.js"></script>
</body>

</html>';


?>  





























		