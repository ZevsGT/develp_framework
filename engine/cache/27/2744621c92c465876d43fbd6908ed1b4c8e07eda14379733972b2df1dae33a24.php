<?php

/* themeDefoult/shoppingcart.tpl */
class __TwigTemplate_c965671267b4e4546c5d07b682a9172a6b5c26befe18892d0a25bd18ea33e043 extends Twig_Template
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
    <!-- Список покупок -->";
        // line 8
        echo ($context["cart_list"] ?? null);
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
        return array (  32 => 10,  30 => 8,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themeDefoult/shoppingcart.tpl", "E:\\OpenServer\\domains\\framework.ru\\templates\\themeDefoult\\shoppingcart.tpl");
    }
}
