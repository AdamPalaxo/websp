<?php

/* index.html */
class __TwigTemplate_f1b658a12ea8754344a65eda26039c95de1d3fd73bfc5484610e4c97d716d10c extends Twig_Template
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
        $this->env->loadTemplate("header.html")->display($context);
        // line 2
        echo "
<div class=\"container\">
    <div class=\"page-header\">
        <h1>WEB KONFERENCE</h1>
    </div>
    <br>
    <!-- <div class=\"jumbotron\">
        <h1>WEB KONFERENCE</h1>
    </div> -->
    <div class=\"row-fluid\">
        <div class=\"col-sm-3\">
            <div class=\"well navbar \">
                <ul class=\"nav nav-pills nav-stacked\">
                    <li role=\"presentation\" class=\"active\">
                        <a href=\"#\">O konferenci</a></li>
                    <li role=\"presentation\">
                        <a href=\"application/view/templates/topics.html\">Témata</a></li>
                    <li role=\"presentation\">
                        <a href=\"#\">Termíny</a></li>
                    <li role=\"presentation\">
                        <a href=\"#\">Organizátoři</a></li>
                    <li role=\"presentation\">
                        <a href=\"#\">Místo konání</a></li>
                    <li role=\"presentation\">
                        <a href=\"#\">Sponzoři</a></li>
                </ul>
            </div>
        </div>

        <div class=\"col-sm-9\">
            <h2 class=\"text-primary\">Pokyny pro autory</h2>
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

";
        // line 44
        $this->env->loadTemplate("footer.html")->display($context);
        // line 45
        echo "  ";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 45,  65 => 44,  21 => 2,  19 => 1,);
    }
}
