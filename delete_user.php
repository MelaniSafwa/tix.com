<!DOCTYPE HTML> 
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body> 
<br>
	<div class="container">
    <?php
		$id = $_GET['id'];
		// include our login information
		require_once 'db.php' ;
        $query = " DELETE FROM user WHERE userId= '$id' ";
        $result = $conn->query( $query );
		if (!$result){
			die ("Could not query the database: <br />". $db->error);
		} else{
			$conn->close();
			header('Location: cruduser.php');
		}
		// close db connection
		$conn->close();
		?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	</div>
</body>
</html>