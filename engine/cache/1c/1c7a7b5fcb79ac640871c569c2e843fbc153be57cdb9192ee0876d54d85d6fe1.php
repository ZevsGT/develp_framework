<?php

/* themeDefoult/nav_bar.tpl */
class __TwigTemplate_a9de6492312da7329a54ec4ce54cfd77c34463f7b581410c714439ec0c688240 extends Twig_Template
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
        echo "<nav class=\"navbar navbar-expand-lg navbar-theme bg-theme sticky-top\">
  <div class=\"container\">
    <a class=\"navbar-brand\" href=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["http_url"] ?? null), "html", null, true);
        echo "/\">Pizza</a>
    <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
      <i class=\"fas fa-bars\"></i>
    </button>
    <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
      <ul class=\"navbar-nav nav nav-pills\">
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, ($context["http_url"] ?? null), "html", null, true);
        echo "/category/pizza\">Пицца</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, ($context["http_url"] ?? null), "html", null, true);
        echo "/category/napitci\">Напитки</a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, ($context["http_url"] ?? null), "html", null, true);
        echo "/category/zacuski\">Закуски</a>
        </li>
      </ul>
    </div>
  </div>
</nav>";
    }

    public function getTemplateName()
    {
        return "themeDefoult/nav_bar.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 16,  43 => 13,  37 => 10,  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themeDefoult/nav_bar.tpl", "E:\\OSPanel\\domains\\framework.ru\\templates\\themeDefoult\\nav_bar.tpl");
    }
}
