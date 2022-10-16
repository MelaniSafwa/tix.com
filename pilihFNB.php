<?php 
if (!session_id()) {
# code...
	session_start();
} 
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://bootswatch.com/flatly/bootstrap.css" rel="stylesheet">
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-resultponsive-file-warning.js"></script><![endif]-->
  <script src="js/ie-emulation-modes-warning.js"></script>



  <!-- Custom styles for this template -->
  <link href="css/rotating-card.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/anotherDefault.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<body>
  <?php include_once 'header.php'; ?>

  <?php 
  if (!empty($_SESSION['msg'])) {
    echo "
    <p style='font-family: cursive; text-align: center; color: #5c865c; font-size: 2vw;'>".$_SESSION['msg']."</p>
    ";
    $_SESSION['msg']="";
    $_SESSION['movieId']="";
  }

  ?><div class="container">

  <div  class="panel with-nav-tabs panel-success">
    <div class="panel-heading">
      <ul class="nav nav-tabs">
        <li class=""><a href="customerPage.php" data-toggle="tab">Showing Now</a></li>
        <li class="active"><a href="pilihFNB.php" data-toggle="tab">Pilih FnB</a></li>
        <li class=""><a href="showCart.php" data-toggle="tab">My Cart FnB</a></li>
      </ul>
    </div>
    <h2 style="font: bold;"> Menu FnB </h2>
      <br>
      <div class="container">

<table class="table table-striped">
    <tr>
    <th>Menu</th>
		<th>Nama Menu</th>
		<th>Harga</th>
		<th>Action</th>
	</tr>

<?php
// Include our login information
require_once('db.php');
// Execute the query
$query = " SELECT id_menu as id_menu, image as image, nama_menu AS nama_menu, harga AS harga FROM menulist";
$result = $conn->query($query);
if (!$result){
   die ("Could not query the database: <br />". $db->error ."<br>Query: ".$query);
}
// Fetch and display the results


$i = 1;
while ($row = $result->fetch_object()){
	echo '<tr>';
    echo "'<td> <img width='200' src='uploadimages/".$row->image."'/> </td>'";
    echo '<td>'.$row->nama_menu.'</td>';
    echo '<td>'.$row->harga.'</td> ';
    echo '<td><a class="btn btn-primary" href="showCart.php?id='.$row->id_menu.'">Add to Cart</a></td>';
    echo '</tr>';
	$i++;
}
echo '</table>';
echo '<br />';?>
  </div>
</div>
</div>

</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>