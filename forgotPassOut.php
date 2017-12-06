<!DOCTYPE html>

<?php 

include("connect.php");

?>

    <html>

    <head>
        <title>Your New Input</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>

    <body>

	<?php include 'html/header.html'; ?>

		<?php

		$rUsername = $rPassword = $vrPassword = $rFeet = $rInches = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  	$rUsername = test_input($_POST["resetUsername"]);
			$rPassword = test_input($_POST["resetPassword"]);
			$vrPassword = test_input($_POST["veriresetPassword"]);
			$rFeet = test_input($_POST["resetHeightFeet"]);
			$rInches = test_input($_POST["resetHeightInches"]);
		    	$passlength = mb_strlen($rPassword);
		
			 echo '<div id="info" class="container">
					      <div class="row">
					        <div class="col-lg-12">';
		
		
		    if($rPassword == $vrPassword) {
		    if(ctype_alnum($rPassword) && ctype_alnum($rUsername) && $passlength > 5 && $passlength < 51 ){
		    $rPassword = SHA1($rPassword);
		    $sql = "UPDATE Login INNER JOIN User ON Login.User_ID = User.User_ID SET  Login.Password = '$rPassword' WHERE Login.User_Name = '$rUsername' 
		    AND User.Feet = '$rFeet' AND User.Inches = '$rInches'";
		 
		    if ($conn->query($sql) === TRUE) {
		        echo "<h2>Password Reset Successfully</h2><br><br>";
		        echo "<a href='index.php' class='btn btn-info'>Login</a>";
		    } else {
		        echo "<h3>Something you entered is incorrect!</h3><br><br>";
		    	echo "<a href='forgotPassword.php' class='btn btn-info'>Go Back</a>";
		    }
		    $conn->close();
		    } else {
		    	echo "<h3>Something you entered is incorrect!</h3><br><br>";
		    	echo "<a href='forgotPassword.php' class='btn btn-info'>Go Back</a>";
		    }
		    } else {
		    	echo "<h3>Passwords do not match. Try Again.</h3><br><br>";
		    	echo "<a href='forgotPassword.php' class='btn btn-info'>Go Back</a>";
		    }
		    
		    echo '</div></div></div>';
		    
		}
		function test_input($data) {
		    $data = trim($data);
		    $data = stripslashes($data);
		    $data = htmlspecialchars($data);
		    return $data;
		}
		?>



































