<?php

/* themeDefoult/main.tpl */
class __TwigTemplate_9fb8362326ff0d271d12431d72576e0684a4ec4f8a538dc2d503621b02b6965d extends Twig_Template
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
        echo "<!doctype html>
<html lang=\"ru\">
  <head>
    <!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <!-- Bootstrap CSS -->
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/style/bootstrap.css\">
    <!-- Main CSS -->
    <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/style/main.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/style/owl.carousel.min.css\">
    <!-- icons CSS -->
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.3.1/css/all.css\" integrity=\"sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU\" crossorigin=\"anonymous\">
   

    <script src=\"";
        // line 16
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/jquery-3.3.1.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/bootstrap.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/owl.carousel.min.js\"></script>
    <title>";
        // line 19
        echo twig_escape_filter($this->env, ($context["s_tittle"] ?? null), "html", null, true);
        echo "</title>
   
  </head>
  <body>


";
        // line 25
        $this->loadTemplate("themeDefoult/shoppingcart.tpl", "themeDefoult/main.tpl", 25)->display($context);
        // line 26
        $this->loadTemplate("themeDefoult/nav_bar.tpl", "themeDefoult/main.tpl", 26)->display($context);
        // line 27
        $this->loadTemplate("themeDefoult/slider.tpl", "themeDefoult/main.tpl", 27)->display($context);
        // line 28
        echo "
<div class=\"pjax-container\">
  ";
        // line 31
        echo "  ";
        echo ($context["content"] ?? null);
        echo "
  ";
        // line 33
        echo "</div>

";
        // line 35
        $this->loadTemplate("themeDefoult/footer.tpl", "themeDefoult/main.tpl", 35)->display($context);
        // line 36
        echo "   
  
  <script type=\"text/javascript\" src=\"";
        // line 38
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/jquery.p";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["lang"] ?? null), "home_title", array()), "html", null, true);
        echo "jax.min.js\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 39
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/start.carousel.js\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 40
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/bootstrap.bundle.min.js\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 41
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/scrollfunction.js\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 42
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/shop-cart.js\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 43
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/start.popover.js\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 44
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/start.pjax.js\"></script>
  
  </body>
</html>";
    }

    public function getTemplateName()
    {
        return "themeDefoult/main.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 44,  117 => 43,  113 => 42,  109 => 41,  105 => 40,  101 => 39,  95 => 38,  91 => 36,  89 => 35,  85 => 33,  80 => 31,  76 => 28,  74 => 27,  72 => 26,  70 => 25,  61 => 19,  57 => 18,  53 => 17,  49 => 16,  41 => 11,  37 => 10,  32 => 8,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themeDefoult/main.tpl", "E:\\OSPanel\\domains\\framework.ru\\templates\\themeDefoult\\main.tpl");
    }
}
