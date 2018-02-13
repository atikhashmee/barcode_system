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
											$order = $db->joinQuery("SELECT * FROM orders WHERE order_id=".$_GET['order-id'])->fetch(PDO::FETCH_ASSOC);
			$company = $db->joinQuery("SELECT * FROM company WHERE company_id=".$order['company_id'])->fetch(PDO::FETCH_ASSOC);
				
				$sim_code = $company['sim_code'];
				$package_no = str_pad($order['package'], 2, '0', STR_PAD_LEFT);
				 
				function getNumber($num) {
					return $GLOBALS['sim_code'] . $GLOBALS['package_no'] . str_pad($num, 6, '0', STR_PAD_LEFT);
				}
										$qry = $db->joinQuery("SELECT * FROM generated_sim WHERE order_id=".$_GET['order-id']);
									while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {?>
										<div class="col-md-4">
											<div class="well">
											<div class="panel panel-default">
								     <div class="panel-body" >
										<span  class="text-center"><?=getNumber($row['number'])?></span>
								     	<img    src="generator.php?text=<?=getNumber($row['number'])?>.<?=$row['pincode']?>.<?=$row['pukcode']?>"  class="responsive duke" dataid="<?=$row['sim_id']?>"/>
								     </div>
								     <div class="panel-footer">
								     	<p>PIN CODE: <?php echo $row['pincode']; ?> </p> 
								     	<p>PUK CODE: <?php echo $row['pukcode']; ?></p>  
								     	<p>Date: <?php echo $row['date']; ?></p> 
								     </div>
								    </div>
								    </div>
										</div>
									<?php }
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
