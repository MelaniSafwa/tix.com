<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://bootswatch.com/flatly/bootstrap.css" rel="stylesheet">
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="js/ie-emulation-modes-warning.js"></script>



  <!-- Custom styles for this template -->
  <link href="css/rotating-card.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/anotherDefault.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<body>
  <?php include_once 'header.php'; 
  $id = $_GET['id'];
  if($id != ""){
    //jika $_SESSION['cart'] belum ada, maka inisialisasi dengan array kosong
    //$_SESSION['cart'] merupakan array assosiatif
    //indeksnya berisi isbn buku yang dipilih
    //value-nya berisi jumlah (qty) dari buku dengan isbn tersebut
    if (!isset($_SESSION['cart'])){
      $_SESSION['cart'] = array();
    }
    //jika $_SESSION['cart'] dengan indeks isbn buku yang dipilih sudah ada, tambahkan value-nya dengan 1, jika belum ada, buat elemen baru dengan indeks tersebut dan set nilainya dengan 1
    if (isset($_SESSION['cart'][$id])){
      $_SESSION['cart'][$id]++;
    }else{
      $_SESSION['cart'][$id] = 1;
    }
  }
  ?>

  <div class="container">

  <div  class="panel with-nav-tabs panel-success">
    <div class="panel-heading">
      <ul class="nav nav-tabs">
        <li class=""><a href="customerPage.php" data-toggle="tab">Showing Now</a></li>
        <li class=""><a href="pilihFNB.php" data-toggle="tab">Pilih FnB</a></li>
        <li class="active"><a href="showCart.php" data-toggle="tab">My Cart FnB</a></li>
      </ul>
    </div>
    <div class="panel-body">
      <div class="tab-content">
        <div class="tab-pane fade in active" id="nowshowing">
        <table class="table table-striped">
          <tr>
          <th>Nama Menu</th>
          <th>Harga</th>
          <th>Qty</th>
          <th>Price * Qty</th>
          </tr>
    <?php 
    require_once('db.php');
    $sum_qty = 0; //inisialisasi total item di shopping cart
    $sum_price = 0; //inisialisasi total price di shopping cart
    if (is_array($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $id => $qty){
          $sql = " SELECT * FROM menulist WHERE id_menu='".$id."'";
          $result = $conn->query($sql);
          if (!$result){
            die ("Could not query the database: <br>". $db->error ."<br>Query: ".$query);
          }
          while ($row = $result->fetch_object()){
            echo '<tr>';
            echo '<td>'.$row->nama_menu.'</td>';
            echo '<td> '.$row->harga.'</td> ';
            echo '<td>'.$qty.'</td>';
            echo '<td>'.$row->harga * $qty.'</td>';
            echo '</tr>';
            $sum_qty = $sum_qty + $qty;
            $sum_price = $sum_price + ($row->harga * $qty);
          }
        }
        echo'<tr><td></td><td></td><td>'.$sum_qty.'</td><td>'.$sum_price.'</td></tr>';
        $result->free();
        $conn->close();
    }else{
        echo '<tr><td colspan="6" align="center">There is no item in shopping cart</td></tr>';
      }

    
    ?>


        </table> 
        Total items = <?php echo $sum_qty; ?><br><br>
        <a class="btn btn-primary" href="pilihFNB.php">Continue Shopping</a>
        <a class="btn btn-danger" href="delete_cart.php">Empty Cart</a>
        <a class="btn btn-success" href="bayar.php">Bayar Sekarangt</a>
        <br /><br />
    </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>




      </div>
    </div>
  </div>
</div>
</div>

</div>
</div>
</body>
</html>