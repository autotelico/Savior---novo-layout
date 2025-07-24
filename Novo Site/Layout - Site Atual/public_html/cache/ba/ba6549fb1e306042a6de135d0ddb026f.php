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

/* admin/shop-coins.html */
class __TwigTemplate_f1855036bbf2afb1c16d0f09c2526eea extends Template
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
        $this->parent = $this->loadTemplate("admin/structure.html", "admin/shop-coins.html", 1);
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
                    <h1 class=\"m-0\">Loja de Moedas</h1> 
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
                <div class=\"col-lg-6\">
                    <form action=\"/admin/shop-coins\" method=\"POST\">
                        <div class=\"card\">
                          <div class=\"card-header\">
                              <h3 class=\"card-title\">Novo Pacote</h3>
                              <div class=\"card-tools\">
                                <button type=\"button\" class=\"btn btn-tool\" data-card-widget=\"collapse\">
                                    <i class=\"bi bi-dash\"></i>
                                </button>
                              </div>
                          </div>
                          <div class=\"card-body\">
                            <div class=\"form-group\">
                                <input type=\"text\" class=\"form-control\" placeholder=\"Nome do Pacote\" name=\"item_name\" autocomplete=\"off\" required>
                            </div>
                            <div class=\"form-group\">
                                <input type=\"number\" min=\"1\" step=\"any\" class=\"form-control\" placeholder=\"Quantidade de Moedas\" name=\"coins_amount\" autocomplete=\"off\">
                            </div>
                            <div class=\"form-group\">
                                <input type=\"number\" min=\"0\" step=\"any\" class=\"form-control\" placeholder=\"Quantidade de Pontos\" name=\"dragon_coins_amount\" autocomplete=\"off\">
                            </div>
                            <div class=\"form-group\">
                                <input type=\"number\" min=\"1\" step=\"any\" class=\"form-control\" placeholder=\"Preço (R\$)\" name=\"price\" autocomplete=\"off\">
                            </div>
                            <div class=\"form-group\">
                                <select name=\"cash_reward\" id=\"cash_reward\" class=\"form-control\">
                                  <option value=\"0\" selected>Cash Premiado..</option>
                                  ";
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["listReward"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["reward"]) {
            // line 59
            echo "                                  <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["reward"], "id", [], "any", false, false, false, 59), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["reward"], "name", [], "any", false, false, false, 59), "html", null, true);
            echo "</option>
                                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['reward'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "                                </select>
                            </div>  
                            <div class=\"form-group\">
                              <input type=\"text\" class=\"form-control\" placeholder=\"Botão PayPal\" name=\"paypal_btn\" autocomplete=\"off\">
                            </div>
                            <input type=\"hidden\" name=\"token\" value=\"";
        // line 66
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 66), "html", null, true);
        echo "\">
                            <!-- <div class=\"form-group\">
                                <div class=\"custom-control custom-switch custom-switch-off-danger custom-switch-on-success\">
                                    <input type=\"checkbox\" class=\"custom-control-input\" id=\"enable-disable\">
                                    <label class=\"custom-control-label\" for=\"enable-disable\">Desativar/Ativar</label>
                                </div>
                            </div> -->
                              
                          </div>
                          <div class=\"card-footer\">
                              <div class=\"btn-group float-right\">
                                  <button class=\"btn btn-success\"><i class=\"bi bi-arrow-right\"></i> Salvar</button>
                              </div>
                          </div>
                        </div>
                    </form>
                </div>
                <div class=\"col-lg-6\">
                    <form action=\"/admin/cash-reward\" method=\"POST\">
                        <div class=\"card\">
                          <div class=\"card-header\">
                              <h3 class=\"card-title\">Novo Cash Premiado</h3>
                              <div class=\"card-tools\">
                                <button type=\"button\" class=\"btn btn-tool\" data-card-widget=\"collapse\">
                                    <i class=\"bi bi-dash\"></i>
                                </button>
                              </div>
                          </div>
                          <div class=\"card-body\">
                            <div class=\"form-group\">
                                <input type=\"text\" name=\"name\" class=\"form-control\" placeholder=\"Nome\" autocomplete=\"off\" required>
                            </div>
                                
                            <div id=\"dynamic-inputs\">
                                <div class=\"form-row mb-2\">
                                    <div class=\"col\">
                                    <input type=\"number\" class=\"form-control vnum-input\" name=\"vnum[]\" placeholder=\"Cód. Item\" required>
                                    </div>
                                    <div class=\"col\">
                                    <input type=\"number\" class=\"form-control amount-input\" name=\"amount[]\" placeholder=\"Quantidade\" required>
                                    </div>
                                    <div class=\"col-auto\">
                                    <button type=\"button\" class=\"btn btn-success add-input-btn\">+</button>
                                    </div>
                                    <div class=\"col-auto\">
                                    <button type=\"button\" class=\"btn btn-danger remove-input-btn\">-</button>
                                    </div>
                                </div>
                            </div>
                                
                          </div>
                          <div class=\"card-footer\">
                              <div class=\"btn-group float-right\">
                                  <button class=\"btn btn-success\"><i class=\"bi bi-arrow-right\"></i> Salvar</button>
                              </div>
                          </div>
                        </div>
                        <input type=\"hidden\" name=\"token\" value=\"";
        // line 123
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 123), "html", null, true);
        echo "\">
                    </form>
                </div>
            </div>

            <div class=\"row\">
                <div class=\"col-lg-8\">
                    <div class=\"card\">
                      <div class=\"card-header\">
                        <h3 class=\"card-title\">Pacotes Criados</h3>
                      </div>
                      <div class=\"card-body p-0\">
                        <div class=\"table-responsive text-center\">
                          <table class=\"table m-0\">
                            <thead>
                              <tr>
                                <th>Pacote</th>
                                <th>Preço</th>
                                <th>Moedas</th>
                                <th>Pontos</th>
                                <th>Cash Premiado</th>
                                <th>Visualizações</th>
                                <th>Opções</th>
                              </tr>
                            </thead>
                            <tbody>
                              ";
        // line 149
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["list"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 150
            echo "                                <tr>
                                  <td>";
            // line 151
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "itemName", [], "any", false, false, false, 151), "html", null, true);
            echo "</td>
                                  <td>R\$ ";
            // line 152
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "price", [], "any", false, false, false, 152), 2, ",", "."), "html", null, true);
            echo "</td>
                                  <td>";
            // line 153
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "coinsAmount", [], "any", false, false, false, 153), 0, ",", "."), "html", null, true);
            echo "</td>
                                  <td>";
            // line 154
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "dragonCoinsAmount", [], "any", false, false, false, 154), 0, ",", "."), "html", null, true);
            echo "</td>
                                  <td>";
            // line 155
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "cashRewardName", [], "any", false, false, false, 155), "html", null, true);
            echo "</td>
                                  <td>";
            // line 156
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "views", [], "any", false, false, false, 156), "html", null, true);
            echo "</td>
                                  <td>
                                      <form action=\"/admin/shop-coins/delete\" method=\"POST\">
                                        <input type=\"hidden\" name=\"token\" value=\"";
            // line 159
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 159), "html", null, true);
            echo "\">
                                        <input type=\"hidden\" name=\"item_link\" value=\"";
            // line 160
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "itemLink", [], "any", false, false, false, 160), "html", null, true);
            echo "\">
                                        <button class=\"btn btn-danger btn-sm\" title=\"Apagar\"><i class=\"bi bi-trash\"></i></button>
                                      </form>
                                  </td>
                                </tr>
                              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 166
        echo "                              <!-- <tr>
                                <td><a href=\"#\">Pacote 10</a></td>
                                <td>R\$10,00</td>
                                <td>10.000</td>
                                <td>1.000</td>
                                <td>Pacote 10</td>
                                <td>
                                  <div class=\"btn-group\">
                                      <a href=\"#\" class=\"btn btn-danger btn-sm\" title=\"Apagar\"><i class=\"bi bi-trash\"></i></a>
                                  </div>
                                </td>
                              </tr> -->
                              
                            </tbody>
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
                          <h3 class=\"card-title\">Cash Premiado</h3>
                        </div>
                        <div class=\"card-body p-0\">
                          <div class=\"table-responsive text-center\">
                            <table class=\"table m-0\">
                              <thead>
                                <tr>
                                  <th>Pacote</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                ";
        // line 203
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["listReward"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 204
            echo "                                <tr>
                                  <td>
                                    <div class=\"card p-0 collapsed-card m-0\">
                                      <div class=\"card-header p-1\">
                                        <div class=\"card-title d-flex\">
                                          <form action=\"/admin/cash-reward/delete\" method=\"POST\">
                                            <input type=\"hidden\" name=\"token\" value=\"";
            // line 210
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 210), "html", null, true);
            echo "\">
                                            <input type=\"hidden\" name=\"id\" value=\"";
            // line 211
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 211), "html", null, true);
            echo "\">
                                            <button class=\"btn btn-danger btn-sm\" title=\"Apagar\"><i class=\"bi bi-trash\"></i></button>
                                          </form>
                                          <span class=\"px-1\">";
            // line 214
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 214), "html", null, true);
            echo "</span>
                                        </div>
                                        <div class=\"card-tools \">
                                          <button type=\"button\" class=\"btn btn-tool btn-success btn-sm p-0\" data-card-widget=\"collapse\">
                                              <i class=\"bi bi-plus\"></i>
                                          </button>
                                        </div>
                                      </div>
                                      <div class=\"card-body\">
                                        <div class=\"d-flex flex-wrap justify-content-around align-items-center\">
                                          ";
            // line 224
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["item"], "vnum", [], "any", false, false, false, 224));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["vnum"]) {
                // line 225
                echo "                                          <div>
                                            <img src=\"/icon_shop/";
                // line 226
                echo twig_escape_filter($this->env, $this->extensions['App\Helper\TwigFunctions']->iconPath($context["vnum"]), "html", null, true);
                echo "\" alt=\"\" title=\"";
                echo twig_escape_filter($this->env, $context["vnum"], "html", null, true);
                echo "\">
                                            x";
                // line 227
                echo twig_escape_filter($this->env, (($__internal_compile_0 = twig_get_attribute($this->env, $this->source, $context["item"], "amount", [], "any", false, false, false, 227)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[(twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 227) - 1)] ?? null) : null), "html", null, true);
                echo "
                                            - ";
                // line 228
                echo twig_escape_filter($this->env, $this->extensions['App\Helper\TwigFunctions']->itemName($context["vnum"]), "html", null, true);
                echo "
                                          </div>
                                          ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vnum'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 231
            echo "                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 237
        echo "                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class=\"card-footer text-center\">
                          <a href=\"#\" class=\"\">Ver Mais</a>
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

    // line 256
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 257
        echo "<script src=\"/js/sweetalert2.all.min.js\"></script>
<script>
  \$(document).ready(function() {
      // Adicionar input
        \$(document).on('click', '.add-input-btn', function() {
            var inputGroup = \$(this).closest('.form-row');
            var newInputGroup = inputGroup.clone();
            newInputGroup.find('input').val('');
            inputGroup.after(newInputGroup);
        });

        // Remover input
        \$(document).on('click', '.remove-input-btn', function() {
            var inputGroup = \$(this).closest('.form-row');
            if (\$('#dynamic-inputs .form-row').length > 1) {
            inputGroup.remove();
            }
        });
      
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "admin/shop-coins.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  429 => 257,  425 => 256,  405 => 237,  394 => 231,  377 => 228,  373 => 227,  367 => 226,  364 => 225,  347 => 224,  334 => 214,  328 => 211,  324 => 210,  316 => 204,  312 => 203,  273 => 166,  261 => 160,  257 => 159,  251 => 156,  247 => 155,  243 => 154,  239 => 153,  235 => 152,  231 => 151,  228 => 150,  224 => 149,  195 => 123,  135 => 66,  128 => 61,  117 => 59,  113 => 58,  61 => 8,  57 => 7,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/shop-coins.html", "/home/u261225349/domains/alcatraz2.online/public_html/view/admin/shop-coins.html");
    }
}
