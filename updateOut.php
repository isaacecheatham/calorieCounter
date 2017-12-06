<?php
include ("connect.php");
$uName = $uweight = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uName = test_input($_POST["uusername"]);
    $uweight = test_input($_POST["uweight"]);
    $weightlength = mb_strlen($uweight);
    
    if(is_numeric($uweight) && $weightlength < 4 && $uweight > 1) {
    $sql = "UPDATE User SET Weight = '$uweight' WHERE User_ID = '$uName'";
    if ($conn->query($sql) === TRUE) {
        header('Location: profile.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    } else {
    	echo "<!DOCTYPE html><html><head>
    	<title>Calorie Counter</title>
    	<meta name='viewport' content='width=device-width, initial-scale=1'>
    	<link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
    	<link rel='stylesheet' type='text/css' href='css/main.css'>
    	</head><body>";
    	
    	echo '<div id="info" class="container">
					      <div class="row">
					        <div class="col-lg-12">';
    	
    	echo "<h3>Weight can only be positive numeric number and less than 1000. Go back and try again.</h3><br><br>";
    	echo "<a href='profile.php' class='btn btn-info'>Go Back</a>";
    	include 'html/header.html';
    	echo "</div></div></div></body></html>";
    }
    
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

