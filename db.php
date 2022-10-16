<?php 
/*if (!session_id()) {
	# code...
	session_start();
}*/

$host="www.db4free.net";
$username="adibaa";
$password="melani1304";
$db_name="movieDbbb";
// Create connection
$conn = new mysqli($host, $username, $password,$db_name);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} else{
	
}
?>
