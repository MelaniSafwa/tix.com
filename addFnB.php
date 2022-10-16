<?php include '../db.php'; ?>

<!DOCTYPE html>
<html>
<head>	
	<br><br>
	<link rel="stylesheet" type="text/css" href="../css/registration.css">
	<link rel="stylesheet" type="text/css" href="../js/bootstrap.min.css">
	<style type="text/css">
		
		.MovieGenre{width: 100%;
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
		body, html {
			height: 100%;
			margin: 0;
		}
		.wrapper{
			text-align: center;
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

	<div class="bg">

		<div class="container">  
			<form id="contact" action="addMovie.php" method="post" enctype="multipart/form-data">
				<h2  style="text-align: center;    font-family: cursive"><b>Add FnB</b></h2>


				<div>
				<input  name="nama_menu" placeholder="nama_menu" type="text" tabindex="1" value="<?php echo $nama_menu;?>" required autofocus>
				<div class="error"><?php if(isset($error_nama_menu)) echo $error_nama_menu;?></div>
				</div>

				
				<div>
				<input  name="harga" placeholder="harga" type="text" tabindex="1" value="<?php echo $harga;?>" required autofocus>
				<div class="error"><?php if(isset($error_harga)) echo $error_harga;?></div>
				</div>


				<div>
				<TEXTAREA name="description" placeholder="description" type="textArea" tabindex="1" required></TEXTAREA>
				<div class="error"><?php if(isset($error_description)) echo $error_description;?></div>
				</div>


				<input style="font-size: larger;background-color: #c2fbb8;font-family: cursive;font-weight: bold;" 
				class="MovieGenre" type="submit" name="submit"> 
				<p class="copyright"></p>
				<p></p>


			</form>
			<div class="wrapper">
				<button class="btn btn-default" onclick="document.location.href='../crudfnb.php'" > <span class='glyphicon glyphicon-chevron-left'> </span>BACK TO THE ADMIN PAGE</button>
			</div>

		</div>

	</div>
</body>
</html> 

<?php 
if (isset($_POST['submit'] )&& !empty($_POST['submit']))

{
	$nama_menu=$_POST['nama_menu'];
	$harga=$_POST['harga'];
	$description=$_POST['description'];
	if (!(empty($nama_menu) || empty($harga) || empty($description)))
	{
		echo "<script>alert(Movie Added);</script>";
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
		$sql="insert into menulist(id_menu,nama_menu,harga,description,image) values('',?,?,?,?);";

		if(($stmt=$conn->prepare($sql))) {
			$stmt->bind_param("ssss",$nama_menu,$harga,$description,$image);

		}else
		{
			var_dump($conn->error);
		}


		$nama_menu=$_POST['nama_menu'];
        $harga=$_POST['harga'];
        $description=$_POST['description'];
            
		$target="uploadimages/".basename($_FILES['image']['name']);
		$image=$_FILES['image']['name'];
		$image_tmp=$_FILES['image']['tmp_name'];

		if ($stmt->execute()) {



			if(move_uploaded_file($image_tmp, $target))
			{

				//echo "<script>alert('Movie Successfully Added');</script>";

			}
			else{

				//echo "<script>alert('Movie failed to add');</script>";



			}
		}


		$stmt->close();
		$_SESSION['msg']="Movie Successfully Added";
		header ("Location: crudfnb.php" );

	}
}


?>