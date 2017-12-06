<?php include( 'login.php');?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link href="css/main.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php include( 'html/header.html');?>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="login-center">
         
                    <h2>Login</h2>
	</div>
	</div>
	<div class="row">
	<div class="col-md-12" id="login-center">
                    <form action="" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 col-sm-offset-3 control-label">Username:</label>
                            <div class="col-sm-7 input-center">
                                <input id="name" name="username" placeholder="username" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="passsword" class="col-sm-2 col-sm-offset-3 control-label">Password :</label>
                            <div class="col-sm-7 input-center">
                                <input id="password" name="password" placeholder="**********" type="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <input name="submit" type="submit" class="btn btn-success" value=" Login ">
                                <a href="newUser.php" class="btn btn-info">New Account</a>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="forgotPassword.php" class="btn btn-warning">Forgot Password</a>
                            </div>
                        </div>
                        
                        <span><?php echo $error; ?></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>
    </div>
</body>

</html>