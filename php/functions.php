		<?php 


				 
				require_once("dboperation.php");
				$db = new Db();
				function company($id)
				{
					$qry =   $GLOBALS['db']->joinQuery("SELECT  `company_name` FROM `company` WHERE `company_id`='$id'")->fetch(PDO::FETCH_ASSOC);
					echo $qry['company_name'];
				}


		?>