<?php
include('_inc/connection.php');
$result = mysqli_query($con, "SELECT id FROM userRegistration ORDER BY id DESC LIMIT 1;");
while ($row = $result->fetch_assoc()) {
	$nextid = $row['id']+1;
    }

	if((isset($_POST['firstname'])&& $_POST['lastname'] !='')&&(isset($_POST['accountowner'])&& $_POST['iban'] !=''))
	{
	
	$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
	$telephone = mysqli_real_escape_string($con, $_POST['telephone']);
	$street = mysqli_real_escape_string($con, $_POST['street']);
	$housenumber = mysqli_real_escape_string($con, $_POST['housenumber']);
	$zipcode = mysqli_real_escape_string($con, $_POST['zipcode']);
	$city = mysqli_real_escape_string($con, $_POST['city']);
	$accountowner = mysqli_real_escape_string($con, $_POST['accountowner']);
	$iban = mysqli_real_escape_string($con, $_POST['iban']);

	//API Url
		$url = 'https://37f32cl571.execute-api.eu-central-1.amazonaws.com/default/wunderfleet-recruiting-backend-dev-save-payment-data';
		 
		//Initiate cURL.
		$ch = curl_init($url);
		 
		//The JSON data.
		$jsonData = array(
		    'customerId' => $nextid,
		    'iban' => $iban,
		    'owner' => $accountowner
		);
		 
		//Encode the array into JSON.
		$jsonDataEncoded = json_encode($jsonData);
		 
		//Tell cURL that we want to send a POST request.
		curl_setopt($ch, CURLOPT_POST, 1);
		 
		//Attach our encoded JSON string to the POST fields.
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
		 
		//Set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
		
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
		     
		$response = curl_exec($ch);
		$array = json_decode($response, true);
		
		curl_close($ch);

		
		$pdi = $array['paymentDataId'] ?? '';

	$sql="INSERT INTO userRegistration 
	(firstname, lastname, telephone, street, housenumber, zipcode, city, accountowner, iban, paydataid) 
	VALUES ('".$firstname."','".$lastname."', '".$telephone."','".$street."', '".$housenumber."', '".$zipcode."',
	'".$city."', '".$accountowner."', '".$iban."', '".$pdi."')";

		if(!$result = $con->query($sql)){
		die('There was an error [' . $con->error . ']');
		}
		else
			{
			$thankyou;
			}
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
</head>
<body class="text-center">
	<header>
		<img class="logo" src="assets/img/logo.svg">
		<br>
        <nav></nav>
    </header>
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<section>
    				<form class="form" id="localStorageForm" action="" method="post" >
	    				<!-- form header -->
					    <div class="form-header">
					    	<h1>Registration Account</h1>
					    </div>
					    <!-- form body -->
		    			<div class="divs active" id="first">
					    <!-- step 1 -->
				    	<fieldset>
				    	<div class="tab" id="part1">
						    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="* First name" onkeyup = "saveValue(this);">
						    <br>
						    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="* Last name" onkeyup="saveValue(this);">
						    <br>
						    <input name="telephone" id="telephone" type="text" class="form-control" pattern="[+ 0-9]{14}" placeholder="Phone number" onkeyup="saveValue(this);">
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
							    <input type="text" name="street" id="street" class="form-control" placeholder="Street" onkeyup="saveValue(this);">
							    </div>
							    <div class="inline col-md-3">
							    <input type="text" name="housenumber" id="housenumber" class="form-control" placeholder="House number" onkeyup="saveValue(this);">
							    </div>
					    	</div>
					    	<br>
					    	<div class="col-md-12">
							    <div class="inline col-md-3">
							    <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Zip Code" onkeyup="saveValue(this);">
							    </div>
							    <div class="inline col-md-8">
							    <input type="text" name="city" id="city" class="form-control" placeholder="City" onkeyup="saveValue(this);">
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
						    <input type="text" name="accountowner" id="accountowner" class="form-control" placeholder="* Account owner" onkeyup="saveValue(this);">
						    <br>
						    <input type="text" name="iban" id="iban" class="form-control" placeholder="* IBAN" onkeyup="saveValue(this);">
						    <br>   
					    </div>
					    <br>
					    <input type="button" name="previous" class="previous action-button" value="Previous" />
					    <input type="submit" name="next" id="btn-third" class="next action-button" value="Next" />
					    </fieldset>
						</div>
						<!-- end step 3 -->
						<!-- step 4 -->
						<div class="divs" id="forth">
					    <fieldset>
				    	<div class="tab" id="part4">
						    <br>  
						    <div class="pdi">
						    <?php 
						    if (isset($pdi))
								{
								  echo "<div>Your PaymentDataId is: </div>
						    			<br>  
						    			<div class='pdi'>";
						    	  echo $pdi;
						    	  mysqli_close($con);
								} 
						    ?>
						    </div>
						    <br>
						    <input type="button" name="" id="btn-four" class=" action-button" value="Thanks" />
					    </div>
					    <br>
					    </fieldset>
						</div>
						<!-- end step 4 -->
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
</html>