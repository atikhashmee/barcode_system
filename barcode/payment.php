		<?php  include 'header.php';?>

					<div class="container">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<div class="well">
									  <form class="form-inline" method="POST">
		                <table class="table table-bordered">
		                 
						 <tr>
		          <div class="form-group">
		          <td><label for="pwd">Order ID:</label></td>
		          <td><input type="text" name="orderid" id="orderid" class="form-control" required max="99">
						<div id="datashowlist"></div>
						<div id="detailsshow"></div>
		          </td>
		          </div>
		        </tr> 
					 <tr>
		          <div class="form-group">
		          <td><label for="pwd">Payment</label></td>
		          <td><input type="Number" name="payment" id="payamount" class="form-control qntity"></td>
		          </div>
		        </tr>
		         <tr>
		          <div class="form-group">
		          <td><label for="pwd">Due</label></td>
		          <td><input type="Number" id="due" class="form-control qntity" disabled></td>
		          </div>
		        </tr>
					
		<tr><td></td><td><button type="submit" name="hit" class="btn btn-default">Submit</button></td> </tr>       

		             </table>
		             </form>

		               <?php 
		      			
		      				if (isset($_POST['hit'])) {
		      					$data = array(  'orderid' => $_POST['orderid'],
		      									'invoiceno' => $_POST['invoiceeeno'],
		      									'totalamount' => $_POST['totalamount'],
		      									'payamount' => $_POST['payment'],
		      									'paymentdate' => date("Y-m-d")
		      					 );
		      					 if ($db->insert("payment",$data)) {
		      					 			echo "<h3 style='color:blue'>Payment has been accomplished</h3>";
		      					 }else{
		      					 	echo "<h3 style='color:red'>Payment has not been accomplished</h3>";
		      					  }
		      				}
		      		
		      ?>

		    
								</div>
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>



		<?php  include 'footer.php';?>

		<script type="text/javascript">
			
			$("#orderid").on("keyup",function(event) {  // to get the order id while onkeyup typing
				/* Act on the event */
				var id = $(this).val();
				$.ajax({
					url: 'ajax/orderid.php',
					type: 'POST',
					data: {value: id }
				})
				.done(function(res) {
					console.log(res);
					$("#datashowlist").fadeIn();
					$("#datashowlist").html(res);
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
				
			}); //  end of order id

			$(document).on("click","#searchid",function(){ //  fading out on selecting order id from list
      $("#orderid").val($(this).text());
      $("#datashowlist").fadeOut();
  }); //  end fadeout list

			$("#orderid").on('blur', function(event) {//printing order details to be paid
				event.preventDefault();
				/* Act on the event */
			var orderid = $(this).val();
			$.ajax({
				url: 'ajax/gettheorderinformation.php',
				type: 'POST',
				dataType: 'html',
				data: {id : orderid},
			})
			.done(function(res) {
				console.log(res);
				$("#detailsshow").html(res);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
			});

			

			$("#payamount").on('blur', function(event) {  // field calculation
				event.preventDefault();
				/* Act on the event */
				$(this).attr('max',$("#totalamount").val());
				var due = $("#totalamount").val()-$(this).val();
				if (due<=0) {
					$("#due").val(0);
				}else{
					$("#due").val(due);
				}
				
			});

			
			
		</script>