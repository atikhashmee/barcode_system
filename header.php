<?php 
include 'php/dboperation.php';
include 'php/functions.php';
$db = new Db();
?>

    
     <?php  if(!isset($_SESSION)){
                    session_start(); // starting session for checking username
                }
                if($_SESSION['u_id']  == "")
                {
                    header("location:index.php"); // Redirect to login.php page
                }

                

?>

<!DOCTYPE html>
<html>
<head>
	<title>Barcode Generator</title>
	<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/jquery-ui.css">

</head>
<body>


  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php">Barcode Generator</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        <li class="active"><a href="company.php">Company<span class="sr-only"></span></a></li>
        <li class="active"><a href="order.php">Order <span class="sr-only"></span></a></li>
         <li class="active"><a href="bar.php">Barcode <span class="sr-only"></span></a></li>
        <li class="active"><a href="orderdetails.php">Order Details<span class="sr-only"></span></a></li>
        
        <li class="active"><a href="payment.php">Payment Information <span class="sr-only"></span></a></li>
        <li class="active"><a href="order-payment.php">Order Payment history <span class="sr-only"></span></a></li>
        <li class="active"><a href="report.php">Report <span class="sr-only"></span></a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">

        
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://en.bumblebeetech.com/" target="_blank"">About us</a></li>
            <li><a href="logout.php">Logout</a></li>
            
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

