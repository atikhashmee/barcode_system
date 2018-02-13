<?php include'header.php';?>



<div class="container">
  <div class="row">
  <?php if(!empty($_POST)) { ?>
  
	<div class="col-md-12">
	      <?php
      if (isset($_POST['save_btn'])) {
          $data = array(
            'company_name' =>$_POST['company_name'],
            'address' =>$_POST['address'],
            'contact_no' => $_POST['contact_no'],
            'mail_address' => $_POST['mail_address'],
            'web_address' => $_POST['web_address'],
			'sim_code' => $_POST['sim_code'],
            'reg_date'  => date("Y-m-d")
          );

          if (!empty($_POST['company_name'] && !empty($_POST['mail_address']))) {
            if ($db->insert("company",$data)) {
             ?>
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Success!</strong> Data has been saved
				</div>
			 <?php
            }
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


        <a href="company_view.php" class="btn btn-info pull-right">View company</a>
        <br>
        <br>

        <?php 
if (isset($_GET['company-id'])) {

  $company= $db->selectAll("company","company_id='".$_GET['company-id']."'")->fetch(PDO::FETCH_ASSOC);
  echo ' <form class="form-inline" method="POST">
                <table class="table table-bordered">
        <tr>
          <div class="form-group">
          <td><label for="email">Company Name</label></td>
          <td><input type="text" name="company_name" class="form-control" id="email" value="'.$company['company_name'].'"></td>
          </div>
        </tr>
        
        <tr>
          <div class="form-group">
          <td><label for="pwd">Address</label></td>
          <td><input type="text" name="address" class="form-control" id="pwd" value="'.$company['address'].'" ></td>
          </div>
        </tr>

        <tr>
          <div class="form-group">
          <td><label for="pwd">Contact no.</label></td>
          <td><input type="text" name="contact_no" class="form-control" id="pwd" value="'.$company['contact_no'].'"></td>
          </div>
        </tr>

        <tr>
          <div class="form-group">
          <td><label for="pwd">Mail Address</label></td>
          <td><input type="text" name="mail_address" class="form-control" id="pwd" value="'.$company['mail_address'].'"></td>
          </div>
        </tr>

         <tr>
          <div class="form-group">
          <td><label for="pwd">Web Address</label></td>
          <td><input type="text" name="web_address" class="form-control" id="pwd" value="'.$company['web_address'].'"></td>
          </div>
        </tr>
    
         <tr>
          <div class="form-group">
          <td><label for="sim_code">SIM Code</label></td>
          <td><input type="text" name="sim_code"  class="form-control" id="sim_code" value="'.$company['sim_code'].'"></td>
          </div>
        </tr>
        
<tr><td></td><td><button type="submit" name="update_btn" class="btn btn-default">Update</button></td> </tr>       

        </table>
      </form>';
}

else{

echo ' <form class="form-inline" method="POST">
                <table class="table table-bordered">
        <tr>
          <div class="form-group">
          <td><label for="email">Company Name</label></td>
          <td><input type="text" name="company_name" class="form-control" id="email"></td>
          </div>
        </tr>
        
        <tr>
          <div class="form-group">
          <td><label for="pwd">Address</label></td>
          <td><input type="text" name="address" class="form-control" id="pwd"></td>
          </div>
        </tr>

        <tr>
          <div class="form-group">
          <td><label for="pwd">Contact no.</label></td>
          <td><input type="text" name="contact_no" class="form-control" id="pwd"></td>
          </div>
        </tr>

        <tr>
          <div class="form-group">
          <td><label for="pwd">Mail Address</label></td>
          <td><input type="text" name="mail_address" class="form-control" id="pwd"></td>
          </div>
        </tr>

         <tr>
          <div class="form-group">
          <td><label for="pwd">Web Address</label></td>
          <td><input type="text" name="web_address" class="form-control" id="pwd"></td>
          </div>
        </tr>
    
         <tr>
          <div class="form-group">
          <td><label for="sim_code">SIM Code</label></td>
          <td><input type="text" name="sim_code" maxlength="3" class="form-control" id="sim_code" required></td>
          </div>
        </tr>
        
<tr><td></td><td><button type="submit" name="save_btn" class="btn btn-default">Submit</button></td> </tr>       

        </table>
      </form>';

}

 // code for update

if (isset($_POST['update_btn'])) {
 $data = array(
            'company_name' =>$_POST['company_name'],
            'address' =>$_POST['address'],
            'contact_no' => $_POST['contact_no'],
            'mail_address' => $_POST['mail_address'],
            'web_address' => $_POST['web_address'],
      'sim_code' => $_POST['sim_code'],
            'reg_date'  => date("Y-m-d")
          );

 if ($db->update("company",$data,"company_id='".$_GET['company-id']."'")) {
 ?>
<script type="text/javascript">
  window.location.href="company_view.php";


</script>
 <?php

 }

 else{

  echo "error";
 }
}
        ?>

        <!-- end -->
             
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>


<?php include 'footer.php'; ?>

