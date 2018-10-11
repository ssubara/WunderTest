<?php
include('_inc/connection.php');
session_start();
$result = mysqli_query($con, "SELECT id FROM userRegistration ORDER BY id DESC LIMIT 1;");
$row = $result->fetch_assoc();
$nextid = $row['id']+1;


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

		
		$pdi = $array['paymentDataId'];
		$_SESSION['pdi1'] = $pdi;

	$sql="INSERT INTO userRegistration 
	(firstname, lastname, telephone, street, housenumber, zipcode, city, accountowner, iban, paydataid) 
	VALUES ('".$firstname."','".$lastname."', '".$telephone."','".$street."', '".$housenumber."', '".$zipcode."',
	'".$city."', '".$accountowner."', '".$iban."', '".$pdi."')";

		if(!$result = $con->query($sql)){
		die('There was an error [' . $con->error . ']');
		}
		else
			{
			 header('Location: index.php');
			 exit();
			}
		}	
?>