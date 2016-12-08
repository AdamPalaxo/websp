<?php
    $error='';
    //if(!isset($_SESSION)) session_start();

    if(!isset($_SESSION['username'])) include 'login.php';
    else exit(header('Location: menu.php') );
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Přihlášení</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="css/index.css">
</head>


<body>
    <div class="container vertical-center">
        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
            <div class="panel panel-info">
            <div class="panel-heading">Přihlášení</div>
            <div class="panel-body">
                <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Uživatelské jméno:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="username" placeholder="Uživatelské jméno">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass">Heslo:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" name="pass" placeholder="Heslo">
                    </div>
                </div>
                    
                <div class="row">
                    <div class="col-xs-6"> 
                        <div class="checkbox">
                            <label><input type="checkbox" value="">Pamatuj si mě</label>
                        </div>
                    </div>
                    
                    <!-- <div class="col-xs-6 text-right"> 
                        <button class="btn btn-link">Zapomenuté heslo</button>
                    </div> -->
                </div>
         
            <button class="btn btn-info" type="submit" name="submit">Přihlásit</button>
            </form> 
        <!-- <p class="text-danger"><?php echo "<br>" . $error;?></p> -->
                </div>
            </div>
            </div>
    </div>
</body>

</html> 