<?php
$connection = mysqli_connect("localhost", "isaacecheatham", "");
$db = mysqli_select_db($connection, "icheatha_finalProj");
session_start(); // Starting Session
// Storing Session
$user_check = $_SESSION['login_user'];
$pass_check = $_SESSION['pass'];
// SQL Query To Fetch Complete Information Of User
$sql1 = "Select User_Name, User_ID from Login where User_Name = '$user_check' AND Password = '$pass_check'";
$result = mysqli_query($connection, $sql1) or die(mysqli_error($connection));
while ($row = mysqli_fetch_assoc($result)) {
    $login_session = $row['User_Name'];
    $id_session = $row['User_ID'];
};
if (!isset($login_session)) {
    mysqli_close($connection); // Closing Connection
    header('Location: index.php'); // Redirecting To Home Page
    
}
?>