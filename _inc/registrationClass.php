
<?php
class registrationClass
{


/* Registracija pacijenta */
public function wunderRegistration($firstname, $lastname, $telephone)
{

	$wr = $db->prepare("INSERT INTO userRegistration (firstname, lastname, telephone)
							   VALUES (:firstname, :lastname, :telephonee");
	$wr->bindParam("firstname", $firstname, PDO::PARAM_STR) ;
	$wr->bindParam("lastname", $lastname, PDO::PARAM_STR) ;
	$wr->bindParam("telephone", $telephone, PDO::PARAM_STR) ;

	$wr->execute();



return true;
}
else
{
$db = null;
return false;
}


catch(PDOException $e) {
echo '{"error":{"text":'. $e->getMessage() .'}}'; 
}

?>