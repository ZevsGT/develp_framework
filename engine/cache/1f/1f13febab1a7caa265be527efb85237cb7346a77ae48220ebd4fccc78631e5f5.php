<?php

/* themeDefoult/orders_product_list.tpl */
class __TwigTemplate_1bf20427085de122b48bae78c03af6a31595cccc5d413a9b87c8405ffa927541 extends Twig_Template
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
        echo "<div class=\"container\">

\t<section class=\"stageS\" id=\"stage_1\" style=\"display: block;\">
\t\t";
        // line 5
        echo "\t  ";
        echo ($context["product_list"] ?? null);
        echo "
\t  ";
        // line 7
        echo "\t\t
\t\t<div class=\"row mt-4\">
\t\t\t<div class=\"col-auto\">
\t\t\t\t<a href=\"\" data-stage=\"1\" class=\"btn2 btn-cart next\">Оформить заказ</a>
\t\t\t</div>
\t\t\t<div class=\"col-auto p-2\"><h6>На сумму: <span id=\"sum_price\">";
        // line 12
        echo twig_escape_filter($this->env, ($context["total_sum"] ?? null), "html", null, true);
        echo "</span>р.</h6></div>
\t\t</div>
\t</section>

\t<section class=\"stageS\" id=\"stage_2\">
\t\t
\t\t<form action=\"\" method=\"post\">
\t\t\t<input type=\"hidden\" name=\"stage\" value=\"3\">
\t\t\t<div class=\"form-group\">
\t\t\t\t<label>ФИО</label>
\t\t\t\t<input type=\"text\" name=\"name\" class=\"form-control\" id=\"exampleInputEmail1\" required aria-describedby=\"emailHelp\" placeholder=\"Введите ФИО\">
\t\t\t</div>
\t\t\t<div class=\"form-group\">
\t\t\t\t<label>Номер телефона</label>
\t\t\t\t<input type=\"tel\" name=\"phone\" class=\"form-control\" id=\"exampleInputEmail1\" required aria-describedby=\"emailHelp\" placeholder=\"Введите телефон\">
\t\t\t</div>
\t\t\t<div class=\"form-group\">
\t\t\t\t<label>Адрес</label>
\t\t\t\t<input type=\"text\" name=\"address\" class=\"form-control\" id=\"exampleInputPassword1\" required placeholder=\"Введите адрес\">
\t\t\t</div>
\t\t\t<div class=\"form-group form-check\">
\t\t\t\t<input type=\"checkbox\" class=\"form-check-input\" id=\"checkbox\">
\t\t\t\t<label class=\"form-check-label\" for=\"checkbox\">согласие на обработку персональных данных</label>
\t\t\t</div>
\t\t\t<a href=\"\" data-stage=\"2\" class=\"btn2 btn-cart back\">Назад</a>
\t\t\t<input id=\"submit\" name=\"submit\" type=\"submit\" class=\"btn btn-cart\" value=\"Оформить\" disabled>
\t\t</form>

\t</section>

\t<section class=\"stageS\" id=\"stage_3\">
\t\t
\t</section>

\t<!--<a href=\"\" data-stage=\"3\" class=\"btn2 btn-cart back\">Назад</a>-->

</div>";
    }

    public function getTemplateName()
    {
        return "themeDefoult/orders_product_list.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 12,  33 => 7,  28 => 5,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themeDefoult/orders_product_list.tpl", "E:\\OSPanel\\domains\\framework.ru\\templates\\themeDefoult\\orders_product_list.tpl");
    }
}
