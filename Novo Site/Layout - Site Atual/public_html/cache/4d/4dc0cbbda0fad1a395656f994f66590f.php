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

/* admin/search-order.html */
class __TwigTemplate_8f2595fbcd038387b78bd9a06db613d6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'css' => [$this, 'block_css'],
            'content' => [$this, 'block_content'],
            'js' => [$this, 'block_js'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "admin/structure.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("admin/structure.html", "admin/search-order.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 6
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "<div class=\"content-wrapper\">
    <!-- Content Header (Page header) -->
    <div class=\"content-header\">
      <div class=\"container-fluid\">
        <div class=\"row mb-2\">
          <div class=\"col-sm-6\">
            <h1 class=\"m-0\">Resultado da busca</h1>
          </div><!-- /.col -->
          <div class=\"col-sm-6 d-none\">
            <ol class=\"breadcrumb float-sm-right\">
              <li class=\"breadcrumb-item\"><a href=\"#\">Home</a></li>
              <li class=\"breadcrumb-item active\">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class=\"content\">
      <div class=\"container-fluid\">
        <div class=\"row\">
          <div class=\"col-12\">
            ";
        // line 31
        if ((($context["order"] ?? null) == [])) {
            // line 32
            echo "                <h3>Nenhum pedido foi encontrado.</h3>
                <br>
                <a href=\"/admin/dashboard\" class=\"btn btn-primary\">Retornar</a>
            ";
        }
        // line 36
        echo "            <div class=\"bg-dark rounded p-4 mt-3\">
                <table class=\"table m-0\">
                    <thead>
                      <tr>
                        <th>Pedido nº</th>
                        <th>Item</th>
                        <th>Status</th>
                        <th>Conta</th>
                      </tr>
                    </thead>
                    <tbody>
                      ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
            // line 48
            echo "                      <tr>
                        <td><a href=\"/admin/order/";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "DisplayID", [], "any", false, false, false, 49), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "DisplayID", [], "any", false, false, false, 49), "html", null, true);
            echo "</a></td>
                        <td>";
            // line 50
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "coins", [], "any", false, false, false, 50), 0, "", "."), "html", null, true);
            echo " Cash</td>
                        <td>
                          ";
            // line 52
            if (((twig_get_attribute($this->env, $this->source, $context["result"], "status", [], "any", false, false, false, 52) == "Pendente") || (twig_get_attribute($this->env, $this->source, $context["result"], "status", [], "any", false, false, false, 52) == "Em Processamento"))) {
                // line 53
                echo "                          <span class=\"badge badge-warning\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "status", [], "any", false, false, false, 53), "html", null, true);
                echo "</span>
                          ";
            }
            // line 55
            echo "                          ";
            if (((twig_get_attribute($this->env, $this->source, $context["result"], "status", [], "any", false, false, false, 55) == "Concluído") || (twig_get_attribute($this->env, $this->source, $context["result"], "status", [], "any", false, false, false, 55) == "Pago"))) {
                // line 56
                echo "                          <span class=\"badge badge-success\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "status", [], "any", false, false, false, 56), "html", null, true);
                echo "</span>
                          ";
            }
            // line 58
            echo "                          ";
            if ((((twig_get_attribute($this->env, $this->source, $context["result"], "status", [], "any", false, false, false, 58) == "Cancelado") || (twig_get_attribute($this->env, $this->source, $context["result"], "status", [], "any", false, false, false, 58) == "Negado")) || (twig_get_attribute($this->env, $this->source, $context["result"], "status", [], "any", false, false, false, 58) == "Extornado"))) {
                // line 59
                echo "                          <span class=\"badge badge-danger\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "status", [], "any", false, false, false, 59), "html", null, true);
                echo "</span>
                          ";
            }
            // line 61
            echo "                        </td>
                        <td>";
            // line 62
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["result"], "login", [], "any", false, false, false, 62), "html", null, true);
            echo "</td>
                      </tr>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "                    </tbody>
                </table>    
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
";
    }

    // line 76
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "admin/search-order.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 76,  161 => 65,  152 => 62,  149 => 61,  143 => 59,  140 => 58,  134 => 56,  131 => 55,  125 => 53,  123 => 52,  118 => 50,  112 => 49,  109 => 48,  105 => 47,  92 => 36,  86 => 32,  84 => 31,  58 => 7,  54 => 6,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/search-order.html", "/home/u811429539/domains/mt2.pro/public_html/xtreme/view/admin/search-order.html");
    }
}
