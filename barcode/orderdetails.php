        <?php  include 'header.php';?>

          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="well">
                  <form action="#" class="form-inline">
                    <div class="form-group"><input type="search" id="search-btn" class="form-control" onkeyup="mysearch()" placeholder="Search by anything"></div>
                  </form>
                  <table class="table table-bordered table-striped" id="mytable">
                    <tr>
                      <th>SL</th>
                      <th>Order ID</th>
                      <th>Company</th>
                      <th>Invoice No</th>
                      
                      
                      <th>Unit Price</th>
                      <th>Quantity</th>
                      <th>Order Date</th>
                      <th>Delivery Date</th>
                      <th>Action</th>
                    </tr>
                    <?php   
                      $i=0;
                      $qry =  $db->selectAll("orders");
                      while ($row = $qry->fetch(PDO::FETCH_ASSOC)) {$i++;?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row['order_id']; ?></td>
                          <td><?php echo company($row['company_id']); ?></td>
                          <td><?php echo $row['invoice_no']; ?></td>
                         
                          <td><?php echo $row['single_price']; ?></td>
                          <td><?php echo $row['quantity']; ?></td>
                          <td><?php echo $row['order_date']; ?></td>
                          <td><?php echo $row['delivery_date']; ?></td>
                          <td>
                            <button class="btn btn-warning" onclick="javascript:window.location='order.php?order-id=<?=$row['order_id']?>';">Edit</button>|<button class="btn btn-danger" onclick="javascript:window.location='orderdetails.php?del-id=<?=$row['order_id']?>';">Del</button>|<button class="btn btn-info" onclick="javascript:window.location='barcode-show.php?order-id=<?=$row['order_id'];?>'">Barcodes</button>
                            

                          </td>
                        </tr>
                     <?php  }



                     ?>
                  </table>
                </div>
              </div>
            </div>
          </div>



          <!-- code for delete -->
<?php  
if (isset($_GET['del-id'])) {
  
  if ($db->joinQuery("DELETE FROM `orders` WHERE `order_id`='".$_GET['del-id']."'")) {
    ?>

    <script type="text/javascript">
   window.location.href="orderdetails.php";


</script>
    <?php


  }
}

?>

<!-- end -->

        <?php  include 'footer.php';?>
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
    </script>