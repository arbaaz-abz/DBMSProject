<?php
  if ($_POST["confirm"]) {
    ini_set('display_errors', 1);
    $servername = "localhost";
    $username = "root";
    $password = "root123";
    $dbname = "bus";
    $conn = new mysqli($servername, $username, $password,$dbname);
    $query  = 'SELECT max(Tid) FROM `tickets`';
      $result = $conn->query($query);
      $row = mysqli_fetch_array($result);
      $maxID = $row["max(Tid)"];
      $newID = $maxID + 1;

   session_start();
   $uID = $_SESSION['uid'];
   $busID=$_SESSION['busID'];
   $seats =$_SESSION['noseats'];
   $cost=$_SESSION['costaf'];

   $sql = "INSERT INTO tickets (Tid,BusID,noseats,cost,user) VALUES ('$newID','$busID','$seats','$cost','$uID')";
   $result = $conn->query($sql);

   $sql = "SELECT max(availseats) FROM `routes` WHERE bid='$busID'";
   $result = $conn->query($sql);
   $row = mysqli_fetch_array($result);
   $currseats = $row["max(availseats)"];
   $currseats = $currseats - $seats;

   $sql = "UPDATE routes set availseats='$currseats' where bid='$busID' ";
   $result = $conn->query($sql);

   $query = "SELECT balance FROM payment where uid = '$uID' ";
   $result = $conn->query($query);
    $row = mysqli_fetch_array($result);
   $currbalance = $row["balance"];
   $currbalance  = $currbalance - $cost;

   $sql = "UPDATE payment set balance = '$currbalance' where uid = '$uID'";
  $result = $conn->query($sql);

  
   $conn->close();
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
   margin-left:260px;
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
      <h1 class="center"><strong>TICKET HAS BEEN CONFIRMED!</strong></h1>
      <?php
      echo $currseats;
      ?>
      <form method="post">
        <input type="submit" name="confirm" class="btn btn-success btn-lg btnpadd" value="Home"/>
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
