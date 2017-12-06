<?php
include('session.php');
?>
    <!DOCTYPE html>

    <html>

    <head>
        <title>Calorie Counter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>

    <body>

        <?php include 'html/header.html'; ?>


            <?php

                $sql2 = "Select Login.User_Name, User.Feet, User.Inches, User.Weight from Login INNER JOIN User ON Login.User_ID=User.User_ID WHERE User.User_ID='$id_session'";
                $sql2_result = mysqli_query($connection, $sql2) or die(mysqli_error($connection));

                while ($row = mysqli_fetch_assoc($sql2_result)) {
                    $ui_userName = $row['User_Name'];
                    $ui_feet     = $row['Feet'];
                    $ui_inches   = $row['Inches'];
                    $ui_weight   = $row['Weight'];
                }
                ;
                $bmi1 = $ui_weight / 2.2;
                $bmi2 = (($ui_feet * 12) + $ui_inches) / 39.37;
                $bmi2 = $bmi2 * $bmi2;
                $bmi1 = $bmi1 / $bmi2;


                $sql3 = "SELECT SUM(Calories) as 'TotalCal' FROM Calories WHERE User_ID = '$id_session' AND date(Date_Time) = curdate()";
                $sql3_result = mysqli_query($connection, $sql3) or die(mysqli_error($connection));

                while ($row = mysqli_fetch_assoc($sql3_result)) {
                    $totalCal = $row['TotalCal'];
                }
                ;
            ?> 

                <div id="info" class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Welcome <?php echo $ui_userName?></h1>
			    <a id="logoff" class="btn btn-danger" href="logout.php">Log Out</a>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-4">
                        <div id="stats-info">
                        <div class="col-sm-6 inner-info">
                            <h2>Height</h2>
                            <h3><?php echo $ui_feet."'".$ui_inches."\""?>
                            </h3>
                       	</div>
                       	<div class="col-sm-6 inner-info">
                            <h2>Weight</h2>
                            <h3><?php echo $ui_weight." lbs"?>
                            </h3>
                        </div>
                        </div>
                        </div>
                        <div class="col-xs-4">
                        <div id="bmi-info">
                        <div class="col-sm-6 inner-info">
                            <h2>BMI</h2>
                            <h3><?php echo number_format($bmi1,2)?>
                            </h3>
                       	</div>
                       	<div id="testt" class="col-sm-6 inner-info">
                            <p>Healthy: 19 to 24.9</p>
                            <p>Overweight: 25 to 29.9</p>
                            <p>Obese: 30 and above</p>
                        </div>
                        </div>
                        </div>
                        <div class="col-xs-4">
                        <div id="calories-info">
                        <div class="col-sm-12 inner-info">
			    <h2>Today's Calorie Intake</h2>
                            <h3><?php echo $totalCal?>
                            </h3>
                        </div>
                        </div>
                        </div>
                    </div>
                    
                </div>

                <div id="buttons" class="container">
                    <div class="row">
                        <div class="col-sm-4" id="updateCol">
                        	<button type="button" class="btn btn-info" id="update">Update Weight</button>
                        </div>
                        <div class="col-sm-4">
                        	<button type="button" class="btn btn-info" id="history">View History</button>
                        </div>
                        <div class="col-sm-4" id="newCalCol">
                             	<button type="button" class="btn btn-info" id="inputNew">Input New Calories</button>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="inputOut.php" method="post" id="inputForm" class="form-horizontal hide" onsubmit="return InputValidationEvent()">

                                <input type="hidden" name="iusername" value="<?php echo htmlspecialchars($id_session); ?>">

                                <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="inputFood" class="col-sm-12">What did you eat?</label>
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-4">
                                        <input type="text" class="form-control" id="inputFood" placeholder="Title" name="ifood">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="inputCal" class="col-sm-12">How many calories?</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-5">
                                        <input type="text" class="form-control" id="inputCal" placeholder="Total" name="icalories">
                                        </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="updateOut.php" method="post" id="updForm" class="form-horizontal hide" onsubmit="return UpdateValidationEvent()">

                                <input type="hidden" name="uusername" value="<?php echo htmlspecialchars($id_session); ?>">

                                <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="updateWeight" class="col-sm-12">What is your new weight?</label>
                                   </div> 
                                   </div> 
                                    <div class="form-group">
                                   <div class="col-sm-2 col-sm-offset-5">
                                        <input type="text" class="form-control" id="updateWeight" placeholder="Total" name="uweight">
                                    </div>
                                    </div> 
                             
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                           </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- <div class="content"> -->
                            <form action="historyOut.php" method="post" id="histForm" class="form-horizontal hide" onsubmit="return HistoryValidationEvent()">

                                <input type="hidden" name="husername" value="<?php echo htmlspecialchars($id_session); ?>">

                                <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="dateStart" class="col-sm-12">Enter the date you want to view history through or select today.</label>
                                </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
   
                                        <select name="hmonth" id="dateStart">
                                            <option selected value="0">-----</option>
                                            <option value="01">Jan</option>
                                            <option value="02">Feb</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">Aug</option>
                                            <option value="09">Sept</option>
                                            <option value="10">Oct</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Dec</option>
                                        </select>

                                        <select name="hday" id="day">
                                            <option selected value="0">----</option>
                                            <option value="01">1</option>
                                            <option value="02">2</option>
                                            <option value="03">3</option>
                                            <option value="04">4</option>
                                            <option value="05">5</option>
                                            <option value="06">6</option>
                                            <option value="07">7</option>
                                            <option value="08">8</option>
                                            <option value="09">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>

                                        <select id="year" name="hyear">
                                            <option value=0 selected>----</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            </option>
                                        </select>
                                        </div>
                               	</div>
                               	
                               	<div class="form-group">
                                    <div class="col-sm-12">
					<input type="checkbox" value="1" name="today">Today
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>

                <script type="text/javascript" src="js/jquery.js"></script>
                <script type="text/javascript" src="js/bootstrap.js"></script>
                <script type="text/javascript" src="js/main.js"></script>
    </body>

    </html>