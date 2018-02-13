

		<?php 

				require_once 'dboperation.php';
				require_once 'functions.php';
               $db = new Db();
				if (isset($_POST['btn'])) {

					$name = $_POST['name'];
					$pass = md5($_POST['password']);
					$qry = $db->selectAll("users","Username = '$name' AND password = '$pass' ");
					$data = $qry->fetch(PDO::FETCH_ASSOC);
					if (!empty($name) && !empty($pass)) {
						
							if ($name == $data['Username'] && $pass == $data['password']) {

								session_start();
								$_SESSION['username'] = $name;
								$_SESSION['role']     =  $data['role'];
								$_SESSION['u_id']      = $data['user_id'];
								header("location:../home.php");
							}else{
								header("location:../index.php?msg=username and password don't match");

								//echo " <a href='../index.php'>Go back</a>";
							}
					}else {
						header("location:../index.php?msg=fields are empty , fill them first ..... ");
						
					}


				}	


		?>