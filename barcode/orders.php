     <?php include 'header.php';	?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Order ID</th>
								<th>Invoice No</th>
								<th>Package</th>
								<th>Price/SIM</th>
								<th>Quantity</th>
								<th>Action</th>
							</tr>

						</thead>
						<tbody>
							<?php 

								$qry =  $db->joinQuery("SELECT * FROM orders WHERE company_id=". $_GET['company-id']);
								
								while ($row = $qry->fetch(PDO :: FETCH_ASSOC)) { ?>
									<tr>
										<td><?php echo $row['order_id'];?></td>
										<td><?php echo $row['invoice_no'];?></td>
										<td><?php echo str_pad($row['package'], 2, '0', STR_PAD_LEFT);?></td>
										<td><?php echo $row['single_price'];?></td>
										<td><?php echo $row['quantity'];?></td>
										<td>
											<button class="btn btn-danger" onclick="javascript:window.location='barcode-show.php?order-id=<?=$row['order_id']?>';">View Barcodes</button>
										</td>
									</tr>
								<?php }

							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>


	<?php include 'footer.php';	?>	