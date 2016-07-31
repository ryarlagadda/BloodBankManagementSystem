<? include("login.php"); ?>

<!doctype html>
<html>
<head>
    <title>Blood Bank Management System</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<style>

		.box{
			border:1px solid grey;
			background-color:#d3d3d3;

			}

		.navbar-brand{font-size:1.8em;}
		
		#topcontainer{
			background-image:url("http://img.freepik.com/free-vector/blood-donation-logo_23-2147506524.jpg?size=338&ext=jpg");
			width:100%;
			background-size:cover;
			height:100%;
		}
		
		#topRow{
				margin-top:100px;
				text-align:center;
			}
			
		#topRow h1{
				font-size:300%;
		
			}
				
		.bold{
			font-weight:bold;
		}
		
		.margintop{
			margin-top:30px;
		}
		
		.center{
			text-align:center;
		}
		
		.title{
			margin-top:100px;
			font-size:300%;
		}
		
		#footer{
			background-color:#B0D1FB;
			padding-top:70px;
			width:100%;
		}
		
		.marginbottom{
			margin-bottom:30px;
		}
		
	</style>

</head>

<body data-spy="scroll" data-target=".navbar-collapse">
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="#home" class="navbar-brand">Blood Bank Management System</a>
			
			<button class="navbar-toggle" data-toggle="collapse" 
				data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>	
			<div class="collapse navbar-collapse">
            
				<form class="navbar-form navbar-right" method="post"> 
					<div class="form-group">
						<input type="email" name="loginemail" placeholder="Email" class="form-control" value="<? echo addslashes($_POST['loginemail']);?>">
					</div>
					<div class="form-group">
						<input type="password" name="loginpassword" placeholder="Password" class="form-control" value="<? echo addslashes($_POST['loginpassword']);?>">
					</div>
					<input type="submit" name="submit" class="btn btn-success" value="Log In">
				</form>
			</div>		
		</div>
	</div>

	<div class="container contentcontainer" id="topcontainer">
		<div class="row">
			<div class="col-md-6 col-md-offset-3" id="topRow">
				<h1 class="margintop center">Welcome to Blood Bank Management System</h1>
				<p class="lead">Donate BLood. Save Life</p>
                
                <?php
				
					if($error){
							
							echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
						
						}
						
					if($message){
							
							echo '<div class="alert alert-success">'.addslashes($message).'</div>';
						
						}
					
				?>
				
				<p class="bold margintop">Hospitals and Patients can register below for more information</p>
                
                </div>
                	</div>
                    	</div>
                
                <div class="container contentcontainer">
               	 	<div class="row">
						<div class="col-md-6 col-md-offset-3" id="topRow">
                        	<h1 class="margintop center">Patient Registration Form</h1>
				
				<form class="margintop" method="post">
					<div class="form-group">
						<label for="firstname">First Name</label>
						<input type="text" name="firstname" class="form-control" placeholder="First Name" value= "<? echo addslashes ($_POST['firstname']); ?> ">
					</div>
                    <div class="form-group">
						<label for="middlename">Middle Name</label>
						<input type="text" name="middlename" class="form-control" placeholder="Middle Name" value= "<? echo addslashes ($_POST['middlename']); ?> ">
					</div>
                    <div class="form-group">
						<label for="lastname">Last Name</label>
						<input type="text" name="lastname" class="form-control" placeholder="Last Name" value= "<? echo addslashes ($_POST['lastname']); ?> ">
					</div>
                    <div class="form-group">
						<label for="mobile">Contact Number</label>
						<input type="text" name="mobile" class="form-control" placeholder="Contact Number" value= "<? echo addslashes ($_POST['mobile']); ?> ">
					</div>
                     <div class="form-group">
					<label for="patientBloodgroup">Blood Group(*)</label>
						<select class="form-control" name="patientBloodgroup">
                        	<option value="">-----SELECT-------</option>
							<option value="7">AB+</option>
							<option value="8">AB-</option>
							<option value="1">A+</option>
							<option value="2">A-</option>
							<option value="3">B+</option>
							<option value="4">B-</option>
							<option value="5">O+</option>
							<option value="6">O-</option>
						</select>
					</div>
                     <div class="form-group">
					<label for="dateOfBirth">Date Of Birth</label>
					<input type="date" name="dateOfBirth" class="form-control" placeholder="Date of Birth" value= "<? echo addslashes ($_POST['dateOfBirth']);?>" >
					</div>
                    <div class="form-group">
						<label for="address1">Address Line 1</label>
						<input type="text" name="address1" class="form-control" placeholder="Address Line 1" value= "<? echo addslashes ($_POST['address1']); ?> ">
					</div>
                    <div class="form-group">
						<label for="address2">Address Line 2</label>
						<input type="text" name="address2" class="form-control" placeholder="Address Line 2" value= "<? echo addslashes ($_POST['address2']); ?> ">
					</div>
                    <div class="form-group">
						<label for="state">State</label>
						<input type="text" name="state" class="form-control" placeholder="State" value= "<? echo addslashes ($_POST['state']); ?> ">
					</div>
                     <div class="form-group">
						<label for="country">Country</label>
						<input type="text" name="country" class="form-control" placeholder="Country" value= "<? echo addslashes ($_POST['country']); ?> ">
					</div>
                     <div class="form-group">
						<label for="zipcode">Zip Code</label>
						<input type="text" name="zipcode" class="form-control" placeholder="Zip Code" value= "<? echo addslashes ($_POST['zipcode']); ?> ">
					</div>
                     <div class="form-group">
						<label for="landmark">Land Mark</label>
						<input type="text" name="landmark" class="form-control" placeholder="Land Mark" value= "<? echo addslashes ($_POST['zipcode']); ?> ">
					</div>
                   
                     <div class="form-group">
						<label for="email">Email Address</label>
						<input type="email" name="email" class="form-control" placeholder="Email Address" value= "<? echo addslashes ($_POST['email']);?>" >
                    </div>
                    <div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" placeholder="Password" value= "<? echo addslashes ($_POST['password']);?>" >
                    </div>
                    <div>
                        <label for="confirmpassword">Confirm Password</label>
						<input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" value= "<? echo addslashes ($_POST['confirmpassword']);?>" >
                        
                        </div>
						<input type="submit" name="submit" value="Sign Up" class="btn btn-success btn-lg margintop"/>
				</form>
			</div>
		</div>
	</div>
    
                    <div class="container contentcontainer">
               	 	<div class="row">
						<div class="col-md-6 col-md-offset-3" id="topRow">
                        	<h1 class="margintop center">Hospital Registration Form</h1>
				
				<form class="margintop" method="post">
					<div class="form-group">
						<label for="hospitalname">Hospital Name</label>
						<input type="text" name="hospitalname" class="form-control" placeholder="First Name" value= "<? echo addslashes ($_POST['hospitalname']); ?> ">
					</div>
                  
                    <div class="form-group">
						<label for="hospitalcontact">Contact Number</label>
						<input type="text" name="hospitalcontact" class="form-control" placeholder="Mobile Number" value= "<? echo addslashes ($_POST['hospitalcontact']); ?> ">
					</div>
                    <div class="form-group">
						<label for="hospitaladdress1">Address Line 1</label>
						<input type="text" name="hospitaladdress1" class="form-control" placeholder="Address Line 1" value= "<? echo addslashes ($_POST['hospitaladdress1']); ?> ">
					</div>
                    <div class="form-group">
						<label for="hospitaladdress2">Address Line 2</label>
						<input type="text" name="hospitaladdress2" class="form-control" placeholder="Address Line 2" value= "<? echo addslashes ($_POST['hospitaladdress2']); ?> ">
					</div>
                     <div class="form-group">
						<label for="hospitalzipcode">Zip Code</label>
						<input type="state" name="hospitalzipcode" class="form-control" placeholder="Zip Code" value= "<? echo addslashes ($_POST['hospitalzipcode']); ?> ">
					</div>
                    
                     <div class="form-group">
						<label for="hospitallandmark">Land Mark</label>
						<input type="text" name="hospitallandmark" class="form-control" placeholder="Land Mark" value= "<? echo addslashes ($_POST['hospitallandmark']);?>" >
                    </div>
                     <div class="form-group">
						<label for="hospitalemail">Email Address</label>
						<input type="email" name="hospitalemail" class="form-control" placeholder="Email Address" value= "<? echo addslashes ($_POST['hospitalemail']);?>" >
                    </div>
                   
                    <div class="form-group">
						<label for="hospitalpassword">Password</label>
						<input type="password" name="hospitalpassword" class="form-control" placeholder="Password" value= "<? echo addslashes ($_POST['hospitalpassword']);?>" >
                    </div>
                    <div>
                        <label for="hospitalconfirmpassword">Confirm Password</label>
						<input type="password" name="hospitalconfirmpassword" class="form-control" placeholder="Confirm Password" value= "<? echo addslashes ($_POST['hospitalconfirmpassword']);?>" >
                        
                        </div>
						<input type="submit" name="submit" value="Register" class="btn btn-success btn-lg margintop"/>
				</form>
			</div>
		</div>
	</div>
	
<script>

$(".contentcontainer").css("min-height",$(window).height());


</script>
</body>
</html>



