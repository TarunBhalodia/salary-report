<?php

/* @Framework/Form/range_widget.html.php */
class __TwigTemplate_29af21324fa5766d4be2eb6b7f46ef29ebe61de78e594c112b6bcbad4c234fa7 extends Twig_Template
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
        echo "<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'range'));
";
    }

    public function getTemplateName()
    {
        return "@Framework/Form/range_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@Framework/Form/range_widget.html.php", "/opt/lampp/htdocs/salary_report/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/range_widget.html.php");
    }
}
