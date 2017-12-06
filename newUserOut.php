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
		// define variables and set to empty values
		$nUsername = $nPassword = $nPassword2 = $nFeet = $nInches = $nWeight = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		    $nUsername = test_input($_POST["newUsername"]);
		    $nPassword = test_input($_POST["newPassword"]);
		    $nPassword2 = test_input($_POST["newPassword2"]);
		    $nFeet = test_input($_POST["newHeightFeet"]);
		    $nInches = test_input($_POST["newHeightInches"]);
		    $nWeight = test_input($_POST["newWeight"]);
		    
		    $passlength = mb_strlen($nPassword);
		    $feetlength = mb_strlen($nFeet);
		    $incheslength = mb_strlen($nInches);
		    $weightlength = mb_strlen($nWeight);
		    
		    $MYSQL_CODE_DUPLICATE_KEY = 1062;
		    
		     echo '<div id="info" class="container">
					      <div class="row">
					        <div class="col-lg-12">';
		    
		 
		if($nPassword == $nPassword2) {
			if (ctype_alnum($nUsername) && ctype_alnum($nPassword) && is_numeric($nFeet) && is_numeric($nInches) && is_numeric($nWeight) && $nUsername.length 
			< 51 && $passlength < 51 && $passlength >= 6 && $feetlength < 2 && $incheslength < 3 && $weightlength < 4) {
				
				$nPassword = SHA1($nPassword);
				$sql = "INSERT INTO Login (User_Name, Password)
				    VALUES ('$nUsername', '$nPassword')";
				    if ($conn->query($sql) === TRUE) {
				        $sql2 = "SELECT User_ID FROM Login WHERE User_Name = '$nUsername'";
				        $result = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
				        while ($row = mysqli_fetch_assoc($result)) {
				            $id = $row['User_ID'];
				        };
				        $sql3 = "INSERT INTO User (User_ID, Weight, Feet, Inches)
				    		VALUES ('$id', '$nWeight', '$nFeet', '$nInches')";
				        if ($conn->query($sql3) === TRUE) {
				            echo "<h1>Welcome " . $nUsername . ", Please Login.</h1>";
				            echo "<a href='index.php' class='btn btn-info'>Login</a>";
				        }
				    } else {
				        if (mysqli_errno($conn) == $MYSQL_CODE_DUPLICATE_KEY) {
				        	echo "<h3>Username already taken, try another one.</h3>";
					   	echo "<br><a href='newUser.php' class='btn btn-info'>Go Back</a>";;
					}
				    }
				    $conn->close();

				} else {
				echo "<h3>Check your inputs!</h3>";
				echo "<br>-Username may only be alphanumeric<br>-Password must be longer than 6 characters and alphanumeric<br>-Feet, Inches, and Weight must be numeric<br>";
				echo "<br><a href='newUser.php' class='btn btn-info'>Go Back</a>";
				}
		
		} else {
			echo "<h3>Passwords do not match. Go back and try again</h3>";
			echo "<a href='newUser.php' class='btn btn-info'>Go Back</a>";
		}  
		
		echo '</div>
					      </div>
					    </div>';
   
		}
		
		
		function test_input($data) {
		    $data = trim($data);
		    $data = stripslashes($data);
		    $data = htmlspecialchars($data);
		    return $data;
		}
	?>

                <script type="text/javascript" src="js/jquery.js"></script>
                <script type="text/javascript" src="js/bootstrap.js"></script>
                <script type="text/javascript" src="js/main.js"></script>
    </body>

    </html>