			

			<?php 

				include '../php/dboperation.php';
                $db = new Db();

                if (isset($_POST['id'])) {
                	$id = $_POST['id'];
                	$qry =  $db->selectAll("orders","WHERE `invoice_no` = '$id'");
                	if ($qry->rowCount() != 0) {
                		echo "invoice no , is already exist, try another one";
                	}
                }


			?>