
<?php
  //include("auth.php");
  if($_POST['goback']){
     header("location: booking.php");
  }
  if ($_POST['submit']) {
    if (!($fromCity=$_POST['from'])) {
      $error="<br />Please enter the city where you want to start !";
    }
    if (!($toCity=$_POST['to'])) {
      $error.="<br />Please enter the destination city";
  }
    if (!($travel=$_POST['travelday'])) {
      $error.="<br />Please enter your Date of travel";
  }
    if ($_POST['from'] == $_POST['to']) {
      $error.="<br />Starting point and destination cannot be the same ";
    }
    if ($error) {
      $result='<div class="alert alert-danger"><strong>There were error(s)in your form:</strong>'.$error.'</div>';
    }
    if(!$error){
      session_start();
      $travel=$_POST['travelday'];
      $todayDate = date("Y-m-d");
      $flag=0;
      if($todayDate > $travel) {
      	  $flag=1;
      }
      if($flag==0) {
		  $_SESSION['fromCity'] = $fromCity;
		  $_SESSION['toCity'] = $toCity;
		  $_SESSION['travel'] = $travel;
		  header("location: nobus.php");
      }
      $result='<div class="alert alert-danger"><strong>You cannot Book tickets before today !</strong>'.$error.'</div>';
    }
    else {
        //header("location: register.php");

    }
  }
?>
<!doctype html>
<html>
<head>
<title>Bus Booking</title>
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
background-color: #e1e1e1;
}
form {
padding-bottom:15px;
}
.morepadd {
   padding-top:80px;
}
.leftmargin {
   margin-left:180px;
}
.centero {
   text-align:center;
   font-weight: bold;
   color:black;
}

</style>
</head>
<body>

<div class="container morepadd">
  <div class="row">
    <div class="col-md-6 col-md-offset-3 loginForm">
      <h2 class="centero">BOOK YOUR TICKETS HERE</h2>
      <?php echo $result; ?>
      <form method="post">

        <div class="form-group">
          <label for="depart">From :</label></br>
            <select name="from" style="padding:0px;width:100%;float:left;">
              <option value=""></option>
              <?php
              ini_set('display_errors', 1);
              $servername = "localhost";
              $username = "root";
              $password = "root123";
              $dbname = "bus";
              $conn = new mysqli($servername, $username, $password,$dbname);
                 $query_ak='SELECT DISTINCT fromCity FROM routes';
                 $result = $conn->query($query_ak);
              while ($row =  mysqli_fetch_array($result)) {
                 echo "<option value='" . $row['fromCity'] ."'>" . $row['fromCity'] ."</option>";
              }
            ?>
            </select>
        </br>
        </div>

        <div class="form-group">
          <label for="depart">To :</label></br>
          <select name="to" style="padding:0px;width:100%;float:left;">
            <option value=""></option>
            <?php
            ini_set('display_errors', 1);
            $servername = "localhost";
            $username = "root";
            $password = "root123";
            $dbname = "bus";
            $conn = new mysqli($servername, $username, $password,$dbname);
               $query_ak='SELECT DISTINCT toCity FROM routes';
               $result = $conn->query($query_ak);
            while ($row =  mysqli_fetch_array($result)) {
               echo "<option value='" . $row['toCity'] ."'>" . $row['toCity'] ."</option>";
            }
            ?>
            <?php
            include("auth.php");
            ?>
          </select>
        </br>
        </div>

        <div class="form-group input-field" >
          <label for="travelday">Date of Journey : </label>
          <input class="form-control" id="datepicker" type="date" name="travelday" >
        </div>

        <input type="submit" name="goback" class="btn btn-danger " value="Go Back"/>
        <input type="submit" name="submit" class="btn btn-success btn-lg leftmargin" value="Submit"/>
      </form>
    </div>
  </div>
</div>
<script>
$( function() {
  $( "#datepicker" ).datepicker();
} );
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>
