<?php

/* themeDefoult/slider.tpl */
class __TwigTemplate_a907bb8e95232814511151787ea7e5ba0525ee9d1dd6a3d2b94e9dac5f414dc7 extends Twig_Template
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
  <!-- Slider -->
  <div class=\"owl-carousel owl-theme\">
    <div class=\"item\">
      <img src=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/img/642.jpg\" alt=\"\">
    </div>
    <div class=\"item\">
      <img src=\"";
        // line 8
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/img/7062914c3c69c543991a45ca006e456b.jpg\" alt=\"\">
    </div>
    <div class=\"item\">
      <img src=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["site_path"] ?? null), "html", null, true);
        echo "/img/eda-243c8fa5f07f.jpg\" alt=\"\">
    </div>
  </div>
  <!--end Slider -->
</div>";
    }

    public function getTemplateName()
    {
        return "themeDefoult/slider.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 11,  35 => 8,  29 => 5,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themeDefoult/slider.tpl", "E:\\OSPanel\\domains\\framework.ru\\templates\\themeDefoult\\slider.tpl");
    }
}