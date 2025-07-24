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

/* order-details.html */
class __TwigTemplate_1d294cd4e6f27c02cd79a8c5dad8d9e4 extends Template
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
        $this->parent = $this->loadTemplate("structure.html", "order-details.html", 1);
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
                        <div class=\"pt-1 gap-5 text-start\" id=\"checkout-form\">
                            <div class=\"mb-3\">
                                <a href=\"/shop/orders\" class=\"btn btn-sm btn-light\">Voltar</a>
                              </div>
                            <div class=\"d-flex align-items-center justify-content-center justify-content-lg-between flex-wrap gap-3\">
                                <h2 class=\"page-title\">Pedido ";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "DisplayID", [], "any", false, false, false, 18), "html", null, true);
        echo "</h2>
                            </div>
                            <hr>
                            <div class=\"pt-1 gap-5 \">
                                <div  class=\"rounded-3 shadow-lg text-light p-4\">
                                    Item do Pedido:
                                    <ul class=\"mt-2 dot-style\">
                                        <li class=\"text-warning\">";
        // line 25
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "coins", [], "any", false, false, false, 25), 0, "", "."), "html", null, true);
        echo " Moedas Cash</li>
                                    </ul>
                                    <hr>
                                    Preço:
                                    <ul class=\"mt-2 dot-style\">
                                        <li>R\$";
        // line 30
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "price", [], "any", false, false, false, 30), 2, ",", ""), "html", null, true);
        echo "</li>
                                    </ul>
                                    ";
        // line 32
        if ((twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "DragonCoins", [], "any", false, false, false, 32) > 0)) {
            // line 33
            echo "                                    <hr>
                                    Bônus:
                                    <ul class=\"mt-2 dot-style text-danger\">
                                        <li>";
            // line 36
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "DragonCoins", [], "any", false, false, false, 36), 0, "", "."), "html", null, true);
            echo " Pontos</li>
                                    </ul>
                                    ";
        }
        // line 39
        echo "                                    <hr>
                                    Detalhes:
                                    <ul class=\"mt-2 dot-style\">
                                        ";
        // line 42
        echo $this->extensions['App\Helper\TwigFunctions']->invoiceStatus(twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 42));
        echo "
                                        <li>Pagamento: ";
        // line 43
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "PaymentMethod", [], "any", false, false, false, 43), "html", null, true);
        echo "</li>
                                    </ul>
                                    <hr>
                                    ";
        // line 46
        if (((twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 46) == "Pendente") || (twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 46) == "Em Processamento"))) {
            // line 47
            echo "                                    <h2 class=\"fs-4\">Pagamento:</h2>
                                    <br>
                                    ";
            // line 49
            if ((twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "PaymentMethod", [], "any", false, false, false, 49) == "PIX")) {
                // line 50
                echo "                                    <div class=\"text-center\">
                                        <span class=\"\" style=\"font-size:11px;\">Escaneie o QR Code ou copie o código para realizar o pagamento.</span>
                                        <br>
                                        <img class=\"mt-2 mb-3\" style=\"width:350px;\" src=\"data:image/png;base64,";
                // line 53
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pix"] ?? null), "qrCode", [], "any", false, false, false, 53), "html", null, true);
                echo "\" alt=\"\">
                                        <br>
                                        <span class=\"text-light\">Pix Copia e Cola:</span>
                                        <br>
                                        <div style=\"user-select: text;\">
                                            ";
                // line 58
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pix"] ?? null), "code", [], "any", false, false, false, 58), "html", null, true);
                echo "
                                        </div>
                                    </div>
                                    ";
            }
            // line 62
            echo "                                    ";
            if (((twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "PaymentMethod", [], "any", false, false, false, 62) == "PAYPAL") && (twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "TransactionID", [], "any", false, false, false, 62) != ""))) {
                // line 63
                echo "                                    <div id=\"donate-button-container\">
                                        <div id=\"donate-button\"></div>
                                        <script src=\"https://www.paypalobjects.com/donate/sdk/donate-sdk.js\" charset=\"UTF-8\"></script>
                                        <script>
                                        PayPal.Donation.Button({
                                        env:'production',
                                        hosted_button_id: '";
                // line 69
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "TransactionID", [], "any", false, false, false, 69), "html", null, true);
                echo "',
                                        custom: '";
                // line 70
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "DisplayID", [], "any", false, false, false, 70), "html", null, true);
                echo "',
                                        image: {
                                        src:'https://pics.paypal.com/00/s/ZjI3NDUxYjQtMTZjMi00NWViLTkxMTItYzEyOTEwODhhNTk2/file.PNG',
                                        alt:'Faça doações com o botão do PayPal',
                                        title:'PayPal - The safer, easier way to pay online!',
                                        }
                                        }).render('#donate-button');
                                        </script>
                                    </div>
                                    ";
            }
            // line 80
            echo "                                    
                                    <hr>
                                    ";
        }
        // line 83
        echo "                                    <div class=\"alert alert-secondary\" role=\"alert\">
                                        A ativação é automática após confirmação do pagamento.
                                        ";
        // line 85
        if ((twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "PaymentMethod", [], "any", false, false, false, 85) == "PAYPAL")) {
            // line 86
            echo "                                        <hr>
                                        Caso já tenha realizado o pagamento, aguarde ou entre em contato com o suporte.
                                        ";
        }
        // line 89
        echo "                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-md-3\">
                        ";
        // line 96
        $this->loadTemplate("/my-account-menu.html", "order-details.html", 96)->display($context);
        echo "                   
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

";
    }

    // line 105
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 106
        $this->loadTemplate("/custom-js.html", "order-details.html", 106)->display($context);
    }

    public function getTemplateName()
    {
        return "order-details.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 106,  212 => 105,  199 => 96,  190 => 89,  185 => 86,  183 => 85,  179 => 83,  174 => 80,  161 => 70,  157 => 69,  149 => 63,  146 => 62,  139 => 58,  131 => 53,  126 => 50,  124 => 49,  120 => 47,  118 => 46,  112 => 43,  108 => 42,  103 => 39,  97 => 36,  92 => 33,  90 => 32,  85 => 30,  77 => 25,  67 => 18,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "order-details.html", "/home/u811429539/domains/mt2.pro/public_html/xtreme/view/order-details.html");
    }
}
