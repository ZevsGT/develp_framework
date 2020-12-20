<?php

/* themeDefoult/product.tpl */
class __TwigTemplate_972c001033287a52d556b05db9e2c42aa47f142aa497e5b8d31bf2b8a669d159 extends Twig_Template
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
        echo "<div class=\"col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 product-item mb-4\">
  <img src=\"";
        // line 2
        echo twig_escape_filter($this->env, ($context["img"] ?? null), "html", null, true);
        echo "\">
  <h5>";
        // line 3
        echo twig_escape_filter($this->env, ($context["ProductName"] ?? null), "html", null, true);
        echo "
    <a tabindex=\"0\" class=\"product-info\" data-placement=\"bottom\" role=\"button\" data-toggle=\"popover\" data-trigger=\"focus\" data-content=\"";
        // line 4
        echo twig_escape_filter($this->env, ($context["Description"] ?? null), "html", null, true);
        echo "\"><i class=\"fas fa-info-circle\"></i></a>
  </h5>
  <p>";
        // line 7
        echo twig_escape_filter($this->env, ($context["Description"] ?? null), "html", null, true);
        echo "
  </p>
  <div class=\"row pr-2\">
    <span class=\"price col\">";
        // line 10
        echo twig_escape_filter($this->env, ($context["Price"] ?? null), "html", null, true);
        echo "</span>
    <a id=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\" href=\"#\" class=\"col btn2 btn-cart addPIncart\">В корзину</a>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "themeDefoult/product.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 11,  45 => 10,  39 => 7,  34 => 4,  30 => 3,  26 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themeDefoult/product.tpl", "E:\\OpenServer\\domains\\framework.ru\\templates\\themeDefoult\\product.tpl");
    }
}
