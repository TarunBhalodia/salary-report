<?php

/* @Twig/Exception/error.json.twig */
class __TwigTemplate_f8889c2f7a0c70c2a96de104a01034f0709d996d0983431c9f4799f1fc75edb0 extends Twig_Template
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
        echo json_encode(array("error" => array("code" => ($context["status_code"] ?? null), "message" => ($context["status_text"] ?? null))));
        echo "
";
    }

    public function getTemplateName()
    {
        return "@Twig/Exception/error.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@Twig/Exception/error.json.twig", "/opt/lampp/htdocs/salary_report/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/error.json.twig");
    }
}
