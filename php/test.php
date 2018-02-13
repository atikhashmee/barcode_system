


<?php 

	include("dboperation.php");
	$db = new Db();
		$data =  array(
			'e_name' =>'atik',
			'e_adress' =>'feni',
			'e_number' =>'017356'
			 );
		
		$db->insert("customer",$data);



?>