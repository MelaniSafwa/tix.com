<?php
  if (!session_id()) {
    session_start();
  }
  include_once ('db.php');
  ?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="#">

<title>Online Movie Tickets Management System</title>

<!-- Bootstrap core CSS -->
<!-- <link href="./movie_files/bootstrap.min.css" rel="stylesheet"> -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="https://bootswatch.com/flatly/bootstrap.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>
<!-- NAVBAR
  ================================================== -->
  <body style="background-color: #F1F1F1;">
    <div class="background">  
    <div class="navbar-wrapper">
      <div class="">

        <nav class="navbar navbar-custom navbar static-top" style="background-color: #1D3557; padding: #1D3557;">
          <div class="container" style="color:#FF731D;">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand align-items-center" href="index.php">
              <img class="mt-0" src="images/logo.png" widht="50" height="25" alt="">
              </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse float-right">
              <ul class="nav navbar-nav">
                <li><a href="index.php" style="color: grey;">Home</a></li>
                <li class="active"><a href="jadwal.php" style="color: white;">Jadwal Film</a></li>
                <li><a href="fnb.php" style="color: grey;">FnB</a></li>
                
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li>

                </li>
                <li><a href="javascript:void(0)" onclick="openLoginModal();" style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
              </ul>
            </div>
            
          </div>
        </nav>

      </div>
    </div>
    </div>


    <section class="showtime_page">
      <div class="container">

      <h2 style="font: bold;"> Jadwal Film yang Sedang Tayang </h2>
      <br>
      <table id="fresh-table" class="table" width="100%">
        <thead>
          <th data-field="name" data-sortable="true">Movie</th>
          <th data-field="shows">Shows</th>
          <th>Action</th>

        </thead>
        <tbody>

          <?php 

          $movieRes=$conn->query("select * from movielist;");
          while ($movieRow=$movieRes->fetch_object()) {

            ?>
            <tr>
              <td style="font-weight: bold;"><?php echo "".$movieRow->Name;?>

              </td>
              <td>

                <?php 

                $movieTime=$conn->query("select * from timeSlot;");
                while ($movieTimeRow=$movieTime->fetch_object()) {
                  echo " <span class='label label-primary' style='background-color: #FA991C'>".$movieTimeRow->time."</span>"; 

                } ?>
              </td>

              <td>
                <a href="javascript:void(0)" onclick="openLoginModal()"; class="btn btn-primary btn-xs" style="color: #BE2623; border-color:#BE2623;">Buy Ticket</a>
              </td>
            </tr>
            <?php  } ?>
          </tbody>


        </table>
      </div>
    </section>


    <div class="modal fade login" id="loginModal">
      <div class="modal-dialog login animated">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Login</h4>
          </div>

          <!-- login -->
          <div class="modal-body">  
            <div class="box">
              <div class="content">

                <div class="error"></div>


                <div class="form loginBox">
                  <form method="post" action="index.php" accept-charset="UTF-8">
                    <input id="userName" class="form-control" type="text" placeholder="Username" name="Username">
                    <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                    <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()" style="background-color: #1D3557;">
                  </form>
                </div>
              </div>
            </div>

            <!-- Registration -->

            <div class="box" id="RegistrationBox">
              <div class="content registerBox" style="display:none;">
                <div class="form">
                  <form method="post" html="{:multipart=>true}" data-remote="true" action="index.php" accept-charset="UTF-8">
                    <input id="registrationName" class="form-control" type="text" placeholder="username" name="username">
                    <input id="registrationPassword" class="form-control" type="password" placeholder="Password" name="password">
                    <input id="registrationPassword_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation">
                    <input class="btn btn-default btn-register" type="submit" value="Create account" name="commit" onclick=" RegistrationAjax(event)" style="background-color: #1D3557;">
                  </form>
                </div>


              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="forgot login-footer">
              <span>Looking to 
                <a href="javascript: showRegisterForm();">create an account</a>
                ?</span>
              </div>
              <div class="forgot register-footer" style="display:none">
                <span>Already have an account?</span>
                <a href="javascript: showLoginForm();">Login</a>
              </div>
            </div>        
          </div>
        </div>
      </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/main.js"></script>
    <?php include 'footer.php'; ?>
  </body>
  </html>
