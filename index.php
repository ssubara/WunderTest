<?php
include('_inc/connection.php');
	if((isset($_POST['firstname'])&& $_POST['lastname'] !=''))
	{
	
	$firstname = $con->real_escape_string($_POST['firstname']);
	$lastname = $con->real_escape_string($_POST['lastname']);
	$telephone = $con->real_escape_string($_POST['telephone']);
	$street = $con->real_escape_string($_POST['street']);
	$housenumber = $con->real_escape_string($_POST['housenumber']);
	$zipcode = $con->real_escape_string($_POST['zipcode']);
	$city = $con->real_escape_string($_POST['city']);
	$accountowner = $con->real_escape_string($_POST['accountowner']);
	$iban = $con->real_escape_string($_POST['iban']);
	
	$sql="INSERT INTO userRegistration 
	(firstname, lastname, telephone, street, housenumber, zipcode, city, accountowner, iban) 
	VALUES ('".$firstname."','".$lastname."', '".$telephone."','".$street."', '".$housenumber."', '".$zipcode."',
	'".$city."', '".$accountowner."', '".$iban."')";


	if(!$result = $con->query($sql)){
	die('There was an error running the query [' . $conn->error . ']');
	}
	else
	{
		$thankyou = "Thank you! We will contact you soon";
	
	}
	}
	else
	{
		$required = "Please fill Name and Email";
	
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Wunder Test app</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">

	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="assets/js/jquery.steps.js"></script>

</head>
<body class="text-center">

	<header>
		<img class="logo" src="assets/img/logo.svg">
		<br>
        <nav>
            Test
        </nav>
    </header>
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<section>
    				<form class="form" id="localStorage" action="" method="post">
	    				<!-- form header -->
					    <div class="form-header">
					    	<h1>Registration Account</h1>
					    </div>
					    <!-- form body -->
		    			<div class="divs active" id="first">
					    <!-- step 1 -->
				    	<fieldset>
				    	<div class="tab" id="part1">
					    	<label for="firstname" class="sr-only">First Name</label>
						    <input type="text" name="firstname" id="firstname" class="form-control stored" placeholder="First name" onkeyup="saveValue(this);"  required="" autofocus>
						    <br>
						    <label for="lastname" class="sr-only">Last Name</label>
						    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last name" onkeyup="saveValue(this);" required>
						    <br>
						    <label for="telephone" class="sr-only">Telephone</label>
						    <input name="telephone" id="telephone" type="text" class="form-control" pattern="[+ 0-9]{14}" placeholder="Phone number" onkeyup="saveValue(this);" required>
					    </div>
					    <br>
					    <input type="button" name="next" id="btn-first" class="next action-button" value="Next" />
						</fieldset>	    
						</div>
						<!-- end step 1 -->
						<!-- step 2 -->
						<div class="divs" id="second"> 
					    <fieldset id="2">
					    <div class="tab" id="part2">
					    	<div class="col-md-12">
							    <div class="inline col-md-8">
						    	<label for="address" class="sr-only">Street</label>
							    <input type="text" name="street" id="street" class="form-control" placeholder="Street" onkeyup="saveValue(this);" required>
							    </div>
							    <div class="inline col-md-3">
							    <label for="lastname" class="sr-only">House number</label>
							    <input type="text" name="housenumber" id="housenumber" class="form-control" placeholder="House number" onkeyup="saveValue(this);" required>
							    </div>
					    	</div>
					    	<br>
					    	<div class="col-md-12">
							    <div class="inline col-md-3">
						    	<label for="zipcode" class="sr-only">Zip code</label>
							    <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Zip Code" onkeyup="saveValue(this);" required>
							    </div>
							    <div class="inline col-md-8">
							    <label for="city" class="sr-only">City</label>
							    <input type="text" name="city" id="city" class="form-control" placeholder="City" onkeyup="saveValue(this);" required>
							    </div>
							</div>
					    </div>
					    <br>
					    <input type="button" name="previous" class="previous action-button" value="Previous" />
						<input type="button" name="next" id="btn-second" class="next action-button" value="Next" />
					    </fieldset>
						</div>
						<!-- end step 2 -->
						<!-- step 3 -->
						<div class="divs" id="third">
					    <fieldset>
				    	<div class="tab" id="part3">
					    	<label for="accountowner" class="sr-only">Account owner</label>
						    <input type="text" name="accountowner" id="accountowner" class="form-control" placeholder="Account owner" onkeyup="saveValue(this);" required>
						    <br>
						    <label for="iban" class="sr-only">IBAN</label>
						    <input type="text" name="iban" id="iban" class="form-control" placeholder="IBAN" onkeyup="saveValue(this);" required>
						    <br>   
					    </div>
					    <br>
					    <input type="button" name="previous" class="previous action-button" value="Previous" />
					    <input type="submit" name="next" id="btn-third" class="next action-button" value="Next" />
					    </fieldset>
						</div>
						<!-- end step 3 -->
						<!-- step 3 -->
						<div class="divs" id="forth">
					    <fieldset>
				    	<div class="tab" id="part4">
				    		
					    	<div class="succes">Thanks</div>
					    	<div>Your PaymentDataId is: </div>
						    <br>   
						    <input type="button" name="next" id="btn-four" class="next action-button" value="Thanks" />
					    </div>
					    <br>
					    </fieldset>
						</div>
						<!-- end step 3 -->
					</form>
				</section>
		    </div>
	    </div>
	</div>

	<footer class="page-footer">
        <p>Copyright Slaven Subara 2018.</p>
	</footer>
</body>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

<script type="text/javascript" src="assets/js/main.js"></script>
<script type="text/javascript" src="assets/js/jquery.easing.min.js"></script>


</html>