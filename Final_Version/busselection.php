<?php
session_start();
if ($_POST["submit"]) {
  $final = "";
  if (!$_POST['busid']) {
    $error.="<br />Please enter your Bus ID";
  }
  if (!$_POST['noseats']) {
    $error.="<br />Please enter your Number of Seats";
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
      $busID = $_POST['busid'];
      $noSeats = $_POST['noseats'];
      $_SESSION['busID'] = $busID;
      $_SESSION['noseats'] = $noSeats;
      $query = "SELECT availseats FROM routes where bid = '$busID'";
      $result = $conn->query($query);
      $row = mysqli_fetch_array($result);
      $seat = $row["availseats"];
      $flag=0;
      if($noSeats > $seat) {
      		$flag=1;
      }
      if($flag==0)
      header("location: ticket.php");
      
      
      $result='<div class="alert alert-danger"><strong>Error : Exceeded total number seats !</strong></div>';
    }
}
else if($_POST["goback"]) {
  header("location: bookingTicket.php");
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
   margin-left:300px;
}
.center {
   text-align:center;
}

</style>
</head>
<body>
<div class="container morepadd">

    <div class="col-md-9 col-md-offset-2 loginForm">
      <h1 class="center"><strong>CONFIRMED TICKETS</strong></h1>
      <?php echo $result ?><br>
      <table class="table table-bordered table-hover" >

          <thead class>
            <tr>
              <th bgcolor="  #82e0aa  ">BusID</th>
              <th bgcolor="  #82e0aa  ">From</th>
              <th bgcolor="  #82e0aa  ">To</th>
              <th bgcolor="  #82e0aa  ">Departure Date</th>
              <th bgcolor="  #82e0aa  ">Departure time</th>
              <th bgcolor="  #82e0aa  ">Arrival Date</th>
              <th bgcolor="  #82e0aa  ">Arrival Time</th>
              <th bgcolor="  #82e0aa  ">Available Seats</th>
              <th bgcolor="  #82e0aa  ">Cost</th>
            </tr>
          </thead>
          <tbody>
          <?php
          ini_set('display_errors', 1);
          $servername = "localhost";
          $username = "root";
          $password = "root123";
          $dbname = "bus";
          $conn = new mysqli($servername, $username, $password,$dbname);
          $fromCity = $_SESSION['fromCity'];
          $toCity = $_SESSION['toCity'];
          $travel =$_SESSION['travel'];
	  $date=$travel;
          //$date = DateTime::createFromFormat('m/d/Y', $travel);
          //$date = $date->format('Y-m-d');
          //echo $fromCity;
          //echo $toCity;
          //echo $date;
          $query = "SELECT * FROM routes where fromCity = '$fromCity' AND toCity = '$toCity' AND dep_date = '$date'";
          $result = $conn->query($query);
          while($row =  mysqli_fetch_array($result)) {
                  echo '<tr>
                            <td bgcolor=" #5dade2 "scope="row">' . $row["bid"] .'</td>
                            <td bgcolor=" #5dade2 "> '.$row["fromCity"] .'</td>
                            <td bgcolor=" #5dade2 "> '.$row["toCity"] .'</td>
                            <td bgcolor=" #5dade2 "> '.$row["dep_date"] .'</td>
                            <td bgcolor=" #5dade2 "> '.$row["dep_time"] .'</td>
                            <td bgcolor=" #5dade2 "> '.$row["arr_date"] .'</td>
                            <td bgcolor=" #5dade2 "> '.$row["arr_time"] .'</td>
                            <td bgcolor=" #5dade2 "> '.$row["availseats"] .'</td>
                            <td bgcolor=" #5dade2 "> '.$row["cost"] .'</td>
                          </tr>';
            }
          ?>
        </tbody>
        </div>
      </table>
      <form method="post">
        <div class="form-group">
          <label for="busid">Enter BUS ID:</label>
          <input type="text" name="busid" class="form-control"/>
        </div>
        <div class="form-group input-field" >
          <label for="noseats">Enter Number of Seats:</label>
          <input  class="form-control" type="text" name="noseats">
        </div>
        <input type="submit" name="goback" class="btn btn-danger " value="Go Back"/>
        <input type="submit" name="submit" class="btn btn-success btn-lg btnpadd" value="Submit"/>
      </form>
    </div>
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</script>
</body>
</html>
