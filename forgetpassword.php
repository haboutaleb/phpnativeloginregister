<?php
include "inc.php";
include "database.php";
    if(isset($_POST['submit']))
    {


        $sendEmail = new sendEmail;

        $email = $_POST['email'];
        $result = mysqli_query($conn,"SELECT * FROM users where email='" . $_POST['email'] . "'");
        $row = mysqli_fetch_assoc($result);
        if($row){
            $email=$row['email'];
            $url = 'http://localhost/hany/resetpassword.php?user_id='.$row['id'];
            $reselt = $sendEmail->send($row['fullName'], $email, $url);
        
                    echo "تم ارسال استعادة  الباسسورد على الاميل";

        }  
        else{
            echo "اخشع من هنا معندناش الاميل دة";
        }

        
                    
    }

?>
<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }

</style>
</head>

<body>
<h1>Forgot Password<h1>
</li>
      <li class="nav-item active">
        <a class="nav-link" href="login.php">Login</a>
</li>
<form action='' method='post'>
<table cellspacing='5' align='center'>
<tr><td>email</td><td><input type='text' name='email'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>
</body>
</html>