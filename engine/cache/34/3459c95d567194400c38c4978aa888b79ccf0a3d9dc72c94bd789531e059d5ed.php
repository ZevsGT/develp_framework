<?php

/* admin/login_page.tpl */
class __TwigTemplate_1f82c01c94a4c4b1308ca8037b48a31fb17ae640834b89ef730eeac9e707039f extends Twig_Template
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
        echo "/style/loginPage.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/style/owl.carousel.min.css\">
    <!-- icons CSS -->
    <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.3.1/css/all.css\" integrity=\"sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU\" crossorigin=\"anonymous\">
   
    <title>";
        // line 15
        echo twig_escape_filter($this->env, ($context["s_tittle"] ?? null), "html", null, true);
        echo "</title>
   
  </head>
  <body>

    <div class=\"container\">
      <h3>Авторизация</h3>
      <div class=\"row justify-content-center align-items-center\">
        <div class=\"col-11 col-sm-11 col-md-4 col-lg-4 col-xl-4 card\">

          <form action=\"\" method=\"post\">
            <div class=\"form-group\">
              <label for=\"exampleInputEmail1\">Email</label>
              <input type=\"email\" name=\"email\" class=\"form-control\" id=\"exampleInputEmail1\" aria-describedby=\"emailHelp\" placeholder=\"Enter email\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "email", array()), "html", null, true);
        echo "\">
            </div>
            <div class=\"form-group\">
              <label for=\"exampleInputPassword1\">Password</label>
              <input type=\"password\" name=\"password\" class=\"form-control\" id=\"exampleInputPassword1\" placeholder=\"Password\">
            </div>
            <input type=\"submit\" name=\"submit\" class=\"btn btn-primary col-4 col-sm-6 col-lg-6 col-xl-6\" value=\"Войти\"/>
            <a class=\"col-8 col-sm-6 col-lg-6 col-xl-6\" href=\"#\">Забыли пароль?</a>
            <div class=\"text-center\">";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "error", array()), "html", null, true);
        echo "</div>
          </form>
        </div>
      </div>
    </div>

    <script src=\"";
        // line 42
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/jquery-3.3.1.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 43
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/bootstrap.min.js\"></script>
  </body>
</html>";
    }

    public function getTemplateName()
    {
        return "admin/login_page.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 43,  84 => 42,  75 => 36,  64 => 28,  48 => 15,  41 => 11,  37 => 10,  32 => 8,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/login_page.tpl", "E:\\OpenServer\\domains\\framework.ru\\templates\\admin\\login_page.tpl");
    }
}
