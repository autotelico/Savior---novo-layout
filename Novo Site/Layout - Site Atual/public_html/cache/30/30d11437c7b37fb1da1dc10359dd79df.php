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

/* admin/dashboard.html */
class __TwigTemplate_1b9ca67032609cd85be5d936103b4cd9 extends Template
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
        $this->parent = $this->loadTemplate("admin/structure.html", "admin/dashboard.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<link rel=\"stylesheet\" href=\"/plugins/chart.js/Chart.css\">
<link rel=\"stylesheet\" href=\"/css/sweetalert2.min.css\">
";
    }

    // line 8
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 9
        echo "<div class=\"content-wrapper\">
    <!-- Content Header (Page header) -->
    <div class=\"content-header\">
      <div class=\"container-fluid\">
        <div class=\"row mb-2\">
          <div class=\"col-sm-6\">
            <h1 class=\"m-0\">Inicio</h1>
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
            <div class=\"info-box bg-gray\">
              <span class=\"info-box-icon\"><i class=\"bi bi-envelope\"></i></span>
              <div class=\"info-box-content\">
                <span class=\"info-box-text\">Quota de E-mails</span>
                <span class=\"info-box-number\">Limite Diário: 500</span>
                <div class=\"progress\">
                  <div class=\"progress-bar bg-success\" style=\"width: ";
        // line 40
        echo twig_escape_filter($this->env, ((($context["emailsSent"] ?? null) / 500) * 100), "html", null, true);
        echo "%;\"></div>
                </div>
                <span class=\"progress-description\">
                  ";
        // line 43
        echo twig_escape_filter($this->env, ((($context["emailsSent"] ?? null) / 500) * 100), "html", null, true);
        echo "% Utilizado (";
        echo twig_escape_filter($this->env, ($context["emailsSent"] ?? null), "html", null, true);
        echo " Enviados)
                </span>
              </div>
            </div>
          </div>

          <div class=\"col-12 col-sm-6 col-md-3\">
            <div class=\"info-box\">
              <span class=\"info-box-icon bg-info elevation-1\"><i class=\"bi bi-person-fill\"></i></span>
              <div class=\"info-box-content\">
                <span class=\"info-box-text\">Contas Criadas</span>
                <span class=\"info-box-number\">
                  ";
        // line 55
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["totalAccounts"] ?? null), 0, "", "."), "html", null, true);
        echo "
                </span>
              </div>

            </div>

          </div>

          <div class=\"col-12 col-sm-6 col-md-3\">
            <div class=\"info-box mb-3\">
              <span class=\"info-box-icon bg-danger elevation-1\"><i class=\"bi bi-cart-x-fill\"></i></span>
              <div class=\"info-box-content\">
                <span class=\"info-box-text\">Vendas Não Concluídas</span>
                <span class=\"info-box-number\">";
        // line 68
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderReports"] ?? null), "unsuccessfulSales", [], "any", false, false, false, 68), "html", null, true);
        echo "</span>
              </div>

            </div>

          </div>

          <div class=\"clearfix hidden-md-up\"></div>
          <div class=\"col-12 col-sm-6 col-md-3\">
            <div class=\"info-box mb-3\">
              <span class=\"info-box-icon bg-success elevation-1\"><i class=\"bi bi-cart-check-fill\"></i></span>
              <div class=\"info-box-content\">
                <span class=\"info-box-text\">Vendas Concluídas</span>
                <span class=\"info-box-number\">";
        // line 81
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderReports"] ?? null), "successfulSales", [], "any", false, false, false, 81), "html", null, true);
        echo "</span>
              </div>

            </div>

          </div>

          <div class=\"col-12 col-sm-6 col-md-3\">
            <div class=\"info-box mb-3\">
              <span class=\"info-box-icon bg-warning elevation-1\"><i class=\"bi bi-cash-stack\"></i></span>
              <div class=\"info-box-content\">
                <span class=\"info-box-text\">Total Recebido</span>
                <span class=\"info-box-number\">R\$ ";
        // line 93
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderReports"] ?? null), "moneyReceived", [], "any", false, false, false, 93), "html", null, true);
        echo "</span>
              </div>

            </div>

          </div>

        </div>
        <!-- /.row -->
        <div class=\"row\">
          <div class=\"col-lg-12\">
            <div class=\"card\">
              <div class=\"card-header\">
                <h3 class=\"card-title\">Últimas Vendas</h3>
              </div>
              <div class=\"card-body p-0\">
                <div class=\"table-responsive text-center\">
                  <form action=\"/admin/search/order\" method=\"post\">
                    <div class=\"d-flex col-12 my-3 col-lg-3\">
                      <input type=\"text\" name=\"displayID\" id=\"\" class=\"form-control mx-1\" placeholder=\"Nº do Pedido ou Login\" required>
                      <button class=\"btn btn-secondary\">Buscar</button>
                      <input type=\"hidden\" name=\"token\" value=\"";
        // line 114
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 114), "html", null, true);
        echo "\">
                    </div>
                  </form>
                  <table class=\"table m-0\">
                    <thead>
                      <tr>
                        <th>Pedido nº</th>
                        <th>Item</th>
                        <th>Status</th>
                        <th>Usuário</th>
                      </tr>
                    </thead>
                    <tbody>
                      ";
        // line 127
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["orders"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 128
            echo "                      <tr>
                        <td><a href=\"/admin/order/";
            // line 129
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "DisplayID", [], "any", false, false, false, 129), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "DisplayID", [], "any", false, false, false, 129), "html", null, true);
            echo "</a></td>
                        <td>";
            // line 130
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "coins", [], "any", false, false, false, 130), 0, "", "."), "html", null, true);
            echo " Cash</td>
                        <td>
                          ";
            // line 132
            if (((twig_get_attribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 132) == "Pendente") || (twig_get_attribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 132) == "Em Processamento"))) {
                // line 133
                echo "                          <span class=\"badge badge-warning\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 133), "html", null, true);
                echo "</span>
                          ";
            }
            // line 135
            echo "                          ";
            if (((twig_get_attribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 135) == "Concluído") || (twig_get_attribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 135) == "Pago"))) {
                // line 136
                echo "                          <span class=\"badge badge-success\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 136), "html", null, true);
                echo "</span>
                          ";
            }
            // line 138
            echo "                          ";
            if ((((twig_get_attribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 138) == "Cancelado") || (twig_get_attribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 138) == "Negado")) || (twig_get_attribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 138) == "Extornado"))) {
                // line 139
                echo "                          <span class=\"badge badge-danger\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 139), "html", null, true);
                echo "</span>
                          ";
            }
            // line 141
            echo "                        </td>
                        <td>";
            // line 142
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "login", [], "any", false, false, false, 142), "html", null, true);
            echo "</td>
                      </tr>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 145
        echo "                      <!-- <tr>
                        <td><a href=\"#\">OR9842</a></td>
                        <td>30.000 Cash</td>
                        <td><span class=\"badge badge-success\">Concluído</span></td>
                        <td>accountName</td>
                      </tr>
                      <tr>
                        <td><a href=\"#\">OR9842</a></td>
                        <td>30.000 Cash</td>
                        <td><span class=\"badge badge-warning\">Pendente</span></td>
                        <td>accountName</td>
                      </tr>
                      <tr>
                        <td><a href=\"#\">OR9842</a></td>
                        <td>30.000 Cash</td>
                        <td><span class=\"badge badge-danger\">Cancelada</span></td>
                        <td>accountName</td>
                      </tr>
                      <tr>
                        <td><a href=\"#\">OR9842</a></td>
                        <td>30.000 Cash</td>
                        <td><span class=\"badge badge-info\">Processando</span></td>
                        <td>accountName</td>
                      </tr>
                      <tr>
                        <td><a href=\"#\">OR9842</a></td>
                        <td>30.000 Cash</td>
                        <td><span class=\"badge badge-success\">Concluído</span></td>
                        <td>accountName</td>
                      </tr> -->
                    </tbody>
                  </table>
                </div>
              </div>
              <div class=\"card-footer text-center d-none\">
                <a href=\"#\" class=\"\">Ver Mais</a>
              </div>
            </div>
          </div>
        </div>

        <div class=\"row\">
          <div class=\"col-lg-4\">
            <div class=\"card\">
              <div class=\"card-header\">Pacotes Mais Comprados </div>
              <card class=\"body pt-3 pb-3\">
                <canvas id=\"pieChart\"
                  style=\"min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;\"></canvas>
              </card>
            </div>
          </div>

          <div class=\"col-lg-4\">
            <div class=\"card\">
              <div class=\"card-header\">
                <h3 class=\"card-title\">Quantidade de Cash</h3>
              </div>
              <div class=\"card-body p-0\">
                <div class=\"table-responsive text-center\">
                  <table class=\"table m-0\">
                    <thead>
                      <tr>
                        <th>Conta</th>
                        <th>Quantidade</th>
                      </tr>
                    </thead>
                    <tbody>
                      ";
        // line 212
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cashList"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["account"]) {
            // line 213
            echo "                        <tr>
                          <td>";
            // line 214
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["account"], "login", [], "any", false, false, false, 214), "html", null, true);
            echo "</td>
                          <td>
                            <img src=\"/img/shop/coin-icon.webp\" alt=\"\" style=\"filter: hue-rotate(170deg);\"><span class=\"text-primary\">";
            // line 216
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["account"], "cash", [], "any", false, false, false, 216), 0, "", "."), "html", null, true);
            echo "</span> /
                            <img src=\"/img/shop/coin-icon.webp\" alt=\"\" ><span class=\"text-warning\">";
            // line 217
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["account"], "mileage", [], "any", false, false, false, 217), 0, "", "."), "html", null, true);
            echo "</span>
                          </td>
                        </tr>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['account'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 221
        echo "                    </tbody>
                  </table>
                </div>
              </div>
              <div class=\"card-footer text-center\">
                <a href=\"#\" class=\"\">Ver Mais</a>
              </div>
            </div>
          </div>

          <div class=\"col-lg-4\">
            <div class=\"card\">
              <div class=\"card-header\">
                <h3 class=\"card-title\">Quantidade de Itens</h3>
              </div>
              <div class=\"card-body p-0\">
                <div class=\"table-responsive text-center\">
                  <table class=\"table m-0\">
                    <thead>
                      <tr>
                        <th>Item</th>
                        <th>Quantidade</th>
                      </tr>
                    </thead>
                    <tbody>
                      ";
        // line 246
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["itensList"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 247
            echo "                      <tr>
                        <td>";
            // line 248
            echo twig_escape_filter($this->env, $this->extensions['App\Helper\TwigFunctions']->itemName(twig_get_attribute($this->env, $this->source, $context["item"], "vnum", [], "any", false, false, false, 248)), "html", null, true);
            echo " <span class=\"text-muted\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "vnum", [], "any", false, false, false, 248), "html", null, true);
            echo "</span></td>
                        <td>";
            // line 249
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "total", [], "any", false, false, false, 249), 0, "", "."), "html", null, true);
            echo "</td>
                      </tr>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 252
        echo "                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
";
    }

    // line 267
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 268
        echo "<script src=\"/plugins/chart.js/Chart.js\"></script>
<script src=\"/js/sweetalert2.all.min.js\"></script>
  <script>
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = \$('#pieChart').get(0).getContext('2d')
    var pieData = {
      labels: [
        ";
        // line 278
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["orderReports"] ?? null), "mostPurcharsedCoins", [], "any", false, false, false, 278));
        foreach ($context['_seq'] as $context["_key"] => $context["amount"]) {
            // line 279
            echo "        '";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["amount"], "coins", [], "any", false, false, false, 279), 0, "", "."), "html", null, true);
            echo " Cash',
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['amount'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 281
        echo "      ],
      datasets: [
        {
          data: [
          ";
        // line 285
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["orderReports"] ?? null), "mostPurcharsedCoins", [], "any", false, false, false, 285));
        foreach ($context['_seq'] as $context["_key"] => $context["amount"]) {
            // line 286
            echo "          '";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["amount"], "total", [], "any", false, false, false, 286), "html", null, true);
            echo "',
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['amount'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 288
        echo "          ],
          backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var pieOptions = {
      maintainAspectRatio: false,
      responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })


  </script>
";
    }

    public function getTemplateName()
    {
        return "admin/dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  470 => 288,  461 => 286,  457 => 285,  451 => 281,  442 => 279,  438 => 278,  426 => 268,  422 => 267,  405 => 252,  396 => 249,  390 => 248,  387 => 247,  383 => 246,  356 => 221,  346 => 217,  342 => 216,  337 => 214,  334 => 213,  330 => 212,  261 => 145,  252 => 142,  249 => 141,  243 => 139,  240 => 138,  234 => 136,  231 => 135,  225 => 133,  223 => 132,  218 => 130,  212 => 129,  209 => 128,  205 => 127,  189 => 114,  165 => 93,  150 => 81,  134 => 68,  118 => 55,  101 => 43,  95 => 40,  62 => 9,  58 => 8,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/dashboard.html", "/home/u811429539/domains/mt2.pro/public_html/chaos2/view/admin/dashboard.html");
    }
}
