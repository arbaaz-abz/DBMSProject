<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>My Profile</title>
<link rel="stylesheet" href="css/style.css">
 
</head>

<body>
  <h1><strong><span class="yellow">My Profile</pan></strong></h1>
<h2><a href="booking.php">Back To Home</a></h2>

<table class="container">
	<thead>
		<tr>
		    <th><h1>Customer ID</h1></th>
			<th><h1>UserName</h1></th>
			<th><h1>Phone</h1></th>
			<th><h1>Address</h1></th>
			<th><h1>DOB</h1></th>
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
          $uID = $_SESSION['uid'];
          $query = "SELECT * FROM registered where u_id = '$uID'";
          $result = $conn->query($query);
          while($row =  mysqli_fetch_array($result)) {
                  echo '<tr>
                            <td "> ' . $row["u_id"] .'</td>
                            <td "> '.$row["username"] .'</td>
                            <td "> '.$row["phNo"] .'</td>
                            <td "> '.$row["address"] .'</td>
                            <td "> '.$row["dob"] .'</td>
                          </tr>';
            }
          ?>
	</tbody>
</table>
  
  
</body>
</html>
