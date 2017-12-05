<?php
session_start();
$uID = $_SESSION['uid'];
if ($_POST["submit"]) {
  if (!$_POST['cc']) {
    $error.="<br />Please enter a Card Number";
  }
  if (!$_POST['pcode']) {
    $error.="<br />Please enter the pincode";
  }
  if ($error) {
    $final='<div class="alert alert-danger"><strong>There were error(s)in your form:</strong>'.$error.'</div>';
  }
  else {
      ini_set('display_errors', 1);
      $servername = "localhost";
      $username = "root";
      $password = "root123";
      $dbname = "bus";
      $conn = new mysqli($servername, $username, $password,$dbname);
      $ccard = $_POST['cc'];
      $pcod = $_POST['pcode'];
      $sql = "INSERT INTO payment (uid,pcode,cc) VALUES ('$uID','$pcod','$ccard')";
      //$result = $conn->query($sql);
      if ($conn->query($sql) === TRUE) {
          header("location: booking.php");
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
      <h1 class="center"><strong>AVAILABLE CARDS</strong></h1>
      <?php echo $final; ?>
      <table class="table table-bordered table-hover" >

          <thead class>
            <tr>
              <th bgcolor="  #82e0aa  ">Card Number</th>
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

          $query = "SELECT cc FROM payment where uid = '$uID'";
          $result = $conn->query($query);
          while($row =  mysqli_fetch_array($result)) {
                  echo '<tr>
                            <td bgcolor=" #5dade2 "scope="row">' . $row["cc"] .'</td>
                          </tr>';
            }
          ?>
        </tbody>
        </div>
      </table>
      <form method="post">
        <div class="form-group">
          <label for="cc">Enter Credit Card Number:</label>
          <input type="text" name="cc" class="form-control"/>
        </div>
        <div class="form-group input-field" >
          <label for="pcode">Enter Pin Number :</label>
          <input class="form-control" type="password" name="pcode">
        </div>
         <input type="submit" name="goback" class="btn btn-danger " value="Go Back"/>
        <input type="submit" name="submit" class="btn btn-success btn-lg btnpadd" value="Add Card"/>
      </form>
    </div>
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</script>
</body>
</html>
