
			<?php 

				include '../php/dboperation.php';
                $db = new Db();
                //echo $_GET['pack']." ".$_GET['company'];

                 $qry = $db->joinQuery("SELECT COUNT(*) as pack FROM `orders` WHERE `package`='".$_GET['pack']."' AND `company_id`='".$_GET['company']."'")->fetch(PDO::FETCH_ASSOC);
                 if ($qry['pack']>0) {
                        $rows = $db->joinQuery("SELECT `company_id`, MAX(range_max) as max FROM orders where `package`='".$_GET['pack']."' AND `company_id`='".$_GET['company']."'")->fetch(PDO::FETCH_ASSOC);
                        echo json_encode($rows);
                         
                 }

			?>