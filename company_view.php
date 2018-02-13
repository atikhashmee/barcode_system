     <?php include 'header.php';	?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered table striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Company Name</th>
								<th>Address</th>
								<th>Contact NO</th>
								<th>Mail Adress</th>
								<th>Web Address</th>
								<th>Action</th>
							</tr>

						</thead>
						<tbody>
							<?php 

								$qry =  $db->selectAll("company");
								$i=0;
								while ($row = $qry->fetch(PDO :: FETCH_ASSOC)) { $i++; ?>
									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $row['company_name'];?></td>
										<td><?php echo $row['address'];?></td>
										<td><?php echo $row['contact_no'];?></td>
										<td><?php echo $row['mail_address'];?></td>
										<td><?php echo $row['web_address'];?></td>
										<td>
											<button class="btn btn-warning" onclick="javascript:window.location='company.php?company-id=<?=$row['company_id']?>';">Edit</button>||
											<button class="btn btn-danger" onclick="javascript:window.location='company_view.php?del-id=<?=$row['company_id']?>';">Delete</button>||
											<button class="btn btn-danger" onclick="javascript:window.location='orders.php?company-id=<?=$row['company_id']?>';">View Orders</button>
										</td>
									</tr>
								<?php }

							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>


<!-- code for delete -->
<?php  
if (isset($_GET['del-id'])) {
	
	if ($db->joinQuery("DELETE FROM `company` WHERE `company_id`='".$_GET['del-id']."'")) {
		?>

		<script type="text/javascript">
   window.location.href="company_view.php";


</script>
		<?php


	}
}

?>

<!-- end -->

	<?php include 'footer.php';	?>	