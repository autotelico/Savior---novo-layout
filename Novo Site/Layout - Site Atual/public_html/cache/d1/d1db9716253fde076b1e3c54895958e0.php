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
class __TwigTemplate_87ad50075cf4efbdcc199f50810f9ea5 extends Template
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
\t\t\t\t<div class=\"d-flex flex-column col-3 mx-auto\">
\t\t\t\t\t<a href=\"https://drive.google.com/file/d/1bPlCdOMNI9rjeUWyyuGRpjT2oU2Nwffh/view?usp=sharing\" class=\"btn btn-primary btn-lg mt-3 me-3\"><i class=\"bi bi-download\"></i> Direct Download</a>
\t\t\t\t\t<a href=\"https://drive.google.com/file/d/1bPlCdOMNI9rjeUWyyuGRpjT2oU2Nwffh/view?usp=sharing\" class=\"btn btn-primary btn-lg mt-3 me-3 position-relative\"><i class=\"bi bi-download\"></i> Google Drive
\t\t\t\t\t\t<span class=\"position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success\">
\t\t\t\t\t\tRecomendado
\t\t\t\t\t\t</span>
\t\t\t\t\t</a>
\t\t\t\t\t<a href=\"https://www.mediafire.com/file/hh3ldv78y5a9x0m/Metin2+Xtreme2.p.6.rar/file\" class=\"btn btn-primary btn-lg mt-3 me-3\"><i class=\"bi bi-download\"></i> Mediafire</a>
\t\t\t\t\t<a href=\"https://mega.nz/file/F6VmBJhT#4dot_-K8_hoRsUYaAZrLwiZ4NU8lkgdFxnEpNPYoDvQ\" class=\"btn btn-primary btn-lg mt-3 me-3\"><i class=\"bi bi-download\"></i> Mega.nz</a>
\t\t\t\t</div>
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
        return new Source("", "downloads.html", "/home/u811429539/domains/mt2.pro/public_html/xtremepvp/view/downloads.html");
    }
}
