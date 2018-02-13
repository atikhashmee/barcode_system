



<!DOCTYPE html>
<html lang="en">
<head>
	
	<style type="text/css">

	 body 
	 {
 margin: 0;
 padding: 0;
 background:url(images/bumblebee.jpg); 
 background-size: cover;
 font-family: sans-serif;
}

.loginBox {
	position:absolute;
    top:80%;
    left: 50%;
    transform: translate(-50%,-80%);
    width: 250px;
    height: 200px;
    padding: 80px 40px;
    box-sizing: :border-box;
    background:rgba(0,0,0,.5);

}
.loginBox p
{
	margin: 0;
	padding: 0;
	font-weight: bold;
	color: #fff;

}
.loginBox input
{

	width: 100%
	margin-bottom: 10px;
}
.loginBox input[type="text"],
.loginBox input[type="password"]
{
	border: none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline: none;
	height: 40px;
	color: #fff;
	font-size: 16px;

}
::placeholder
{
	color:rgba(255,255,255,5);
}
button[type=submit]
{
	border: none;
	outline: none;
	height: 30px;
	width: 150px;
	color: #fff;
	background: #ff267e;
	cursor: pointer;
	border-radius: 20px;
	position: absolute;
	text-align: center;
}
button[type=submit]:hover
{
	background: #efed40;
	color: #262626;
	text-align: center;
	

}
.loginBox a
{
	color: #fff;
	font-size: 14px;
	font-weight: bold;
}

</style>
	<meta charset="UTF-8">
	<title>Login </title>
	<link href="/css/" rel="stylesheet">
</head>
 <?php  
                 
         if (isset($_GET['msg'])) {?>
          <script type="text/javascript">alert("<?php echo $_GET['msg'];?>")
          window.location.href="index.php";
        </script>
          <?php } ?>

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
        	<form action="php/login.php" method="POST">
             <div class="loginBox">
            	<h4 style="color:white;font-size: 100%;text-align: center;font-family: verdana;">Please login first</h4>
            	<p>Enter Username</p>
            <input type="text" id="userName" name="name" class="form-control input-sm chat-input" placeholder="username">
            </br>
            <p>Enter Password</p>
            <input type="password" id="defaultForm-pass" name="password" class="form-control" placeholder="Password">
       
            <br>
            <br>
            <div class="button">
            <span class="group-btn">     
                <button type="submit" name="btn"><i class="fa fa-sign-in">Login</i></button>
            </span>
            </div>
            </form>
            </div>

        
        </div>
    </div>
</div>
<script src="assets/js/jquery-3.1.1.js" ></script>

    <script src="assets/js/popper.min.js" ></script>

    <script src="assets/js/bootstrap.min.js" ></script>
<!-- need to extract the code from the web before deploye -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</html>
