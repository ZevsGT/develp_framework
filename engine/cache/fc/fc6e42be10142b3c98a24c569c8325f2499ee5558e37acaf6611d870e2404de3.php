<?php

/* themeDefoult/blockView.tpl */
class __TwigTemplate_cf48fffbd5a386948222c90336daa4829616731b8b6a8253f48b5deac2d4a038 extends Twig_Template
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
      <!-- список -->";
        // line 6
        echo ($context["List"] ?? null);
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
        return array (  33 => 8,  31 => 6,  26 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themeDefoult/blockView.tpl", "E:\\OpenServer\\domains\\framework.ru\\templates\\themeDefoult\\blockView.tpl");
    }
}
