<!doctype html>
<html>
<head>
    <title>Patient Page</title>

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
			background-image:url("blood.jpg");
			width:100%;
			background-size:cover;
			height:400px;
		}
		
		#topRow{
				margin-top:80px;
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
		
		.appstoreimage{
			width:250px;
		}
		
	
	</style>

</head>

<body data-spy="scroll" data-target=".navbar-collapse">
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header pull-left">
				<a class="navbar-brand">Secret Diary</a>
		</div>	
			<div class="pull-right">
            	<ul class="navbar-nav nav">
                
                	<li><a href ="project.php?logout=1">Log Out</a></li>
                
                </ul>
            
				
			</div>		
		</div>
	</div>

	<div class="container contentcontainer" id="topcontainer">
		<div class="row">
			<div class="col-md-6 col-md-offset-3" id="topRow">
				
              <form class="margintop" method="post">
              <div class="form-group">
						<label for="city">City</label>
						<input type="text" name="city" class="form-control" placeholder="city" value= "<? echo addslashes ($_POST['city']); ?> ">
					</div>
                     <div class="form-group">
						<label for="state">State</label>
						<input type="text" name="state" class="form-control" placeholder="State" value= "<? echo addslashes ($_POST['state']); ?> ">
					</div>
                     <div class="form-group">
						<label for="zipcode">Zip Code</label>
						<input type="text" name="zipcode" class="form-control" placeholder="Zip Code" value= "<? echo addslashes ($_POST['zipcode']); ?> ">
					</div>
                    <div class="form-group">
					<label for="patientBloodgroup">Blood Group(*)</label>
						<select class="form-control" name="patientBloodgroup">
                        	<option value="0">-----SELECT-------</option>
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
                    
                    <input type="submit" name="submit" value="search" action="" class="btn btn-success" id="buttonsearch">
               </form>
                
			</div>
		</div>
	</div>
    
    <div class="container contentcontainer displayTable" id="topcontainer">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3" id="topRow">
    <?php 
	
	include("connection.php");
	
	if($link === false){
    						die("ERROR: Could not connect. " . mysqli_connect_error());
						}
	
		if(isset($_POST['submit'])) {
			
			//echo "blood'". $_POST['patientBloodgroup']."'";
			$zip = mysqli_real_escape_string($link,$_POST['zipcode']);
			//echo "zip'". $_POST['zipcode']."'";
			//$iid=$_POST['patientBLoodgroup']; 
			
			//$city = $_POST['city'];
			
			//$state = $_POST['state'];
			
			//echo "navsk'".$iid."'";
			
			
			$bloodgroups = array('-----SELECT-------','A+','A-','B+','B-','O+','O-','AB+','AB-');
			
			$group = mysqli_real_escape_string($link, $_POST['patientBloodgroup']);
			
			$final =  mysqli_real_escape_string($link,$bloodgroups[$group]);
				
		$sql = "SELECT bb.bb_id,bb.bb_name,CONCAT(bb.addr_line_1,'',bb.addr_line_2,'',bb.land_mark) as address,bt.blood_group as bloodgroup,count(bbc.blood_unit_id) as available

 from bloodbank bb, blood_bank_contains bbc, blood_units bu,blood_type bt 

WHERE bb.zip_code ='".$zip."' and bb.bb_id = bbc.bb_id and bbc.blood_unit_id=bu.blood_unit_id and bu.blood_type_id=bt.blood_type_id and bt.blood_group='".$final."'";
		

		
							if($result = mysqli_query($link, $sql)){
								
								
    								if(mysqli_num_rows($result) > 0){
										
								
									echo "<table id='example' class='display' cellspacing='0' width='100%'>";
												
												echo "<thead>";
												
												echo "<tr>";
												
												echo "<th>Blood Bank ID</th>";
												
												echo "<th>Blood Bank Name</th>";
												
												echo "<th>BLood Bank Address</th>";
												
												echo "<th>Blood Group</th>";
												
												echo "<th>Available Blood Units</th>";
												
												echo "</tr>";
												
												echo "</thead>";
												
												while($row = mysqli_fetch_array($result)){
													
												echo "<tbody>";
												
												echo "<tr>";
												
												echo "<td>" . $row['bb_id']. "</td>";
												
                								echo "<td>" . $row['bb_name'] . "</td>";
												
                								echo "<td>" . $row['address'] . "</td>";
												
												echo "<td>" . $row['bloodgroup'] . "</td>"; 
												
												echo "<td>" . $row['available'] . "</td>"; 
												
												echo "</tr>";
												
												echo "</tbody>";
												
												}
												
												echo "</table>";
												
												mysqli_free_result($result);
   									 } else{
        						echo "No records matching your query were found.";
   								 }
                                 
                                 
							} else{
    								echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
								}
 
									// Close connection
										mysqli_close($link); 
		} 
        
        	
        else {
				echo "Please do a search";
			}
					
					?>	
	</div>

<script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $('#example').DataTable();
            } );
			
</script>>
			
<script type="text/javascript">
    // For demo to fit into DataTables site builder...
    $('#example')
        .removeClass( 'display' )
        .addClass('table table-striped table-bordered');
</script>

</body>
</html>



