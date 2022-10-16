<?php 

require_once('db.php');
$id = $_GET['id'];

?>

<?php 
// mengecek apakah user belum menekan tombol submit
if (!isset($_POST["submit"])){
    $query = "SELECT * FROM theater WHERE theaterId=".$id."";
    // execute the query
    $result = $conn->query($query);
    if (!$result){
        die ("Could not query the database: <br />" . $db->error);
    } else{
        while ($row = $result->fetch_object()){
            $theaterId = $row->theaterId;
            $theaterName = $row->theaterName;
            $seat = $row->seat;
        }
    }
} else{
    $valid = TRUE; // flag validasi

    $theaterName = $_POST['theaterName'];
    if ($theaterName == ''){
        $error_theaterName = "Theater Name is required";
        $valid = FALSE;
    }

    $seat = $_POST['seat'];
    if ($seat == ''){
        $error_seat = "Kapasitas is required";
        $valid = FALSE;
    }

    // update data into database
    
    if ($valid){
		$seat = $conn->real_escape_string($seat);
        // asign a query
        $query = " UPDATE user SET theaterName='".$theaterName."', seat='".$seat."' WHERE theaterId='".$id."' ";
        // execute the query
        $result = $conn->query($query);
        if (!$result){
            die ("Could not query the database: <br />" . $db->error . '<br>Query:' .$query);
        } else{
            $conn->close();
            header('Location: crudtheater.php');
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
	<title>Add Theater</title>
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

				<h2  style="text-align: center;    font-family: cursive"><b>Edit Theater</b></h2><br>

				<div class="form-group">
					<input  name="theaterName" placeholder="theatername" type="text" tabindex="1" value="<?php echo $theaterName;?>" required autofocus>
					<div class="error"><?php if(isset($error_theaterName)) echo $error_theaterName;?></div>
				</div>
				
				<div>
				<input  name="seat" placeholder="seat" type="text" tabindex="1" value="<?php echo $seat;?>" required autofocus>
				<div class="error"><?php if(isset($error_seat)) echo $error_seat;?></div>
				</div>


				<input style="font-size: larger;background-color: #c2fbb8;font-family: cursive;font-weight: bold;" 
				class="boxStyle" type="submit" name="submit" value="Update"> 
				<p class="copyright"></p>

			</form>
			<div class="wrapper">
				<button class="btn btn-default" onclick="document.location.href='crudtheater.php'" ><span class='glyphicon glyphicon-chevron-left'> </span>CANCEL</button>
			</div>
		</div>
	</div>
</body>
</html>