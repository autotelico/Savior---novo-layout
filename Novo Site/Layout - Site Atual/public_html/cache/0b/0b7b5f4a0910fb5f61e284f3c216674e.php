<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* my-account.html */
class __TwigTemplate_38d739a26a2a3cb1c8d5b6055ec2e3dc extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'js' => [$this, 'block_js'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "structure.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("structure.html", "my-account.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<main>
    <section class=\"home-content\">
        <div class=\"container\">
            <div class=\"content-title d-flex justify-content-between\">
                <h1>Bem vindo(a)!</h1>
            </div>
            <div class=\"content-bg\">
                <div class=\"row\">
                    <div class=\"col-md-9\">
                        <div class=\"text-center p-2 d-flex align-items-center justify-content-center shadow-lg gap-1 flex-column rounded-3\" style=\"background-image: url(/images/bg.webp); background-position: center 20%; background-size: cover; background-repeat: no-repeat;\">
                            <h1 class=\"text-light\">Bônus na Compra de Moedas!</h1>
                            <a href=\"/shop/coin\" class=\"btn btn-danger btn-lg\">LOJA</a>
                        </div>                
                    </div>
                    <div class=\"col-md-3\">
                        ";
        // line 19
        $this->loadTemplate("/my-account-menu.html", "my-account.html", 19)->display($context);
        echo "             
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
";
    }

    // line 27
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        $this->loadTemplate("/custom-js.html", "my-account.html", 28)->display($context);
    }

    public function getTemplateName()
    {
        return "my-account.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 28,  80 => 27,  68 => 19,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "my-account.html", "/home/u811429539/domains/mt2.pro/public_html/xtremepvp/view/my-account.html");
    }
}
