<?php 

		include 'header.php';
		
		

			if (isset($_GET['msg'])) {?>
			<script type="text/javascript">alert("<?php echo $_GET['msg'];?>")</script>
			<?php }
		?>

	<h1 style="color: white; background-color:rgb(120, 120, 120); text-align: center;height: 50px; font-weight:200px; "> Welcome  <?php echo $_SESSION['username'];?>  </h1>	

<!DOCTYPE html>
<html lang="en">

<body>
	
	<head>
		

	<style type="text/css">
	


body, html{
		width: 100%;
		height: 100%;	
		margin: 0;
	
	}
	
#i1, #i2, #i3, #i4, #i5{ display: none;}

.container{
		margin: 0 auto;
		top: 20px;
		margin-top: 20px;
		position: relative;
		width: 90%;
		height: 0;
		padding-bottom: 35%;
	  user-select: none;
		background-color: #1c1c1c;
		border: solid 10px #616161;
		border-radius:10px ; 
	}

	.container .slide_img{
		position: absolute;
		width: 99%;;
		height: 100%;
	}
	.container .slide_img img{
		width: inherit;
		height: inherit;
	}

	 .prev, .next{
		width: 12%;
		height: inherit;
		position: absolute;
		top:0; 
		background-color: rgba(88, 88, 88,.2);
		color:rgba(244, 244, 244,.9);
		z-index: 99;
		transition: .45s;
		cursor: pointer;
		text-align: center;
	}

	.next{right:0;}
	.prev{left:0;}

	label span{
		position: absolute;
		font-size: 100pt;
		top: 50%;
	 	transform: translateY(-50%);
	}

	.prev:hover, .next:hover{
		transition: .3s;
		background-color: rgba(88, 88, 89,.8);
		color: #ffffff; 
	}

.container #nav_slide{
	width: 100%;
	bottom: 12%;
	height: 11px;
	position: absolute;
	text-align: center;
	z-index: 99;
	cursor: default;
}

#nav_slide .dots{
	top: -5px;
	width: 18px;
	height: 18px;
	margin: 0 4px;
	position: relative;
	border-radius: 100%;
	display: inline-block;
	background-color: rgba(0, 0, 0, 0.6);
	transition: .4s;
}

#nav_slide .dots:hover {
	cursor: pointer;
	background-color: rgba(255, 255, 255, 0.9);
	transition: .25s
}

.slide_img{z-index: -1;}

	#i1:checked ~ #one  ,
	#i2:checked ~ #two  ,
	#i3:checked ~ #three,
	#i4:checked ~ #four ,
	#i5:checked ~ #five 
	{z-index: 9; animation: scroll 1s ease-in-out;}

	#i1:checked  ~  #nav_slide #dot1,
	#i2:checked  ~  #nav_slide #dot2,
	#i3:checked  ~  #nav_slide #dot3,
	#i4:checked  ~  #nav_slide #dot4,
	#i5:checked  ~  #nav_slide #dot5
	{ background-color: rgba(255,255,255,.9);}

@keyframes scroll{
	0%{	opacity:.4;}
	100%{opacity:1;}
}		

 
@media screen and (max-width: 685px){
	.container{
		border: none;
		width: 100%;
		height: 0;
		padding-bottom: 55%; 
	}	
	
	label span { font-size: 50pt; }
	
	.prev, .next{
		width: 15%;
	}	
	#nav_slide .dots{
		width: 12px;
		height: 12px;
	}
}
@media screen  and(min-width: 970px){
	.me{ display: none;}
}
</style>
<meta charset="UTF-8">
	<title>Document</title>
	<link href="stylesheet" rel="stylesheet">
</head>

<div class="container">
	
	<input type="radio" id="i1" name="images" checked />
	<input type="radio" id="i2" name="images" />
	<input type="radio" id="i3" name="images" />
	<input type="radio" id="i4" name="images" />
	<input type="radio" id="i5" name="images" />	
	
	<div class="slide_img" id="one">			
			
			<img src="http://en.bumblebeetech.com/uploads/update/home/pict_0.png">
			
				<label class="prev" for="i5"><span>&#x2039;</span></label>
				<label class="next" for="i2"><span>&#x203a;</span></label>	
		
	</div>
	
	<div class="slide_img" id="two">
		
			<img src="http://en.bumblebeetech.com/uploads/2/8/8/7/28879919/792584.jpg " >
			
				<label class="prev" for="i1"><span>&#x2039;</span></label>
				<label class="next" for="i3"><span>&#x203a;</span></label>
		
	</div>
			
	<div class="slide_img" id="three">
			<img src="http://en.bumblebeetech.com/uploads/2/8/8/7/28879919/5236006_orig.jpg">	
			
				<label class="prev" for="i2"><span>&#x2039;</span></label>
				<label class="next" for="i4"><span>&#x203a;</span></label>
	</div>

	<div class="slide_img" id="four">
			<img src="http://en.bumblebeetech.com/uploads/update/fullfilment/fulfillment.png">	
			
				<label class="prev" for="i3"><span>&#x2039;</span></label>
				<label class="next" for="i5"><span>&#x203a;</span></label>
	</div>

	<div class="slide_img" id="five">
			<img src="http://en.bumblebeetech.com/uploads/2/8/8/7/28879919/9100326.jpg?915">	
			
				<label class="prev" for="i4"><span>&#x2039;</span></label>
				<label class="next" for="i1"><span>&#x203a;</span></label>

	</div>

	<div id="nav_slide">
		<label for="i1" class="dots" id="dot1"></label>
		<label for="i2" class="dots" id="dot2"></label>
		<label for="i3" class="dots" id="dot3"></label>
		<label for="i4" class="dots" id="dot4"></label>
		<label for="i5" class="dots" id="dot5"></label>
	</div>
		
</div>



 </body>
 
 </html>
<?php include 'footer.php'; ?>