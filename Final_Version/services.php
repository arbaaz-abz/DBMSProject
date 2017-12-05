
<?php
session_start();
if ($_POST["submit"]) {
  if (!$_POST['username']) {
    $error.="<br />Please enter Amount";
  }
  if (!$_POST['password']) {
    $error.="<br />Please enter your pin";
  }
  if ($error) {
    $final='<div class="alert alert-danger"><strong>There were error(s)in your form:</strong>'.$error.'</div>';
  }
  else {
      ini_set('display_errors', 1);
      $servername = "localhost";
      $usrname = "root";
      $passwd = "root123";
      $dbname = "bus";
      $conn = new mysqli($servername, $usrname, $passwd,$dbname);
      $uID = $_SESSION['uid'];
      $ID = $_POST['username'];
      $Pass = $_POST['password'];
      $query1= "SELECT pcode FROM payment where uid = '$uID' ";
      $query2 = "SELECT balance FROM wallet where uid = '$uID' ";
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
          $result = $conn->query($query2);
          $row = mysqli_fetch_array($result);
          $currbalance = $row["balance"];
          $currbalance  = $currbalance + $ID;
          $result = $conn->query("call getBalance1($uID,$currbalance)");
          header("location: booking.php");
      }
      if($flag==0) {
          $final='<div class="alert alert-danger"><strong>Pin is invalid</strong></div>'; 
      }
    }
}
else if($_POST["goback"]) {
  header("location: booking.php");
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
   margin-left:175px;
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
      <br>
      <?php echo $final; ?>
      <h1 class="center"><strong>MY WALLET</strong></h1>
      <br>
      <table class="table table-bordered table-hover" >
          <thead class>
            <tr>
              <th bgcolor="#82e0aa" class="center">Current balance :
              <?php
                  $uID = $_SESSION['uid'];
                  ini_set('display_errors', 1);
                  $servername = "localhost";
                  $usrname = "root";
                  $passwd = "root123";
                  $dbname = "bus";
                  $conna = new mysqli($servername, $usrname, $passwd,$dbname);
                  $query="SELECT balance FROM wallet where uid='$uID'";
                  $result1 = $conna->query($query);
                  $rowa =  mysqli_fetch_array($result1);
                  echo $rowa["balance"];
              ?>
              </th>
            </tr>
          </thead>
      </table>
      <form method="post">
        <div class="form-group">
          <label for="username">Add Money :</label>
          <input type="text" name="username" class="form-control"  />
        </div>
        <div class="form-group input-field" >
          <label for="password">Enter Pin Of Any Linked Card: </label>
          <input  class="form-control" type="password" name="password" />
        </div>
        <input type="submit" name="goback" class="btn btn-danger " value="Go Back"/>
        <input type="submit" name="submit" class=" btn-success btn-lg btnpadd" value="Confirm"/>
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
