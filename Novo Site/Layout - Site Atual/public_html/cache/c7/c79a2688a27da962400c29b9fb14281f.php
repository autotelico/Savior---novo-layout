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

/* order-list.html */
class __TwigTemplate_8f47df697b60ce3efd6c2088dee5ef20 extends Template
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
        $this->parent = $this->loadTemplate("structure.html", "order-list.html", 1);
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
                <h1>Histórico de Compras</h1>
            </div>
            <div class=\"content-bg\">
                <div class=\"row\">
                    <div class=\"col-md-9\">
                        <div class=\"pt-1 gap-5 text-start\" id=\"checkout-form\">
                            <div class=\"mb-3 d-none\">
                                <a href=\"/\" class=\"btn btn-sm btn-light\">Voltar</a>
                            </div>
                            <div class=\"d-flex align-items-center justify-content-center justify-content-lg-between flex-wrap gap-3\">
                                <h2 class=\"page-title\">Pedidos Realizados</h2>
                            </div>
                            <hr>
                            <div class=\"pt-1 gap-5 \">
                                <table class=\"table table-dark\">
                                    <thead>
                                        <tr class=\"\">
                                            <th scope=\"col\">Pedido</th>
                                            <th scope=\"col\">Item</th>
                                            <th scope=\"col\">Info.</th>
                                        </tr>
                                    </thead>
                                    <tbody class=\"table-group-divider\">
                                    ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["orders"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 32
            echo "                                        <tr class=\"\">
                                            <th scope=\"row\"><a href=\"/shop/orders/";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "getDisplayID", [], "any", false, false, false, 33), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "getDisplayID", [], "any", false, false, false, 33), "html", null, true);
            echo "</a></th>
                                            <td>";
            // line 34
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "getCoins", [], "any", false, false, false, 34), 0, "", "."), "html", null, true);
            echo " Cash</td>
                                            <td><a href=\"/shop/orders/";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "getDisplayID", [], "any", false, false, false, 35), "html", null, true);
            echo "\">Ver Detalhes</a></td>
                                        </tr>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "                                    </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-md-3\">
                        ";
        // line 44
        $this->loadTemplate("/my-account-menu.html", "order-list.html", 44)->display($context);
        echo "                   
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

";
    }

    // line 53
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 54
        $this->loadTemplate("/custom-js.html", "order-list.html", 54)->display($context);
    }

    public function getTemplateName()
    {
        return "order-list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 54,  127 => 53,  114 => 44,  106 => 38,  97 => 35,  93 => 34,  87 => 33,  84 => 32,  80 => 31,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "order-list.html", "/home/u261225349/domains/alcatraz2.online/public_html/view/order-list.html");
    }
}
