<?php

/* themeDefoult/main.tpl */
class __TwigTemplate_02004d43c2350d03efa9bac4b61475947e8ab18181dc604c5293887a7b1ad763 extends Twig_Template
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
  <body>";
        // line 25
        $this->loadTemplate("themeDefoult/shoppingcart.tpl", "themeDefoult/main.tpl", 25)->display($context);
        // line 26
        $this->loadTemplate("themeDefoult/nav_bar.tpl", "themeDefoult/main.tpl", 26)->display($context);
        // line 27
        $this->loadTemplate("themeDefoult/slider.tpl", "themeDefoult/main.tpl", 27)->display($context);
        // line 28
        echo "
<div class=\"pjax-container\">";
        // line 31
        echo ($context["content"] ?? null);
        // line 33
        echo "</div>";
        // line 35
        $this->loadTemplate("themeDefoult/footer.tpl", "themeDefoult/main.tpl", 35)->display($context);
        // line 36
        echo "   
  
  <script type=\"text/javascript\" src=\"";
        // line 38
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/jquery.pjax.min.js\"></script>
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
        return array (  110 => 44,  106 => 43,  102 => 42,  98 => 41,  94 => 40,  90 => 39,  86 => 38,  82 => 36,  80 => 35,  78 => 33,  76 => 31,  73 => 28,  71 => 27,  69 => 26,  67 => 25,  61 => 19,  57 => 18,  53 => 17,  49 => 16,  41 => 11,  37 => 10,  32 => 8,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themeDefoult/main.tpl", "E:\\OpenServer\\domains\\framework.ru\\templates\\themeDefoult\\main.tpl");
    }
}
