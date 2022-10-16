<?php 
include 'db.php';
if (!session_id()) {
	session_start();
}
if (!(($_SESSION['user'])==1)) {
	header('Location: index.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Dashboard Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-success flex-md-nowrap p-0 shadow">
  <a class="fs-5 navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">
  <h4 class="fs-5 sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-uppercase">
          <span>
		  <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
			<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
			<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
			</svg>
		  <?php 
			$userId=$_SESSION['user'];
			$res=$conn->query("select * from user where userId='$userId';");
			$row=$res->fetch_object();
			echo "".$row->userName;
		  ?>
		  </span>
      </h4> 
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3 text-light" href="logout.php">Log out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">  
	  <ul class="nav flex-column mb-2">
			
          <li class="nav-item">
            <a class="nav-link" href="adminpage.php">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Movie
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="crudtheater.php">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Theater
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="crudTimeSlot.php">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Time Slot
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="crudorders.php">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Orders
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="crudfnb.php">
              <span data-feather="file-text" class="align-text-bottom"></span>
              FnB
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cruduser.php">
              <span data-feather="file-text" class="align-text-bottom"></span>
              User
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Theater</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="wrapper text-right">
				<button class="btn btn-dark" onclick="document.location.href='controller/addtheater.php'" > <span class='glyphicon'> </span>+ Tambah Data</button>
		  </div>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
        <tr>
                <th>Nama</th>
                <th>Kapasitas</th>
                <th>Action</th>
            </tr>
            <?php
            // TODO 1: Buat koneksi dengan database
            require_once('db.php');

            // TODO 2: Tulis dan eksekusi query ke database
            $query = " SELECT theaterId as id, theaterName as Nama, seat as seat from theater ORDER BY theaterId ";
            $result = $conn->query($query);
            if (!$result){
               die ("Could not query the database: <br />". $conn->error ."<br>Query: ".$query);
            }

            // TODO 3: Parsing data yang diterima dari database ke halaman HTML/PHP
            $i = 1;
            while ($row = $result->fetch_object()){
                echo '<tr>';
                echo '<td>'.$row->Nama.'</td> ';
                echo '<td>'.$row->seat.'</td> ';
                echo '<td>
                        <a class="btn btn-danger btn-sm" href="delete_theater.php?id='.$row->id.'">Delete</a>
                        </td>';
                echo '</tr>';
                $i++;
            }
            echo '</table>';
            echo '<br />';
            echo 'Total Rows = '.$result->num_rows;
            

            // TODO 4: Lakukan dealokasi variabel $result
            $result->free();

            // TODO 5: Tutup koneksi dengan database
            $conn->close();

            ?>

        </table>
      </div>
    </main>
  </div>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
