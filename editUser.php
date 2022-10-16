<?php 

require_once('db.php');
$id = $_GET['id'];

?>

<?php 
// mengecek apakah user belum menekan tombol submit
if (!isset($_POST["submit"])){
    $query = "SELECT * FROM user WHERE status != '101' && userId=".$id." ORDER BY userId";
    // execute the query
    $result = $conn->query($query);
    if (!$result){
        die ("Could not query the database: <br />" . $db->error);
    } else{
        while ($row = $result->fetch_object()){
            $userId = $row->userId;
            $userName = $row->userName;
            $password = $row->password;
        }
    }
} else{
    $valid = TRUE; // flag validasi

    $userName = $_POST['userName'];
    if ($userName == ''){
        $error_userName = "username is required";
        $valid = FALSE;
    }

    $password = $_POST['password'];
    if ($password == ''){
        $error_password = "password is required";
        $valid = FALSE;
    }

    // update data into database
    
    if ($valid){
		$password = $conn->real_escape_string($password);
        // asign a query
        $query = " UPDATE user SET userName='".$userName."', password='".$password."' WHERE userId='".$id."' ";
        // execute the query
        $result = $conn->query($query);
        if (!$result){
            die ("Could not query the database: <br />" . $db->error . '<br>Query:' .$query);
        } else{
            $conn->close();
            header('Location: cruduser.php');
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<br><br><br><br><br>
	<link rel="stylesheet" type="text/css" href="css/registration.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.min.css">
	<title>Edit User</title>
	<style type="text/css">
		.boxStyle
		{
			width: 100%;
			border: 1px solid #ccc;
			background: #FFF;
			margin: 0 0 5px;
			padding: 10px;
			font-style: normal;
			font-variant-ligatures: normal;
			font-variant-caps: normal;
			font-variant-numeric: normal;
			font-weight: 400;
			font-stretch: normal;
			font-size: 12px;
			line-height: 16px;
			font-family: Roboto, Helvetica, Arial, sans-serif;
			
		}
		.wrapper{
			text-align: center;
		}
		body, html {
			height: 100%;
			margin: 0;
		}
		.bg { 

			/* Full height */
			height: 100%; 

			/* Center and scale the image nicely */
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>

<body >
	<div class="bg" >
		

		<div class="container">  
			<form id="contact" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;?>" method="POST">

				<h2  style="text-align: center;    font-family: cursive"><b>Edit User</b></h2><br>
				<div class="form-group">
					<input  name="userName" placeholder="username" type="text" tabindex="1" value="<?php echo $userName;?>" required autofocus>
					<div class="error"><?php if(isset($error_userName)) echo $error_userName;?></div>
				</div>
				
				<div>
				<input  name="password" placeholder="password" type="text" tabindex="1" value="<?php echo $password;?>" required autofocus>
				<div class="error"><?php if(isset($error_password)) echo $error_password;?></div>
				</div>

				<input style="font-size: larger;background-color: #c2fbb8;font-family: cursive;font-weight: bold;" 
				class="boxStyle" type="submit" name="submit" value="Edit User"> 
				<p class="copyright"></p>

			</form>
			<div class="wrapper">
				<button class="btn btn-default" onclick="document.location.href='cruduser.php'" ><span class='glyphicon glyphicon-chevron-left'> </span>CANCEL</button>
			</div>
		</div>
	</div>
</body>
</html>

<?php

?>

