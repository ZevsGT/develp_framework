<?php

/* themeDefoult/blockView.tpl */
class __TwigTemplate_8b8d550e33f0859c4850acead89d8cb8c17640058643b296d3aa5c586bacdcc0 extends Twig_Template
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
        echo " <div class=\"container mt-3\">
    <h3 class=\"mb-3\">";
        // line 2
        echo twig_escape_filter($this->env, ($context["tittle"] ?? null), "html", null, true);
        echo "</h3>
    <div class=\"row pl-2 pr-2\">
      <!-- список -->
      ";
        // line 6
        echo "      ";
        echo ($context["List"] ?? null);
        echo "
      ";
        // line 8
        echo "      <!-- end список -->
    </div>
  </div>";
    }

    public function getTemplateName()
    {
        return "themeDefoult/blockView.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 8,  32 => 6,  26 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themeDefoult/blockView.tpl", "E:\\OSPanel\\domains\\framework.ru\\templates\\themeDefoult\\blockView.tpl");
    }
}
