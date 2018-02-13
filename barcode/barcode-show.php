		<?php 

				include 'header.php';
			$order = $db->joinQuery("SELECT * FROM orders WHERE order_id=".$_GET['order-id'])->fetch(PDO::FETCH_ASSOC);
			$company = $db->joinQuery("SELECT * FROM company WHERE company_id=".$order['company_id'])->fetch(PDO::FETCH_ASSOC);
				
				$sim_code = $company['sim_code'];
				$package_no = str_pad($order['package'], 2, '0', STR_PAD_LEFT);
				 
				function getNumber($num) {
					return $GLOBALS['sim_code'] . $GLOBALS['package_no'] . str_pad($num, 6, '0', STR_PAD_LEFT);
				}
				?>

				<div class="container">
				
								<?php 

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
								?>
								
							
						</div>
					</div>
				</div>

				

						

				<?php include 'footer.php';	?>	

			<script type="text/javascript">
					$(".duke").mouseover(function(){
						var id = $(this).attr("dataid");
						//alert(id);
						$.ajax({
							url: 'ajax/barcodedetails.php',
							type: 'POST',
							dataType: 'html',
							data: {id: id},
						})
						.done(function() {
							console.log("success");
						})
						.fail(function() {
							console.log("error");
						})
						.always(function() {
							console.log("complete");
						});
						
					})

					  function printPDF() {
    var printDoc = new jsPDF();
    printDoc.fromHTML($('#barcode').get(0), 20, 20, {'width': 200});
    printDoc.autoPrint();
    printDoc.output("dataurlnewwindow"); // this opens a new popup,  after this the PDF opens the print window view but there are browser inconsistencies with how this is handled
       }
			</script>
