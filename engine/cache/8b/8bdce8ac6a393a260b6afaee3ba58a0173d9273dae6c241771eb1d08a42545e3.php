<?php

/* admin/product_form.tpl */
class __TwigTemplate_11a3f49e6ca3f31fe1fd155c248e8cbdb8eb4368b226e2836e3cae2e50451231 extends Twig_Template
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
        echo "<div class=\"row m-1\">
    <div class=\"col-12 col-sm-12 col-md-6 col-lg-6 ol-xl-6 card p-3\">
      <form action=\"\" method=\"post\">
        <div class=\"form-group\">
          <label for=\"exampleFormControlInput1\">Название</label>
          <input type=\"text\" name='productName' class=\"form-control\" id=\"exampleFormControlInput1\" placeholder=\"Название\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, ($context["productName"] ?? null), "html", null, true);
        echo "\">
        </div>
        <div class=\"form-group\">
          <label for=\"exampleFormControlSelect1\">Категория</label>
          <select class=\"form-control\" name=\"category\" id=\"exampleFormControlSelect1\">";
        // line 12
        echo ($context["category"] ?? null);
        // line 14
        echo "          </select>
        </div>
        <div class=\"form-group\">
          <input type=\"checkbox\" name=\"popular\" value=\"true\" id=\"exampleCheck1\">
          <label for=\"exampleCheck1\">Популярное</label>
        </div>
        <div class=\"form-group\">
          <label for=\"exampleFormControlInput1\">Цена</label>
          <input type=\"text\" name='price' class=\"form-control\" id=\"exampleFormControlInput1\" placeholder=\"Цена\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, ($context["price"] ?? null), "html", null, true);
        echo "\">
        </div>
        <div class=\"form-group\">
          <label for=\"exampleFormControlTextarea1\">Описание</label>
          <textarea name=\"description\" class=\"form-control\" id=\"exampleFormControlTextarea1\" rows=\"3\">";
        // line 26
        echo twig_escape_filter($this->env, ($context["description"] ?? null), "html", null, true);
        echo "</textarea>
        </div>
        <button type=\"submit\" name='submit' class=\"btn btn-primary\">Готово</button>
      </form>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "admin/product_form.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 26,  49 => 22,  39 => 14,  37 => 12,  30 => 6,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/product_form.tpl", "E:\\OpenServer\\domains\\framework.ru\\templates\\admin\\product_form.tpl");
    }
}
