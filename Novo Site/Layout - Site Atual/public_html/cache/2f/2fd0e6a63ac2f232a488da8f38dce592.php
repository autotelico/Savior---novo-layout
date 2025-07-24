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

/* admin/order-details.html */
class __TwigTemplate_b5e7016e57baff9f3892ab576434e781 extends Template
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
        $this->parent = $this->loadTemplate("admin/structure.html", "admin/order-details.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<link rel=\"stylesheet\" href=\"/css/sweetalert2.min.css\">
";
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "<div class=\"content-wrapper\">
    <!-- Content Header (Page header) -->
    <div class=\"content-header\">
      <div class=\"container-fluid\">
        <div class=\"row mb-2\">
          <div class=\"col-sm-6\">
            <h1 class=\"m-0\">Pedido - ";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "DisplayID", [], "any", false, false, false, 14), "html", null, true);
        echo "</h1>
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
            <div class=\"bg-dark rounded p-4 col-6 mx-auto\">
                <h4>Detalhes do Pedido</h4>
                <ul class=\"list-group list-group-flush\">
                    <li class=\"list-group-item\"><b>Login:</b> ";
        // line 35
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "login", [], "any", false, false, false, 35), "html", null, true);
        echo "</li>
                    <li class=\"list-group-item\"><b>Item:</b> ";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "product", [], "any", false, false, false, 36), "html", null, true);
        echo "</li>
                    <li class=\"list-group-item\"><b>Preço:</b> ";
        // line 37
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "price", [], "any", false, false, false, 37), 2, ",", ""), "html", null, true);
        echo "</li>
                    <li class=\"list-group-item\"><b>Moedas:</b> ";
        // line 38
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "coins", [], "any", false, false, false, 38), 0, "", "."), "html", null, true);
        echo "</li>
                    <li class=\"list-group-item\"><b>Pontos:</b> ";
        // line 39
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "DragonCoins", [], "any", false, false, false, 39), 0, "", "."), "html", null, true);
        echo "</li>
                    <li class=\"list-group-item\"><b>ID PagHiper(PIX):</b> ";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "TransactionID", [], "any", false, false, false, 40), "html", null, true);
        echo "</li>
                    <li class=\"list-group-item\"><b>Status:</b>
                      ";
        // line 42
        if (((twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 42) == "Pendente") || (twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 42) == "Em Processamento"))) {
            // line 43
            echo "                      <span class=\"badge badge-warning\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 43), "html", null, true);
            echo "</span>
                      ";
        }
        // line 45
        echo "                      ";
        if (((twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 45) == "Concluído") || (twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 45) == "Pago"))) {
            // line 46
            echo "                      <span class=\"badge badge-success\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 46), "html", null, true);
            echo "</span>
                      ";
        }
        // line 48
        echo "                      ";
        if ((((twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 48) == "Cancelado") || (twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 48) == "Negado")) || (twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 48) == "Extornado"))) {
            // line 49
            echo "                      <span class=\"badge badge-danger\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 49), "html", null, true);
            echo "</span>
                      ";
        }
        // line 51
        echo "                    </li>
                    <li class=\"list-group-item\"><b>Data:</b> ";
        // line 52
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "date", [], "any", false, false, false, 52), "d/m/Y"), "html", null, true);
        echo " às ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "date", [], "any", false, false, false, 52), "H:i:s"), "html", null, true);
        echo "</li>
                </ul>
                ";
        // line 54
        if (((twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 54) != "Concluído") && (twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 54) != "Pago"))) {
            // line 55
            echo "                <form action=\"/shop-proccess-orders/manual\" method=\"POST\" class=\"float-right\">
                  <input type=\"hidden\" name=\"token\" value=\"";
            // line 56
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 56), "html", null, true);
            echo "\">
                  <input type=\"hidden\" name=\"displayID\" value=\"";
            // line 57
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "DisplayID", [], "any", false, false, false, 57), "html", null, true);
            echo "\">
                  <button class=\"btn btn-success\">Ativar Pedido</button>
                </form>
                ";
        }
        // line 61
        echo "            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
";
    }

    // line 70
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 71
        echo "<script src=\"/js/sweetalert2.all.min.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "admin/order-details.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 71,  181 => 70,  170 => 61,  163 => 57,  159 => 56,  156 => 55,  154 => 54,  147 => 52,  144 => 51,  138 => 49,  135 => 48,  129 => 46,  126 => 45,  120 => 43,  118 => 42,  113 => 40,  109 => 39,  105 => 38,  101 => 37,  97 => 36,  93 => 35,  69 => 14,  61 => 8,  57 => 7,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/order-details.html", "/home/u811429539/domains/mt2.pro/public_html/xtreme/view/admin/order-details.html");
    }
}
