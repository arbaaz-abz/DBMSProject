<?php
if ($_POST["submit"]) {
    if (!$_POST['pin']) {
    $error.="<br />Please enter your Pin";
  }
  if ($error) {
    $result='<div class="alert alert-danger"><strong>There were error(s)in your form:</strong>'.$error.'</div>';
  }
  else {
      ini_set('display_errors', 1);
      $servername = "localhost";
      $username = "root";
      $passwd = "root123";
      $dbname = "bus";
      $conn = new mysqli($servername, $username, $passwd,$dbname);
      session_start();
      $uID = $_SESSION['uid'];
      $Pass = $_POST['pin'];
      $query1= "SELECT pcode FROM payment where uid = '$uID' ";
      $result = $conn->query($query1);
      $flag=0;
      while($row = mysqli_fetch_array($result)) {
        $x=$row["pcode"];
        if($x == $Pass ) {
            $flag=1;
            break;
        }
      }
      if($flag==1) {
          $cost = $_SESSION['costaf'];
	  $query1= "SELECT balance FROM wallet where uid = '$uID' ";
          $result = $conn->query($query1);
          $row = mysqli_fetch_array($result);
          $currbalance = $row["balance"];
          $currbalance  = $currbalance - $cost;
          $sql = "UPDATE `wallet` SET `balance` = '$currbalance' WHERE `wallet`.`uid` = '$uID'";
          $result = $conn->query($sql);
          sleep(1);
          header("location: confirm.php"); // Redirecting To Other Page              
      }
      if($flag==0) {
           $result='<div class="alert alert-danger"><strong>Pin is invalid</strong></div>'; 
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
   margin-left:245px;
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
      <h1 class="center"><strong>MAKE PAYMENT</strong></h1>
      <?php echo $result; ?>
      <form method="post">
         <div class="form-group input-field" >
          <label for="password">Enter your Pin (Any Card):</label>
          <input  class="form-control" type="password" name="pin" value="<?php echo $_POST['pin']; ?>">
        </div>
        <input type="submit" name="submit" class="btn btn-success btn-lg btnpadd" value="Submit PIN"/>
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
