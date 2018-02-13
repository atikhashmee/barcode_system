				<?php 
         include("../php/dboperation.php");
         include("../php/functions.php");
	     $obj = new Db();
		if (isset($_POST['id'])) {
			$id  =  $_POST['id'];
			
			$qry =  $obj->joinQuery("SELECT * FROM `orders` WHERE `order_id` = '$id'")->fetch(PDO::FETCH_ASSOC);
			$qrry = $obj->joinQuery("SELECT SUM(`payamount`) as total FROM `payment` WHERE `orderid` = '$id'")->fetch(PDO::FETCH_ASSOC);

				$quantity = intval($qry['quantity']);
				$price = intval($qry['single_price']);
				$totall = $quantity*$price;
			?>
			<input type="hidden" class="form-control" name="invoiceeeno" value="<?php echo $qry['invoice_no']; ?> " >
			<p> <strong>Company Name : </strong> <?php echo company($qry['company_id']); ?> </p><br>
			<p> <strong>Invoice No : </strong> <?php echo $qry['invoice_no']; ?> </p><br>
			<p> <strong>Unit Price : </strong> <?php echo $qry['single_price']; ?> </p><br>
			<p> <strong>Quantity : </strong> <?php echo $qry['quantity']; ?> </p><br>
			<p> <strong>Total  : </strong> <?php echo $quantity*$price; ?> </p><br>
			<?php 
				if ($qrry['total']>0) {
					$total = ($quantity*$price)-intval($qrry['total']);
					echo "<p> <strong>Paid  : </strong>  ".$qrry['total']."  </p><br>";
					echo "<p> <strong>Due  : </strong>  ".($totall-$qrry['total'])."  </p><br>";
					echo '<input type="hidden" class="form-control" name="totalamount" id="totalamount" value="'.$total.'" >';
				}else if($totall-$qrry['total']==0){
					echo "<p> <strong>status  : </strong>  Paid  </p><br>";
				}else{

			?>
			<input type="hidden" class="form-control" name="totalamount" id="totalamount" value="<?php echo $qry['quantity']*$qry['single_price']; ?>"  maxlength="" >
			
			<?php }	}


?>