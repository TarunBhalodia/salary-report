<?php

/* @Framework/Form/money_widget.html.php */
class __TwigTemplate_672cd1a95498d73713deed84e2d5d411e16cf82d39871ec659d07dfbc242318a extends Twig_Template
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
        echo "<?php echo \$view['form']->formEncodeCurrency(\$money_pattern, \$view['form']->block(\$form, 'form_widget_simple')) ?>
";
    }

    public function getTemplateName()
    {
        return "@Framework/Form/money_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@Framework/Form/money_widget.html.php", "/opt/lampp/htdocs/salary_report/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/money_widget.html.php");
    }
}
