 <!DOCTYPE html>
<html>
<head>
    <title>Web Konference</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/menu.css">
     
    <!-- Latest bootstrap compiled -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body> 
    
    <!-- Navbar part -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>
                <!-- <a class="navbar-brand" href="#">WebSiteName</a> -->
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="menu.php"><span class="glyphicon glyphicon-home"></span> Domů</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Registrace</a></li>
                    <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Přihlášení</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Main part of the page -->
    <div class="container">    
        <div class="page-header">
       	    <h1>WEB KONFERENCE</h1>      
        </div>
        <br>
        <!-- <div class="jumbotron">
			<h1>WEB KONFERENCE</h1> 
        </div> -->
        <div class="row-fluid">
            <div class="col-sm-3">
                <div class="well navbar ">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation" class="active"> 
                            <a href="#">O konferenci</a></li>
                        <li role="presentation">
                            <a href="#">Témata</a></li>
                        <li role="presentation">
                            <a href="#">Termíny</a></li>
                        <li role="presentation">
                            <a href="#">Organizátoři</a></li>
                        <li role="presentation">
                            <a href="#">Místo konání</a></li>
                        <li role="presentation">
                            <a href="#">Sponzoři</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="col-sm-9">
                <h2 class="text-primary">Pokyny pro autory</h2>
                <h3>Jazyk příspěvků</h3>
                <p>Příspěvky mohou být v českém nebo anglickém jazyce.</p>
                <h3>Rozsah příspěvků</h3>                
                <p>Maximální povolený rozsah je 10 stran.</p>
                <h3>Odevzdání příspěvku</h3>
                <p>Příspěvek k posouzení, který vyhovuje požadavkům, je třeba odevzdat ve formátu PDF prostřednictvím formuláře dotupného v  systému WEB-KONF. Pokud dosud nemáte účet v systému, zřiďte su jej prostřednictvím této stránky.</p>
            </div>
        </div>
    </div> 
</body>

</html> 
