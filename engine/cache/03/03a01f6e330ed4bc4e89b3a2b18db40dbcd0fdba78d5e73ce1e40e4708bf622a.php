<?php

/* themeDefoult/shoppingcart.tpl */
class __TwigTemplate_1454c806d1b931bd43ad3868e0e274373f1367541f722b897dfb99aa55b9aeb4 extends Twig_Template
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
        echo "<div class=\"shopping-block\">
  <div class=\"head\">
    <h4>Продукция в Вашей корзине:</h4>
  </div>
  <div class=\"shopping-list\">
    <!-- Список покупок -->
    ";
        // line 8
        echo "      ";
        echo ($context["cart_list"] ?? null);
        echo "
    ";
        // line 10
        echo "    <!-- end Список покупок -->
  </div>
  <a href=\"/orders\" class=\"shopping-btn\">К оплате</a>
</div>

<a href=\"#\" class=\"shopping-cart\">
  <i class=\"fas fa-shopping-cart fa-2x\" ></i>
  <i class=\"fas fa-times fa-2x\" style=\"display: none;\"></i>
  <span class=\"count\">0</span>
</a>
";
    }

    public function getTemplateName()
    {
        return "themeDefoult/shoppingcart.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 10,  31 => 8,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themeDefoult/shoppingcart.tpl", "E:\\OSPanel\\domains\\framework.ru\\templates\\themeDefoult\\shoppingcart.tpl");
    }
}
