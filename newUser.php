<!DOCTYPE html>
<html>

<head>
    <title>Calorie Counter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>

    <!-- onsubmit="return InputValidationEvent()" -->

    <?php include 'html/header.html'; ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <div class="content"> -->
                    <form action="newUserOut.php" method="post" id="inputForm" class="form-horizontal">

                        <div class="form-group">
                            <label for="newUsername" class="col-sm-2 col-sm-offset-2 control-label">Username</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="newUsername" placeholder="Username" name="newUsername">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="newPassword" class="col-sm-2 col-sm-offset-2 control-label">Password</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="newPassword" placeholder="Password" name="newPassword">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="newPassword2" class="col-sm-2 col-sm-offset-2 control-label">Verify Password</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="newPassword2" placeholder="Verify Password" name="newPassword2">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="newHeightFeet" class="col-sm-2 col-sm-offset-2 control-label">Height - Feet</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="newHeightFeet" placeholder="Feet" name="newHeightFeet">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="newHeightInches" class="col-sm-2 col-sm-offset-2 control-label">Height - Inches</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="newHeightFeet" placeholder="Inches" name="newHeightInches">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="newWeight" class="col-sm-2 col-sm-offset-2 control-label">Weight</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="newWeight" placeholder="Weight in pounds" name="newWeight">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-10">
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