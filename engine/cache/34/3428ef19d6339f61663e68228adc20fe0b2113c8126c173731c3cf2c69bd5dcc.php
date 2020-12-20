<?php

/* themeDefoult/orders.tpl */
class __TwigTemplate_8381d9e86fb71a583cfff1cbc1fe61a052209210f34be7262407fef0f8f57a02 extends Twig_Template
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
    <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/style/orders.css\">
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

<div class=\"container pt-4\">
  <div class=\"row\">
    <div class=\"col-12 col-lg-1\"><a class=\"logo text-dark\"  href=\"/\">Pizza</a></div>
    <div class=\"col-12 col-lg-11 pt-2\">
      <ul class=\"row stage\">
        <li class=\"col-4 col-auto text-center stage_active\">
          <span class=\"stage_num\">1</span>
          <p class=\"stage_name\">Корзина</p>
        </li>
        <li class=\"col-4 col-auto text-center\">
          <span class=\"stage_num\">2</span>
          <p class=\"stage_name\">Оформление заказа</p>
        </li>
        <li class=\"col-4 col-auto text-center\">
          <span class=\"stage_num\">3</span>
          <p class=\"stage_name\">Заказ принят</p>
        </li>
      </ul>
    </div>
  </div>
</div>

<hr>

<div class=\"pjax-container\">
  ";
        // line 50
        echo "  ";
        echo ($context["content"] ?? null);
        echo "
  ";
        // line 52
        echo "</div>

";
        // line 54
        $this->loadTemplate("themeDefoult/footer.tpl", "themeDefoult/orders.tpl", 54)->display($context);
        // line 55
        echo "   
  
  <script type=\"text/javascript\" src=\"";
        // line 57
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/jquery.pjax.min.js\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 58
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/bootstrap.bundle.min.js\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 59
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/scrollfunction.js\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 60
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/orders.js\"></script>
  </body>
</html>";
    }

    public function getTemplateName()
    {
        return "themeDefoult/orders.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 60,  117 => 59,  113 => 58,  109 => 57,  105 => 55,  103 => 54,  99 => 52,  94 => 50,  61 => 19,  57 => 18,  53 => 17,  49 => 16,  41 => 11,  37 => 10,  32 => 8,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themeDefoult/orders.tpl", "E:\\OSPanel\\domains\\framework.ru\\templates\\themeDefoult\\orders.tpl");
    }
}
