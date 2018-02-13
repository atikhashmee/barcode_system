<?php 
            include 'files/header.php';
            include 'files/menu.php';

    if (isset($_GET['p_did'])) {
       $id = $_GET['p_did']; 
        if ($db->delete("users","u_id = '$id'") && $db->delete("user_information","user_id = '$id'") ) {
          header("location:user.php");
        }else{
          echo "problem";
        }
    }



     include 'files/footer.php';
   ?>