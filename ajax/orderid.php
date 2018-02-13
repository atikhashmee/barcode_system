<?php 
         include("../php/dboperation.php");
	     $obj = new Db();
		if (isset($_POST['value'])) {
			$id  =  $_POST['value'];
			$qry = $obj->joinQuery("SELECT `order_id` FROM `orders` WHERE `order_id` ='$id'");
			$output ='';
			$output = "<ul class='ulsearch'>";
			if ($qry->rowCount()>0) {
				while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
			    $output .="<li id='searchid'>".$row['order_id']."</li>";
			}
			}else{

				$output .= "<li>Data not found </li>";
			}
			$output .="</ul>";
			echo $output;
			
		}


?>