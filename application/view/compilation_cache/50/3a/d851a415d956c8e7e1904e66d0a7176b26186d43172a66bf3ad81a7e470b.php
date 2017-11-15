<?php

/* header.html */
class __TwigTemplate_503ad851a415d956c8e7e1904e66d0a7176b26186d43172a66bf3ad81a7e470b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <title>Web Konference</title>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">


    <!-- Latest bootstrap compiled -->
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"css/menu.css\">


    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>

</head>

<body>

<!-- Navbar part -->
<nav class=\"navbar navbar-inverse\">
    <div class=\"container-fluid\">
        <div class=\"navbar-header\">
            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#myNavbar\">
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
                <span class=\"icon-bar\"></span>
            </button>
            <!-- <a class=\"navbar-brand\" href=\"#\">WebSiteName</a> -->
        </div>
        <div class=\"collapse navbar-collapse\" id=\"myNavbar\">
            <ul class=\"nav navbar-nav\">
                <li class=\"active\"><a href=\"menu.php\"><span class=\"glyphicon glyphicon-home\"></span> Domů</a></li>
            </ul>
            <ul class=\"nav navbar-nav navbar-right\">
                <li><a href=\"#\"><span class=\"glyphicon glyphicon-user\"></span> Registrace</a></li>
                <li><a href=\"application/view/login.html\"><span class=\"glyphicon glyphicon-log-in\"></span> Přihlášení</a></li>
                <li><a href=\"#\"><span class=\"glyphicon glyphicon-user\"></span> <?php echo \$_SESSION['username']; ?></a></li>
            </ul>
            <?php echo \$_SESSION['username']; ?>
        </div>
    </div> <!-- End container -->
</nav> <!-- End navbar -->";
    }

    public function getTemplateName()
    {
        return "header.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
