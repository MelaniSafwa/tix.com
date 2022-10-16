<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>	
	<br><br>
	<link rel="stylesheet" type="text/css" href="css/registration.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.min.css">
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

<body>

	<div class="bg" style="text-align: center;">

		<div class="container">  
			<form id="contact" action="customerpage.php" method="post" enctype="multipart/form-data">
				<h2  style="text-align: center;    font-family: cursive"><b>Bayar Sekarang!!</b></h2>
        <br>
        <table width="320" style="text-align: center;" >
        <tr>
        <tr>
            <td style="font-size:15px;">Kode Pembayaranmu:</td>
        </tr>
        <tr>
          <td><input style="text-align: center; font-size: 15px;" type="text" disabled id="kode" placeholder="" tabindex="1">
        </tr>
        </table>

				<input style="font-size: larger;background-color: #c2fbb8;font-family: cursive;font-weight: bold;" 
				class="" type="submit" name="submit" value="Bayar!!"> 
				<p class="copyright"></p>
				<p></p>


			</form>
			<div class="wrapper">
				<button class="btn btn-default" onclick="document.location.href='customerpage.php'" > <span class='glyphicon glyphicon-chevron-left'> </span>CANCEL</button>
			</div>

		</div>

	</div>
<script>

const kode = () => {
        let kode ='';
        let char = 'ABCDEFGHIJKLMNOPQRSXTUVWXYZabcdefghijklmnopqrstuvwxyz';
        for(let i=0; i<20; i++){
            kode+=char.charAt(Math.floor(Math.random()*char.length))
        }

        //set kode
        document.getElementById('kode').placeholder=kode;

    };
    kode(); 
</script>

</body>
</html> 

