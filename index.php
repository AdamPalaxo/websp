 <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <title>Přihlášení</title>
</head>

<body>
    <div class="container vertical-center">
        <div class="col-xs-4 col-xs-offset-4">
            <div class="well">
            <form method="GET" action="menu.php">
            <div class="form-group">
                <label for="email">Uživatelské jméno:</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="pwd">Heslo:</label>
                <input type="password" class="form-control" id="pwd">
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Pamatuj si mě</label>
            </div>
        <button type="submit" class="btn btn-default">Přihlásit</button>
        </form> 
        </div>
        </div>
    </div>
</body>

</html> 