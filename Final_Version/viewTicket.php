<?php
  if ($_POST["confirm"]) {
    header("location: booking.php");
  }
  else if ($_POST["goback"]) {
   header("location: mytickets.php");
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
   margin-left:250px;
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
      <br><br><br>
      <?php
          ini_set('display_errors', 1);
          $servername = "localhost";
          $username = "root";
          $password = "root123";
          $dbname = "bus";
          $conn = new mysqli($servername, $username, $password,$dbname);
          session_start();
          $tID = $_GET["tid"];

          $sql = "SELECT BusID,noseats FROM tickets WHERE Tid='$tID' ";
          $result = $conn->query($sql);
          $row1 =  mysqli_fetch_array($result);
          $BusID=$row1["BusID"];
          $noseats=$row1["noseats"];

          //Get details from routes table
          $sql = "SELECT fromCity,toCity,dep_date,dep_time,cost FROM routes WHERE bid='$BusID' ";
          $result = $conn->query($sql);
          $row1 =  mysqli_fetch_array($result);
          $from=$row1["fromCity"];
          $to=$row1["toCity"];
          $depdate=$row1["dep_date"];
          $depTime=$row1["dep_time"];
          $costperseat = $row1["cost"];
          $costaf = $noseats * $costperseat;
      ?>
      <ul class="list-group">
        <li class="list-group-item list-group-item-info"><strong>Name : </strong><?php ini_set('display_errors', 1); $name = $_SESSION['login_user'];  echo $name; ?></li>
        <li class="list-group-item list-group-item-info"><strong>Bus ID : </strong><?php echo $BusID; ?></li>
        <li class="list-group-item list-group-item-info"><strong>From : </strong><?php  echo $from; ?></li>
        <li class="list-group-item list-group-item-info"><strong>To : </strong><?php  echo $to; ?></li>
        <li class="list-group-item list-group-item-info"><strong>Departure Date : </strong><?php  echo $depdate; ?></li>
        <li class="list-group-item list-group-item-info"><strong>Depature Time : </strong><?php  echo $depTime; ?></li>
        <li class="list-group-item list-group-item-info"><strong>No of Seats :  </strong><?php echo $noseats; ?></li>
        <li class="list-group-item list-group-item-info"><strong>Cost : </strong><?php echo $costaf; ?></li>
      </ul>

      <form method="post">
        <input type="submit" name="goback" class="btn btn-success btnpadd " value="Go Back"/>
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
