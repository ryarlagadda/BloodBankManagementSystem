<?php

session_start();

if($_GET["logout"]==1 AND $_SESSION['id']) {session_destroy();

		$message = "You have been logged out. See you soon";
}







	include("connection.php");
	if ($_POST['submit'] == "Sign Up") {
		
			
		
			if (!$_POST['firstname']) $error.="<br />Please enter your First name";
			if (!$_POST['lastname']) $error.="<br />Please enter your Last name";
			 
			if (!$_POST['address1']) $error.="<br />Please enter address";
			if (!$_POST['state']) $error.="<br />Please enter your state";
			if (!$_POST['zipcode']) $error.="<br />Please enter your zip code";
		
			if (!$_POST['email']) $error.="<br />Please enter your email";
			if (!$_POST['dateOfBirth']) $error.="<br />Please enter your Date of Birth";
			if (!$_POST['patientBloodgroup']) $error.="<br />Please enter your Blood Group";
				else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $error.="<br />Please enter a valid email address"; 
				
			if(!$_POST['password'] AND $_POST['password'] == $_POST['confirmpassword']) $error.="<br />Password do not match";
				else {
				if(strlen($_POST['password'])<8) $error.="<br />Please enter a password with atleast 8 characters";
				if(!preg_match('`[A-Z]`', $_POST['password'])) $error.="<br />Please enter a password with atlease one capital letter";
				}
				
			if($error) $error = "There were error(s) in your signup details:".$error;	
			
			else {
				
						if(mysqli_connect_error()){
			
									die( "Could not connect to database");
							};
				
					
					
					$query = "SELECT * FROM `people` WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'";
					
					$result = mysqli_query($link, $query);
					
					$results = mysqli_num_rows($result);
					
			
					
					if ($results) $error = "That email address is already registered. Do you want to log in?" ;
					
					else {
						
							
							
						$query = "INSERT INTO `patient` (`patient_email`,`patient_password`,`first_name`,`last_name`,`middle_name`,`patient_dob`,`addr_line_1`,`addr_line_2`,`land_mark`,`state`,`city`,`zip_code`,`blood_type_id`,`patient_contact`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['middlename']."','".$_POST['dateOfBirth']."','".$_POST['address1']."','".$_POST['address2']."','".$_POST['landmark']."','".$_POST['state']."','".$_POST['city']."','".$_POST['zipcode']."','".$_POST['patientBloodgroup']."','".$_POST['mobile']."')";
						
								$result = mysqli_query($link, $query);
								
								$row = mysqli_fetch_array($result);
								
								echo "You are signed up";
								
								
								
								$_SESSION['patient_id'] = mysqli_insert_id;
								
											
								
								
								print_r($_SESSION);
								
							
								
								
								
						}
			
			}
	}
	
	if ($_POST['submit'] == "Register") {
		
			
		
			if (!$_POST['hospitalname']) $error.="<br />Please enter your First name";
			 
			if (!$_POST['hospitaladdress1']) $error.="<br />Please enter address";
			
			if (!$_POST['hospitalzipcode']) $error.="<br />Please enter your zip code";
			
			if (!$_POST['hospitalemail']) $error.="<br />Please enter your email";
		
				else if (!filter_var($_POST['hospitalemail'], FILTER_VALIDATE_EMAIL)) $error.="<br />Please enter a valid email address"; 
				
			if(!$_POST['hospitalpassword'] AND $_POST['hospitalpassword'] == $_POST['hospitalconfirmpassword']) $error.="<br />Password do not match";
				else {
				if(strlen($_POST['hospitalpassword'])<8) $error.="<br />Please enter a password with atleast 8 characters";
				if(!preg_match('`[A-Z]`', $_POST['hospitalpassword'])) $error.="<br />Please enter a password with atlease one capital letter";
				}
				
			if($error) $error = "There were error(s) in your signup details:".$error;	
			
			else {
				
						if(mysqli_connect_error()){
			
									die( "Could not connect to database");
							};
				
					
					
					$query = "SELECT * FROM `people` WHERE email='".mysqli_real_escape_string($link, $_POST['hospitalemail'])."'";
					
					$result = mysqli_query($link, $query);
					
					$results = mysqli_num_rows($result);
					
			
					
					if ($results) $error = "That email address is already registered. Do you want to log in?" ;
					
					else {
						
								
							
						$query = "INSERT INTO `hospital` (`Hos_email`,`hospital_password`,`hospital_name`,`addr_line_1`,`addr_line_2`,`land_mark`,`zip_code`,`phone_num`) VALUES ('".mysqli_real_escape_string($link, $_POST['hospitalemail'])."', '".md5(md5($_POST['hospitalemail']).$_POST['hospitalpassword'])."','".$_POST['hospitalname']."','".$_POST['hospitaladdress1']."','".$_POST['hospitaladdress2']."','".$_POST['hospitallandmark']."','".$_POST['hospitalzipcode']."','".$_POST['hospitalcontact']."')";
						
								$result = mysqli_query($link, $query);
								
								$row = mysqli_fetch_array($result);
								
								echo "You are signed up";
								
								
								
								$_SESSION['hospital_id'] = $row['hospital_id'];
								
											
								
								
								print_r($_SESSION);
								
							
								
								
								
						}
			
			}
	}
	
	if($_POST['submit']=="Log In"){
		
				
					
					$query = "SELECT * FROM `people` WHERE email='".mysqli_real_escape_string($link, $_POST['loginemail'])."' AND password='".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."'";
					
					$result = mysqli_query($link, $query);
					
					$row = mysqli_fetch_array($result);
					
			
					if($row) {
						
							$_SESSION['id'] = $row['id'];
							
							$rank = $row['usertype'];
							
							if ($rank == "patient") {header("Location:mainpage.php");}
								else if ($rank == "hospital") {header("Location:hospitalmainpage.php");}
								else if ($rank == "admin") {header("Location:adminmainpage.php");}
								else {header("Location:bbmanagermainpage.php");}
						
						} else {
							
								$error = "We could not find a user with that email and password";
							}
			
		}

?>
