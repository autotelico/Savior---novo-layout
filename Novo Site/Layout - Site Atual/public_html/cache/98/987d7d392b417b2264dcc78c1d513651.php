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

/* downloads.html */
class __TwigTemplate_04edeccc140557107068837df2ce5e05 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
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
        $this->parent = $this->loadTemplate("structure.html", "downloads.html", 1);
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
            <div class=\"content-title\">
                <h1>Downloads</h1>
            </div>
            <div class=\"content-bg text-center pb-5\">
                <span class=\"d-block\">Para jogar você precisa baixar o cliente do jogo. Escolha um dos seguintes links: </span>
                <div class=\"d-flex flex-column col-3 mx-auto\">
                    <a href=\"https://drive.google.com/file/d/1WRTOPZb5UGhowhh9lLN9O2VQNfyrI-pC/view?usp=sharing\" class=\"btn btn-primary btn-lg mt-3 me-3\"><i class=\"bi bi-download\"></i> Direct Download</a>
                    <a href=\"https://drive.google.com/file/d/1WRTOPZb5UGhowhh9lLN9O2VQNfyrI-pC/view?usp=sharing\" class=\"btn btn-primary btn-lg mt-3 me-3 position-relative\"><i class=\"bi bi-download\"></i> Google Drive
                        <span class=\"position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success\">
                        Recomendado
                        </span>
                    </a>
                    <a href=\"https://www.mediafire.com/file/1p746e8m8fyneiu/Metin2+Xtreme2.p.2.rar/file\" class=\"btn btn-primary btn-lg mt-3 me-3\"><i class=\"bi bi-download\"></i> Mediafire</a>
                    <a href=\"https://mega.nz/file/sqFgnCjQ#v71D2MTqtBGJPJtOVVn0afQi8IpPAqilrK6OGbo-7oo\" class=\"btn btn-primary btn-lg mt-3 me-3\"><i class=\"bi bi-download\"></i> Mega.nz</a>
                </div>
            </div>
        </div>
    </section>
</main>
";
    }

    public function getTemplateName()
    {
        return "downloads.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "downloads.html", "/home/u811429539/domains/mt2.pro/public_html/xtreme/view/downloads.html");
    }
}
