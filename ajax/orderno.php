<?php 

		 include("../php/dboperation.php");
           $db = new Db();
        $qry = $db->joinQuery("SELECT `order_id` FROM `orders` WHERE `company_id`='".$_GET['id']."'");
				echo "<option>Select an option</option>";
				//print_r($qry);
				while ($r = $qry->fetch(PDO::FETCH_ASSOC)) {
					echo "<option>".$r['order_id']."</option>";
				 }
		 ?>