		<?php 

				include 'header.php';
			$order = $db->joinQuery("SELECT * FROM orders WHERE order_id=".$_GET['order-id'])->fetch(PDO::FETCH_ASSOC);
			$company = $db->joinQuery("SELECT * FROM company WHERE company_id=".$order['company_id'])->fetch(PDO::FETCH_ASSOC);
				
				$sim_code = $company['sim_code']; // this line gets the sim number I.e 017,018,016,019 
				$package_no = str_pad($order['package'], 2, '0', STR_PAD_LEFT);/*this line gets you the package

							str_pad funtions adding 2 zeros after the package.so basically this line is giving 
							0193500,0173500,0183500 etc etc. 
				 */

				function getNumber($num) {  /* and finally this function is returning the complete sim number  */
					return $GLOBALS['sim_code'] . $GLOBALS['package_no'] . str_pad($num, 6, '0', STR_PAD_LEFT);
					/*
					 as mentioned above $GLOBALS['sim_code'] = 017 and $GLOBALS['package_no']=3500 
					 and again str_pad is giving another six digit after package 
					 so the scenario of this function sort of like this 
					 01735000000

					 */
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
										<span  class="text-center"><?=getNumber($row['number'])?></span> <!-- 

										and when we invoke /call this getNumber(1) function, it adds the value at the end of the 
										number so , before it was 017350000000 , now it would be 0173500000001, and in every iteration 
										the value will be increased and sim number would be generated accordingly.  
										 -->
								     	<img    src="generator.php?text=<?=getNumber($row['number'])?>.<?=$row['pincode']?>.<?=$row['pukcode']?>"  class="responsive duke" dataid="<?=$row['sim_id']?>"/>
								     	<!-- this is simply giving us the barcode image with help of library    nothing else . and showing us the information we added here to be showen -->
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
