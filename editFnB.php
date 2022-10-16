<?php 

require_once('db.php');
$id = $_GET['id'];

?>

<?php 
// mengecek apakah user belum menekan tombol submit
if (!isset($_POST["submit"])){
    $query = "SELECT  * FROM menulist WHERE id_menu=".$id."";
    // execute the query
    $result = $conn->query($query);
    if (!$result){
        die ("Could not query the database: <br />" . $db->error);
    } else{
        while ($row = $result->fetch_object()){
            $id_menu = $row->id_menu;
            $nama_menu = $row->nama_menu;
            $harga = $row->harga;
			$description = $row->description;
        }
    }
} else{
    $valid = TRUE; // flag validasi

    $nama_menu = $_POST['nama_menu'];
    if ($nama_menu == ''){
        $error_nama_menu = "nama menu is required";
        $valid = FALSE;
    }

    $harga = $_POST['harga'];
    if ($harga == ''){
        $error_harga = "hargais required";
        $valid = FALSE;
    }

	$description = $_POST['description'];
    if ($description == ''){
        $error_description = "description is required";
        $valid = FALSE;
    }

    // update data into database
    
    if ($valid){
		$nama_menu = $conn->real_escape_string($nama_menu);
        // asign a query
        $query = " UPDATE user SET nama_menu='".$nama_menu."', harga='".$harga."', description='".$description."', WHERE id_menu='".$id."' ";
        // execute the query
        $result = $conn->query($query);
        if (!$result){
            die ("Could not query the database: <br />" . $db->error . '<br>Query:' .$query);
        } else{
            $conn->close();
            header('Location: crudfnb.php');
        }
    }
}
?>

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