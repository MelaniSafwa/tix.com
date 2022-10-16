<?php include '../db.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<br><br><br><br><br>
	<link rel="stylesheet" type="text/css" href="../css/registration.css">
	<link rel="stylesheet" type="text/css" href="../js/bootstrap.min.css">
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
			<form id="contact" action="addtheater.php" method="post" enctype="multipart/form-data">

				<h2  style="text-align: center;    font-family: cursive"><b>Add Theater</b></h2><br>
				
				<input  name="TheaterName" placeholder="Theater Name" type="text" tabindex="1" required autofocus>

				<input  name="Seat" placeholder="Capacity" type="text" tabindex="1" required autofocus>


				<input style="font-size: larger;background-color: #c2fbb8;font-family: cursive;font-weight: bold;" 
				class="boxStyle" type="submit" name="submit" value="Add Theater"> 
				<p class="copyright"></p>

			</form>
			<div class="wrapper">
				<button class="btn btn-default" onclick="document.location.href='../crudtheater.php'" ><span class='glyphicon glyphicon-chevron-left'> </span>BACK TO THE ADMIN PAGE</button>
			</div>
		</div>
	</div>
</body>
</html>

<?php 
if (isset($_POST['submit'] )&& !empty($_POST['submit']))

{
	$TheaterName=$_POST['TheaterName'];
	$seat=$_POST['Seat'];
	if (!(empty($TheaterName) || empty($seat) ))
	{

		$var=new AddProduct();
		$var->productAdd($conn);
	}
}
else{

}
?>

<?php 
class AddProduct{
	public function productAdd($conn)
	{
		$sql="insert into theater(theaterId,theaterName,seat) values('',?,?);";

		if(($stmt=$conn->prepare($sql))) {
			$stmt->bind_param("ss",$theaterName,$seat);

		}else
		{
			var_dump($conn->error);
		}
		$theaterName=$_POST['TheaterName'];
		$seat=$_POST['Seat'];

		$stmt->execute();
		$stmt->close();
		$_SESSION['msg']="Theater Successfully  Added";
		header ("Location: ../crudtheater.php" );
	}
}
?>