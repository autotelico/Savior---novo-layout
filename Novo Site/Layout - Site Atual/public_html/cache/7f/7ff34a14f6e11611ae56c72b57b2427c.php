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

/* shop-coin.html */
class __TwigTemplate_ad08816898d21ffb545db53f9bcd0e1f extends Template
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
        $this->parent = $this->loadTemplate("structure.html", "shop-coin.html", 1);
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
                <h1>Loja de Moedas</h1>
            </div>
            <div class=\"content-bg\">
                <div class=\"row\">
                    <div class=\"col-md-9\">
                        <div class=\"d-flex flex-column\">
                            ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["coinsPack"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["coinPack"]) {
            // line 15
            echo "                            <div class=\"d-flex align-items-center justify-content-md-between justify-content-center bg-darker p-3 ps-lg-5 pe-lg-5 rounded flex-wrap gap-3 mb-3 border border-dark\">
                                <div class=\"col-12 col-md-3 d-flex flex-column align-items-center\">
                                    <span class=\"text-warning fs-2 fw-bold\">
                                    ";
            // line 18
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["coinPack"], "CoinsAmount", [], "any", false, false, false, 18), "0", "", "."), "html", null, true);
            echo "</span>
                                    <span class=\"fs-6 text-secondary\">Moedas Cash</span>
                                    ";
            // line 20
            if ((twig_get_attribute($this->env, $this->source, $context["coinPack"], "getDragonCoinsAmount", [], "method", false, false, false, 20) > 0)) {
                // line 21
                echo "                                    <span class=\"fs-6 text-danger\">+ Pontos</span>
                                    ";
            }
            // line 23
            echo "                                </div>
                                <div class=\"border p-2 border-dark rounded col-12 col-md-3 text-center\">
                                    <span class=\"fs-4 text-light\">R\$";
            // line 25
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["coinPack"], "Price", [], "any", false, false, false, 25), 2, ",", "."), "html", null, true);
            echo "</span>
                                </div>
                                <div class=\"col-12 col-md-3\">
                                    <a href=\"coin/checkout/";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["coinPack"], "ItemLink", [], "any", false, false, false, 28), "html", null, true);
            echo "\" class=\"btn btn-primary btn-lg\">Comprar</a>
                                </div>
                            </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['coinPack'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "                        </div>
                    </div>
                    <div class=\"col-md-3\">
                        ";
        // line 35
        $this->loadTemplate("/my-account-menu.html", "shop-coin.html", 35)->display($context);
        echo "                   
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

";
    }

    // line 44
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 45
        $this->loadTemplate("/custom-js.html", "shop-coin.html", 45)->display($context);
    }

    public function getTemplateName()
    {
        return "shop-coin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 45,  121 => 44,  108 => 35,  103 => 32,  93 => 28,  87 => 25,  83 => 23,  79 => 21,  77 => 20,  72 => 18,  67 => 15,  63 => 14,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "shop-coin.html", "/home/u261225349/domains/alcatraz2.online/public_html/view/shop-coin.html");
    }
}
