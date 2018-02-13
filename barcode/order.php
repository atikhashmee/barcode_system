<?php include'header.php';



?>



<div class="container">
    <div class="row">
        <?php if(!empty($_POST)) { ?>
            <div class="col-md-12">
                <?php

                if (isset($_POST['hit'])) {

                    $invoice_no = $db->joinQuery("SELECT COUNT(*) as max FROM orders WHERE company_id=".$_POST['company']);
                    $invoice = $invoice_no->fetch(PDO::FETCH_ASSOC);
                    $data = array(
                        'company_id' => $_POST['company'],
                        'invoice_no' => ++$invoice['max'],
                        'package' => $_POST['package'],
                        'range_min' => $_POST['min'],
                        'range_max' => $_POST['max'],
                        'single_price'=>$_POST['singleprice'],
                        'quantity' => $_POST['qtity'],
                        'order_date' => $_POST['orderdate'],
                        'delivery_date' => $_POST['delivery_date']
                    );
                    if ($db->insert("orders",$data)) {
                        $order_id = $db->getInsertId();
                        //mass populate

                        $number = intval($_POST['min']);
                        $max = intval($_POST['qtity']);
                        for($i=0;$i<$max;$i++) {
                            $data = [
                                'order_id' => $order_id,
                                'number' => $number++,
                                'pincode'   => mt_rand(1000, 9999),
                                'pukcode'   => mt_rand(1000, 9999),
                                'date'      => date("Y-m-d"),
                                'generatedby'  => $_SESSION['u_id']
                            ];
                            $db->insert("generated_sim",$data);
                        }
                        ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Success!</strong> Data has been saved <a href="bar.php">Go to barcode</a>
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error!</strong> Could not save data
                        </div>
                        <?php
                    }
                }

                ?>
            </div>
        <?php } ?>
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="well">

                <?php
                if (isset($_GET['order-id'])) {

                    $order= $db->selectAll("orders","order_id='".$_GET['order-id']."'")->fetch(PDO::FETCH_ASSOC);

                    echo '<form class="form-inline" method="POST" onsubmit="return validate()">
                <table class="table table-bordered table-striped">
                  <tr>
                    <div class="form-group">
                    <td>
                      <label for="email">Company</label>
                    </td>
                    <td>
                      <select name="company" id="company" class="form-control" required="true">';?>
                    <option value="<?php echo $order['company_id']; ?>"><?php echo company($order['company_id']); ?></option>

                    <?php $qry = $db->joinQuery("SELECT `company_id`, `company_name` FROM `company`");
                    while ($row=$qry->fetch(PDO::FETCH_ASSOC)) {?>
                        <option value="<?php echo $row['company_id'];?>"><?php echo $row['company_name'];?></option>
                    <?php  }

                    echo'
          </select>
          <p style="color: red">*</p>
                    </td>
                    </div>
                  </tr>
          
    
        <tr>
          <div class="form-group">
          <td><label for="pwd">Package:</label></td>
          <td><input type="number" name="package" class="form-control" required max="99" value="'.$order['package'].'"></td>
          </div>
        </tr>
               
        <tr>
          <div class="form-group">
          <td><label for="pwd">Number Range:</label></td>
          <td>
      Available range starts from <span id="starts-from">0</span><br/>
  <input type="Number" name="min" class="form-control" id="min" placeholder="min" required="true" value="'.$order['range_min'].'">
      <p style="color: red">*</p>:<input type="Number" class="form-control" id="max" name="max" placeholder="max" required="true" value="'.$order['range_max'].'" >
      <p style="color: red">*</p>
      </td>
          
          </div>
        </tr>

        <tr>
          <div class="form-group">
          <td><label for="pwd">Quantity:</label></td>
          <td><input type="Number" class="form-control qntity" disabled><input type="hidden" name="qtity" class="qntity"       value="'.$order['quantity'].'"></td>
          </div>
        </tr>

        <tr>
          <div class="form-group">
          <td><label for="pwd">Single Price:</label></td>
          <td><input type="Number" name="singleprice" id="singleprice" class="form-control"value="'.$order['single_price'].'"></td>
          </div>
        </tr>

         <tr>
          <div class="form-group">
          <td><label for="pwd">Total:</label></td>
          <td><input type="text" id="totalmoney" class="form-control" disabled></td>
          </div>
        </tr>

        <tr>
          <div class="form-group">
          <td><label for="pwd">Order Date :</label></td>
          <td><input type="text" name="orderdate" id="order_date" class="form-control" value="'.$order['order_date'].'" ></td>
          </div>
        </tr>

        <tr>
          <div class="form-group">
          <td><label for="pwd">Delivery date:</label></td>
          <td><input type="text" id="delivery_date" name="delivery_date"   value="'.$order['delivery_date'].'" class="form-control" required="true"><p style="color: red">*</p></td>
          </div>
        </tr>
<tr><td></td><td><button type="submit" name="btn_update" class="btn btn-info">Update</button></td> </tr>       

        </table>
      </form>';

                }

                else{


                    echo ' <form class="form-inline" method="POST" onsubmit="return validate()">
                <table class="table table-bordered">
                  <tr>
                    <div class="form-group">
                    <td>
                      <label for="email">Company</label>
                    </td>
                    <td>
                      <select name="company" id="company" class="form-control" required="true">
                        <option value="">Select an option</option>';

                    $qry = $db->joinQuery("SELECT `company_id`, `company_name` FROM `company`");
                    while ($row=$qry->fetch(PDO::FETCH_ASSOC)) {?>
                        <option value="<?php echo $row['company_id'];?>"><?php echo $row['company_name'];?></option>
                    <?php  }

                    echo'
          </select>
          <p style="color: red">*</p>
                    </td>
                    </div>
                  </tr>
          
    
        <tr>
          <div class="form-group">
          <td><label for="pwd">Package:</label></td>
          <td><input type="text" name="package" class="form-control" id="package" required max="99" maxlength="2"  min="0"></td>
          </div>
        </tr>
               
        <tr>
          <div class="form-group">
          <td><label for="pwd">Number Range:</label></td>
          <td>
          <span id="showmsg"></span>
      Available range starts from <span id="starts-from">1</span><br/>
            <input type="Number" name="min" class="form-control" id="min" placeholder="min" required="true" min="1" value="1" readonly>
      <p style="color: red">*</p>:<input type="text" class="form-control" id="max" maxlength="6" name="max" placeholder="max" required="true">
      <p style="color: red">*</p>
      </td>
          
          </div>
        </tr>

        <tr>
          <div class="form-group">
          <td><label for="pwd">Quantity:</label></td>
          <td><input type="Number" name="qtity" class="form-control qntity" min="0" readonly>
          
          </td>
          </div>
        </tr>

        <tr>
          <div class="form-group">
          <td><label for="pwd">Single Price:</label></td>
          <td><input type="Number" name="singleprice" id="singleprice" class="form-control"></td>
          </div>
        </tr>

         <tr>
          <div class="form-group">
          <td><label for="pwd">Total:</label></td>
          <td><input type="text" id="totalmoney" class="form-control" disabled></td>
          </div>
        </tr>

        <tr>
          <div class="form-group">
          <td><label for="pwd">Order Date :</label></td>
          <td><input type="text" name="orderdate" id="order_date" class="form-control" ></td>
          </div>
        </tr>

        <tr>
          <div class="form-group">
          <td><label for="pwd">Delivery date:</label></td>
          <td><input type="text" id="delivery_date" name="delivery_date" class="form-control" required="true"><p style="color: red">*</p></td>
          </div>
        </tr>
<tr><td></td><td><button type="submit" name="hit" class="btn btn-default">Submit</button></td> </tr>       

        </table>
      </form>';

                }


                if (isset($_POST['btn_update'])) {

                    $invoice_no = $db->joinQuery("SELECT COUNT(*) as max FROM orders WHERE company_id=".$_POST['company']);
                    $invoice = $invoice_no->fetch(PDO::FETCH_ASSOC);
                    $data = array(
                        'company_id' => $_POST['company'],
                        'invoice_no' => $invoice['max'],
                        'package' => $_POST['package'],
                        'range_min' => $_POST['min'],
                        'range_max' => $_POST['max'],
                        'single_price' => $_POST['singleprice'],
                        'quantity' => $_POST['quantity'],
                        'order_date' => $_POST['orderdate'],
                        'delivery_date' => $_POST['delivery_date']
                    );
                    if ($db->update("orders",$data,"order_id= ".$_GET['order-id'])) {
                        echo "<p style=color:blue>Success</p>";
                    }else{
                        echo "<p style=color:red>Error</p>";
                    }
                }

                ?>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php include 'footer.php'; ?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script type="text/javascript">

    <?php

    $rows = $db->joinQuery("SELECT `company_id`, MAX(range_max) as max FROM orders GROUP BY company_id");
    $nums = [];
    while($row = $rows->fetch(PDO::FETCH_ASSOC)) {
        $nums[intval($row['company_id'])] = intval($row['max']);
    }

    ?>
    var maxNums = <?=json_encode($nums);?>;
    

    function updateRange() {
        var selectedCompany = $("#company").val();
        var start = 0;
        if(maxNums[selectedCompany] !== undefined) {
            start += maxNums[selectedCompany];
        }
        start += 1;
        var el = $("#starts-from");
        el.text(start);
        el.attr('min', start);
        $("#min").attr('min',start);
        $("#min").val(start);
    }
    $(document).ready(function() {
        //$("#company").change(updateRange);

        $("#invoiceid").on('blur', function(event) {
            event.preventDefault();
            /* Act on the event */
            // $("#showmsg").text("Hello wrold");

            $.ajax({
                url: 'ajax/invoicecheck.php',
                type: 'POST',

                data: {id: $(this).val() },
            })
                .done(function(res) {
                    $("#showmsg").text(res);
                    console.log(res);
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });

        });

        $("#singleprice").on('blur', function(event) {
            event.preventDefault();
            /* Act on the event */
            $("#totalmoney").val($(this).val()* $(".qntity").val());
        });

        $("#max").on('blur', function(event) {
            event.preventDefault();
            var qun = ($(this).val()-$("#min").val())+1;
            if (qun<=0) {
              $(".qntity").val(0);
            }else{

               $(".qntity").val(qun);
            }
           
        });


        $("#order_date").datepicker({
          minDate: new Date()
        });

        $("#delivery_date").datepicker({
          minDate : new Date()
        });


    });//end of ready function


 /*   window.validate = function(form) {
        var quantity = $(".qntity").val();
        var order_date = $("#order_date").datepicker('getDate');
        var delivery_date = $("#delivery_date").datepicker('getDate');

        if(quantity < 1)
        {
            alert("Quantity can not be less than 1");
            return false;
        }
        var now = new Date();
        now.setHours(0,0,0,0);
        if (order_date < now) {
            alert("Order date can not be in the past.");
            return false;
        }
        if(delivery_date < order_date) {
            alert("Delivery date can not be before order date.");
            return false;
        }


    }*/


    $("#package").on("blur",function(){
     
       $.ajax({
                url: 'ajax/checkpack.php',
                data:{
                  pack:$(this).val(),
                  company:$("#company").val()
                }
                
                
            }).done(function(res) {
             var obj = JSON.parse(res)
              
               // $("#showmsg").text(res);
                $("#starts-from").text(obj.max);
                $("#min").attr("min",obj.max);
                $("#min").val(obj.max);
              
                   
                  //  if (res=="yes") {
                       //updateRange();
                       // $("#showmsg").text(res);
                   // }
                    
                    console.log(obj);
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
    })


</script>
