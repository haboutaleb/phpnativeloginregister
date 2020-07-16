<?php
include "inc.php";

$validation = new validation;
$queries    = new queries;
$sendEmail  = new sendEmail;

if (isset($_GET['user_id'])) {


    $validation->validate('password', 'Password', 'required|min_len|6');
  
    if ($validation->run()) {
  
 
      $password = $validation->input('password');
      $password = password_hash($password, PASSWORD_DEFAULT);
      if ($queries->query("UPDATE  users SET   password= ? where id=? ", [ $password,$_GET['user_id']])) {
            echo "password has been changed";
           // header("location: login.php");
            echo "password has been changed";

        }
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
<h1>reset Password<h1>
<form action='' method='post'>
<table cellspacing='5' align='center'>

<div class="form-group">
                <input type="password" name="password" class="form-control " placeholder="Create new password" value="<?php if ($validation->input('passwors')) : echo $validation->input('password');
                  endif; ?>">
                <div class="error">
                  <?php if (!empty($validation->errors['password'])) : echo $validation->errors['password'];
                  endif; ?>
                </div>
              </div>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
<li class="nav-item active">
        <a class="nav-link btn btn-danger" href="login.php">login</a>
      </li>
</table>
</form>
</body>
</html>