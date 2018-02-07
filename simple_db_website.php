<?php

$host = gethostname();
$ip_addy = $_SERVER['SERVER_ADDR'];
$user_name = "";
$dep_time = "";

echo "Hostname: $host <br/>";
echo "IP: $ip_addy<br/>";
echo "User: $user_name<br/>";
echo "Deployment time: $dep_time<br/>";



$con = @mysqli_connect('localhost', 'root', 'password', 'db01');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
echo 'Connected to MySQL';


$statement="INSERT INTO info (hostname, ip_address, user, time) VALUES (\"$host\", \"$ip_addy\", \"$user_name\", \"$dep_time\")";


mysqli_query($con, $statement);

$sql_check="SELECT ip_address FROM info ORDER BY id";



if ($result=mysqli_query($con,$sql_check))
  {

  $rowcount=mysqli_num_rows($result);
 
  echo "<br/><br/>rows: $rowcount";

  mysqli_free_result($result);
  }

?> 
