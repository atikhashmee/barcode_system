		<?php 

				include 'header.php';
		
				?>

				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="well">
								<form class="form-inline" method="GET">
  <fieldset>
    <legend>Barcode Search</legend>
   
    
    <div class="form-group">
      <label for="exampleSelect1">Company ID</label>
      <select class="form-control" id="companyid">
       
                       <?php $qry = $db->joinQuery("SELECT `company_id`, `company_name` FROM `company`");
                       echo "<option> Sekect an Option </option>";
                        while ($row=$qry->fetch(PDO::FETCH_ASSOC)) {?>
                          <option value="<?php echo $row['company_id'];?>"><?php echo $row['company_name'];?></option>
                      <?php  }?>
      </select>
    </div>
     <div class="form-group">
      <label for="exampleSelect1">Orders</label>
      <select class="form-control" name="order-id" id="datashow">
        
      </select>
    </div>
    <div class="col-md-06">
    <button type="submit" name="search" class="btn btn-primary">Submit</button>
</div>
                                
  </fieldset>
</form>
			<button class="btn btn-success pull-right" onclick="printDiv('barcode')">Print</button>				
						
					</div>
					 <div class="col-md-12" id="barcode">
											
										
						
						
						
								<?php 
									if (isset($_GET['search'])) {
													
													$qry  = $db->joinQuery("SELECT * FROM `payment` WHERE `orderid`='".$_GET['order-id']."'");
													$i=0;
													$totalpaidamount=0;
									$totalamount = $db->joinQuery("SELECT max(`totalamount`)as max FROM `payment` WHERE `orderid`='".$_GET['order-id']."'")->fetch(PDO::FETCH_ASSOC);
													
													echo '<table class="table table-striped table-bordered">
														<tr>
															<th>SL</th>
															<th>Date</th>
															<th>Due</th>
															<th>Payment Amount</th>
															
														</tr>';
														

														while ($row= $qry->fetch(PDO::FETCH_ASSOC)) {$i++;
															$totalpaidamount += $row['payamount'];
															echo '<tr>
																<td>'.$i.'</td>
																<td>'.$row['paymentdate'].'</td>
																<td>'.$row['totalamount'].'</td>
																<td>'.$row['payamount'].'</td>
																
															</tr>';
														}
														echo '<tr>
															<td>leftover</td>
															<td>'.((int)$totalamount['max']-(int)$totalpaidamount).'</td>
														</tr>';
														
													echo '</table>';
													
									}
						
								?>
									</div>
							
						</div>
					</div>
				</div>

				

						

				<?php include 'footer.php';	?>	

			<script type="text/javascript">

					$("#companyid").change(function(event) {
						var id  = $(this).val();
						$.ajax({
							url: 'ajax/orderno.php?id='+id
						})
						.done(function(res) {
							console.log(res);
							$("#datashow").html(res);
							//alert(res);
						})
						.fail(function() {
							console.log("error");
						})
						.always(function() {
							console.log("complete");
						});
						
					});
					  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
			</script>
