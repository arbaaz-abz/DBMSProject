<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>TICKET</title>
<link rel="stylesheet" href="css/style.css">
<style>
.h3 {
	text-align:center;
}
.padd {
  margin-left:480px;
}
</style>
</head>

<body>
  <h1><strong><span class="yellow">TICKET NO - <?php echo $_GET["tid"];  ?></span></strong></h1>
<h2><a href="booking.php">Back To Home</a></h2>
<h2><a onclick="myFunction()">PRINT E-TICKET</a></h2>

<table class="container">
	<thead>
		<tr>
		    <th><h1>CustomerID</h1></th>
		    <th><h1>Name</h1></th>
			<th><h1>BusID</h1></th>
			<th><h1>From</h1></th>
			<th><h1>To</h1></th>
			<th><h1>Dept. Date</h1></th>
			<th><h1>Dept. Time</h1></th>
			<th><h1>seats</h1></th>
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
          session_start();
          $tID = $_GET["tid"];
          $uID = $_SESSION['uid'];
          
          $sql = "SELECT BusID,noseats FROM tickets WHERE Tid='$tID' ";
          $result = $conn->query($sql);
          $row1 =  mysqli_fetch_array($result);
          $BusID=$row1["BusID"];
          $noseats=$row1["noseats"];
          
          $sql = "SELECT fromCity,toCity,dep_date,dep_time,cost FROM routes WHERE bid='$BusID' ";
          $result = $conn->query($sql);
          $row1 =  mysqli_fetch_array($result);
          $from=$row1["fromCity"];
          $to=$row1["toCity"];
          $depdate=$row1["dep_date"];
          $depTime=$row1["dep_time"];
          $costperseat = $row1["cost"];
          $costaf = $noseats * $costperseat;
          $name = $_SESSION['login_user'];
                  echo '<tr>
                            <td "> ' .$uID.'</td>
                            <td "> '.$name.'</td>
                            <td "> '.$BusID.'</td>
                            <td "> '.$from .'</td>
                            <td "> '.$to.'</td>
                            <td "> '.$depdate.'</td>
                            <td "> '.$depTime.'</td>
                            <td "> '.$noseats.'</td>
                          </tr>';
          ?>
	</tbody>
</table>
 <h3><strong><span class="padd">WISHING YOU A HAPPY JOURNEY !</span></strong></h3>
<script>
function myFunction() {
    window.print();
}
</script>
</body>
</html>
