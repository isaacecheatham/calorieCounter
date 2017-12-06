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

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
 
 
 <form action="forgotPassOut.php" method="post" id="inputForm" class="form-horizontal">

                        <div class="form-group">
                            <label for="resetUsername" class="col-sm-2 col-sm-offset-2 control-label">Username</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="resetUsername" placeholder="Username" name="resetUsername">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="resetHeightFeet" class="col-sm-2 col-sm-offset-2 control-label">Height - Feet</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="resetHeightFeet" placeholder="Feet" name="resetHeightFeet">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="resetHeightInches" class="col-sm-2 col-sm-offset-2 control-label">Height - Inches</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="resetHeightFeet" placeholder="Inches" name="resetHeightInches">
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label for="resetPassword" class="col-sm-2 col-sm-offset-2 control-label">New Password</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="resetPassword" placeholder="Password" name="resetPassword">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="veriresetPassword" class="col-sm-2 col-sm-offset-2 control-label">New Password</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="veriresetPassword" placeholder="Password" name="veriresetPassword">
                            </div>
                        </div>

                      
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-10">
                                <button type="submit" class="btn btn-success">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                    </div>
            </div>
        </div>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
</body>

</html>