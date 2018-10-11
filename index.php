<?php
session_start();
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
    				<form class="form" id="localStorageForm" action="post.php" method="post" >
	    				<!-- form header -->
					    <div class="form-header">
					    	<h1>Registration Account1</h1>
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
						    if(!empty($_SESSION)){
								    echo $_SESSION['pdi1'];
								  }else{
								    echo "We have some problems. Please try later";
								  }
						 	session_unset();
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