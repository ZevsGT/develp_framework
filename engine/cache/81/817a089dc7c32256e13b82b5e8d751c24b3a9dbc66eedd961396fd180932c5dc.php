<?php

/* admin/product.tpl */
class __TwigTemplate_de00ae9929b80b9d83b4a365117c152136cbdbe0b9c825a897864241ac8d3eee extends Twig_Template
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
        echo "<div id='";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "' class=\"col-12 col-sm-12 col-md-12 col-lg-12 ol-xl-12 card p-3 mt-3\">
  <div class=\"row\">
    <div class=\"col-auto\"><small>Название:</small>";
        // line 3
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "</div>
    <div class=\"col-auto\"><small>Категория:</small>";
        // line 4
        echo twig_escape_filter($this->env, ($context["category"] ?? null), "html", null, true);
        echo "</div>
    <div class=\"col text-right\">
    <a href=\"/admin/product/edit/";
        // line 6
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\" class=\"all-link\"><i class=\"far fa-edit\"></i></a>
    <a id='";
        // line 7
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "' href=\"#\" class=\"all-link del-product\"><i class=\"far fa-trash-alt\"></i></a>
    </div>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "admin/product.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 7,  38 => 6,  33 => 4,  29 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/product.tpl", "E:\\OpenServer\\domains\\framework.ru\\templates\\admin\\product.tpl");
    }
}
