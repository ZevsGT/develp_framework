<?php

/* admin/main.tpl */
class __TwigTemplate_76db8470f583eea7b15534af0b5ef9577fe3370997e16035dc348889f9ace47c extends Twig_Template
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
    <!--<script type=\"text/javascript\" src=\"";
        // line 18
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/owl.carousel.min.js\"></script>-->
    <title></title>
   
  </head>
  <body>

   <nav class=\"indent navbar navbar-expand-lg navbar-theme bg-theme sticky-top\">
      <span>Админ Панель</span>
      <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNav\" aria-controls=\"navbarNav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <i class=\"fas fa-bars\"></i>
      </button>
      <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
        <ul class=\"navbar-nav ml-md-auto\">
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"#\"><i class=\"fas fa-search\"></i></a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"#\"><i class=\"fas fa-th\"></i></a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"#\"><i class=\"fas fa-align-right\"></i></a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"";
        // line 41
        echo twig_escape_filter($this->env, ($context["http_url"] ?? null), "html", null, true);
        echo "/admin/exit\"><i class=\"fas fa-power-off\"></i></a>
          </li>
        </ul>
      </div>
    </nav>

    <div class=\"indent menu-list sticky-top fixed sticky-top\">
      <section id='menu' style=\"display: block;\">
        <span class=\"tittle\">Меню</span>
        <ul class=\"side-bar-menu nav flex-column\">
          <li>
            <a href=\"";
        // line 52
        echo twig_escape_filter($this->env, ($context["http_url"] ?? null), "html", null, true);
        echo "/\" target=\"_blank\"><i class=\"fas fa-home\"></i> Просмотреть сайт </a>
          </li>
          <li>
            <a href=\"";
        // line 55
        echo twig_escape_filter($this->env, ($context["http_url"] ?? null), "html", null, true);
        echo "/admin\"><i class=\"fas fa-project-diagram\"></i> Dashboard </a>
          </li>
          <li>
            <a href=\"#pizzaList\" data-toggle=\"collapse\" class=\"menu-item\"><i class=\"fas fa-box\"></i> Продукт</a>

            <ul class=\"collapse submenu\" id=\"pizzaList\">
              <li><a href=\"";
        // line 61
        echo twig_escape_filter($this->env, ($context["http_url"] ?? null), "html", null, true);
        echo "/admin/product/all\" class=\"submenu-item\"><small><i class=\"far fa-circle\"></i> Показать все</small></a></li>
              <li><a href=\"";
        // line 62
        echo twig_escape_filter($this->env, ($context["http_url"] ?? null), "html", null, true);
        echo "/admin/product/add\" class=\"submenu-item\"><small><i class=\"fas fa-plus\"></i> Добавть</small></a></li>
            </ul>

          </li>
          <li>
            <a href=\"";
        // line 67
        echo twig_escape_filter($this->env, ($context["http_url"] ?? null), "html", null, true);
        echo "/admin/orders/all\" class=\"menu-item\"><i class=\"fas fa-folder\"></i> Заказы</a>
          </li>
          <li>
            <a href=\"#\" class=\"menu-item\">элемент 3</a>
          </li>
          <li>
            <a href=\"#\" class=\"menu-item\">элемент 4</a>
          </li>
        </ul>
      </section>
      <section id='chat'>
        чат
      </section>
    </div>

    <nav class=\"fixed-bottom nav-panel\">
      <a class=\"nav-btn\" href=\"#\"><i class=\"fas fa-bars fa-2x\"></i></a>
      <div class=\"mt-5 nav-tabs-btn\">
        <a class=\"nav-bt-item tab-on\" href=\"#menu\"><i class=\"fas fa-inbox\"></i></a>
        <a class=\"nav-bt-item\" href=\"#\"><i class=\"fas fa-plus\"></i></a>
        <a class=\"nav-bt-item\" href=\"#\"><i class=\"far fa-lightbulb\"></i></a>
        <a class=\"nav-bt-item tab-on\" href=\"#chat\"><i class=\"fas fa-comment-alt\"></i></a>
        <a class=\"nav-bt-item\" href=\"#\"><i class=\"fas fa-cogs\"></i></a>
      </div>
    </nav>


  <div class=\"indent p-3\">";
        // line 96
        echo ($context["content"] ?? null);
        // line 98
        echo "  </div>

  
  <footer class=\"indent mt-5\">
    
  </footer>

  <script type=\"text/javascript\" src=\"";
        // line 105
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/scrollfunction.js\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 106
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/shop-cart.js\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 107
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/start.popover.js\"></script>
  <script type=\"text/javascript\" src=\"";
        // line 108
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/menu.tab.js\"></script>
  <!--<script type=\"text/javascript\" src=\"";
        // line 109
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/form.js\"></script>-->
  <script type=\"text/javascript\" src=\"";
        // line 110
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/js/list-product.js\"></script>
  
  </body>
</html>";
    }

    public function getTemplateName()
    {
        return "admin/main.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 110,  181 => 109,  177 => 108,  173 => 107,  169 => 106,  165 => 105,  156 => 98,  154 => 96,  124 => 67,  116 => 62,  112 => 61,  103 => 55,  97 => 52,  83 => 41,  57 => 18,  53 => 17,  49 => 16,  41 => 11,  37 => 10,  32 => 8,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/main.tpl", "E:\\OpenServer\\domains\\framework.ru\\templates\\admin\\main.tpl");
    }
}
