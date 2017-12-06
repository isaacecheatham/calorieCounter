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
		$iName = $ifood = $ical = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		    $iName = test_input($_POST["iusername"]);
		    $ifood = test_input($_POST["ifood"]);
		    $ical = test_input($_POST["icalories"]);
		    $callength = mb_strlen($ical);
		    
		    echo '<div id="info" class="container">
					      <div class="row">
					        <div class="col-lg-12">';
		    
		    if(preg_match('/^[a-z0-9\040]+$/i',$ifood) && $ifood.length <= 50 && is_numeric($ical) && $callength < 5) {
				$sql = "INSERT INTO Calories (User_ID, Date_Time, Food, Calories)
			    VALUES ('$iName', NOW(), '$ifood', '$ical')";
			    if ($conn->query($sql) === TRUE) {
			        
			        echo "<h2>Your meal of " . $ifood . " for " . $ical . " calories was entered into your history</h2>";
			        echo "<h3>Click below to return home and look at your history.</h3>";
			       echo "<a class='btn btn-info' href='profile.php'>Return Home</a>";
					    
				
			    } else {
			        echo "Error: " . $sql . "<br>" . $conn->error;
			    }
			    $conn->close();
			} else {
				echo "<h3>Food title may only contain letters, numbers, and spaces.</h3><br>";
				echo "<h3>Calories can only be numeric.</h3><br>";
				echo "<a class='btn btn-info' href='profile.php'>Go Back</a>";
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