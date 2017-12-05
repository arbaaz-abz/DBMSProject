<?php
if ($_POST["submit"]) {
  if (!$_POST['username']) {
    $error.="<br />Please enter your username";
  }
  if (!$_POST['password']) {
    $error.="<br />Please enter your password";
  }
  if ($error) {
    $result='<div class="alert alert-danger"><strong>There were error(s)in your form:</strong>'.$error.'</div>';
  }
  else {
      ini_set('display_errors', 1);
      $servername = "localhost";
      $username = "root";
      $password = "root123";
      $dbname = "bus";
      $conn = new mysqli($servername, $username, $password,$dbname);
      $ID = $_POST['username'];
      $Pass = $_POST['password'];
      if(!empty($_POST['username'])){
               $query = "SELECT * FROM login where username = '$ID' AND password = '$Pass'";
               $result = $conn->query($query);
               $row = mysqli_fetch_array($result);
               $rows = mysqli_num_rows($result);
               if ($rows == 1) {
                  session_start();
                  $_SESSION['login_user']=$ID;
                  $_SESSION['uid'] = $row['uID']; // Initializing Session
                  $result='<div class="alert alert-success"><strong>Login Successful!</strong> </div>';
                  header("location: booking.php"); // Redirecting To Other Page
                  sleep(1.5);
               }
               else {
                    $result='<div class="alert alert-danger"><strong>Username or Password is invalid :</strong></div>';
               }
      }
    }
}
?>
<!doctype html>
<html>
<head>
<title>Loggin in</title>
<meta charset="utf-8" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/
bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/
bootstrap-theme.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
html , body {
   height: 100%;
}
.container {
   background-image:url("source/home/css/image.jpg");
   position: relative;
   width:100%;
   height:100%;
   background-position: center;
   background-repeat: no-repeat;
   background-size: cover;
   padding-top:140px;
}
.loginForm {
border:2px solid green;
border-radius:10px;
margin-top:20px;
background-color:#e1e1e1;
}
form {
padding-top:10px;
padding-bottom:20px;
}
.morepadd {
   padding-top:90px;
}
.btnpadd {
   margin-left:265px;
}
.center {
   text-align:center;
}

</style>
</head>
<body>
<div class="container morepadd">
  <div class="row">
    <div class="col-md-6 col-md-offset-3 loginForm">
      <h1 class="center"><strong>Log in to BOOK MY BUS</strong></h1>
      <?php echo $result; ?>
      <form method="post">
        <div class="form-group">
          <label for="username">Your Name:</label>
          <input type="text" name="username" class="form-control" value="<?php echo $_POST['username']; ?>" />
        </div>
        <div class="form-group input-field" >
          <label for="password">Password</label>
          <input  class="form-control" type="password" name="password" value="<?php echo $_POST['password']; ?>">
        </div>
        <input type="submit" name="submit" class="btn btn-success btn-lg btnpadd" value="Login"/>
      </form>
    </div>
  </div>
</div>
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</script>
</body>
</html>
