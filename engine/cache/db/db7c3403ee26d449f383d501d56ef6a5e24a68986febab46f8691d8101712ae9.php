<?php

/* admin/pall_template.tpl */
class __TwigTemplate_745f83364080290c99df3249cf32449981cd4199ea761fa2ba4837689b96a7f6 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"row m-1\">";
        // line 3
        echo ($context["plist"] ?? null);
        // line 5
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "admin/pall_template.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 5,  25 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/pall_template.tpl", "E:\\OpenServer\\domains\\framework.ru\\templates\\admin\\pall_template.tpl");
    }
}
