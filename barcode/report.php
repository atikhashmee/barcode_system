			<?php  include 'header.php';  ?>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="well">
								<form action="" class="form-inline" method="POST">
									<div class="form-group"><label for="">start</label><input type="date" name="start" class="form-control" required="true"></div>
									<div class="form-group"><label for="">End</label><input type="date" name="end" class="form-control" required="true"></div>
									<div class="form-group"><label for="">Report Type</label>
									<select name="reportoption">
										<option value="">Select an option</option>
										<option value="1">Order</option>
										<option value="2">Payment</option>
									</select>
									</div>
									<button class="btn btn-success" name="search_btn">search</button>
								</form>
							</div>
						</div>
						<div class="col-md-12">
							<div class="well">
								<?php 

									if (isset($_POST['search_btn'])) {
										if ($_POST['reportoption']=="2") {?>
											<button class="btn btn-success pull-right" onclick="printDiv('paymentdiv')">Print</button>
											<?php echo "<div id='paymentdiv'>";
											echo '<table class="table table-striped table-bordered" id="datatable">
									<tr>
										<th>SL</th>
										<th>PaymentID</th>
										<th>Order ID</th>
										<th>Invoice</th>
										<th>Total Amount</th>
										<th>Payment Amount</th>
										<th>Due</th>
										<th>Date</th>
									</tr>';
									
									$i=0;
									$totalamount = 0;
									$payamount = 0;
									$due = 0;
										$qry = $db->selectAll("payment"," `paymentdate` BETWEEN '".$_POST['start']."' AND '".$_POST['end']."'");
										while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {
											$totalamount += (int)$row['totalamount'];
											$payamount += (int)$row['payamount'];
											$due += ((int)$row['totalamount']-(int)$row['payamount']);
											$i++;
					                     echo "<tr>
												<td>".$i."</td>
												<td>".$row['paymentid']."</td>
												<td>".$row['orderid']."</td>
												<td>".$row['invoiceno']."</td>
												<td>".$row['totalamount']."</td>
												<td>".$row['payamount']."</td>
												<td>".((int)$row['totalamount']-(int)$row['payamount'])."</td>
												<td>".$row['paymentdate']."</td>
											</tr>";
										}
										echo "<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td>".number_format($totalamount)."</td>
											<td>".number_format($payamount)."</td>
											<td>".number_format($due)."</td>
										</tr>";

									
								echo '</table>';
								echo "</div>";
										}else if ($_POST['reportoption']=="1") {
													$sdate = new DateTime($_POST['start']);
													$edate = new DateTime($_POST['end']);
													if ($sdate != date_format($sdate,"m/d/Y")) {
														$sdate = date_format($sdate,"m/d/Y");
													}

													if ($edate != date_format($edate,"m/d/Y")) {
														$edate = date_format($edate,"m/d/Y");
													}




											?>
		<form action="#" class="form-inline">
                    <div class="form-group"><input type="search" id="search-btn" class="form-control" onkeyup="mysearch()" placeholder="Search by anything"></div>
                  </form>
                 <button class="btn btn-success pull-right" onclick="printDiv('ordertable')">Print</button>
                 <div id="ordertable">
                  <table class="table table-bordered table-striped" id="mytable">
                    <tr>
                      <th>SL</th>
                      <th>Order ID</th>
                      <th>Company</th>
                      <th>Invoice No</th>
                      <th>Package</th>
                      <th>Unit Price</th>
                      <th>Quantity</th>
                      <th>Order Date</th>
                      <th>Delivery Date</th>
                      
                    </tr>
                    <?php   
                      $i=0;
                      $qry =  $db->selectAll("orders","`order_date` BETWEEN '".$sdate."' AND '".$edate."'");
                      while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {$i++;?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row['order_id']; ?></td>
                          <td><?php echo company($row['company_id']); ?></td>
                          <td><?php echo $row['invoice_no']; ?></td>
                          <td><?php echo $row['package']; ?></td>
                          <td><?php echo $row['single_price']; ?></td>
                          <td><?php echo $row['quantity']; ?></td>
                          <td><?php echo $row['order_date']; ?></td>
                          <td><?php echo $row['delivery_date']; ?></td>
                          
                        </tr>
                     <?php  }



                     ?>
                  </table>
                  </div>

											
					<?php }}?>
								
							</div>
						</div>
					</div>
				</div>
			<?php  include 'footer.php';  ?>


		<script type="text/javascript">
			jQuery(document).ready(function($) {
				//alert("Hello world");
			});
		</script>
		<script type="text/javascript">
      function mysearch()
      {
           var input, filter, table, tr, td, i;
                    
                  var  filter =  $("#search-btn").val().toLowerCase();
                    $.each($("#mytable tbody tr"),function() {
                      if ($(this).text().toLowerCase().indexOf(filter)===-1) {
                          $(this).hide();
                      }else{
                        $(this).show();
                      }
                    });
      }
       function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>



