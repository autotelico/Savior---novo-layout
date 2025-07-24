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

/* checkout-coin.html */
class __TwigTemplate_786956782acee46a6201c0f6b71ed1ee extends Template
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
        $this->parent = $this->loadTemplate("structure.html", "checkout-coin.html", 1);
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
                                <a href=\"/shop/coin\" class=\"btn btn-sm btn-light\">Voltar</a>
                            </div>
                            <div style=\"background-color: #0e0d0d;\" class=\"rounded-3 shadow-lg text-light p-4\">
                                <h2 class=\"fs-4\">Confirme sua compra:</h2>
                                <hr>
                                Item do Pedido:
                                <ul class=\"mt-2 dot-style\">
                                    <li class=\"text-warning\">";
        // line 22
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["coin"] ?? null), "CoinsAmount", [], "any", false, false, false, 22), 0, "", "."), "html", null, true);
        echo " Moedas Cash<img src=\"/images/coin-cash.webp\" alt=\"Cash\"> </li>
                                </ul>
                                <hr>
                                Preço:
                                <ul class=\"mt-2 dot-style\">
                                    <li>R\$";
        // line 27
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["coin"] ?? null), "price", [], "any", false, false, false, 27), 2, ",", ""), "html", null, true);
        echo "</li>
                                </ul>
                                ";
        // line 29
        if (twig_get_attribute($this->env, $this->source, ($context["coin"] ?? null), "VnumAndAmount", [], "any", false, false, false, 29)) {
            // line 30
            echo "                                <hr>
                                Cash Premiado:
                                <ul class=\"dot-style\">
                                    ";
            // line 33
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["coin"] ?? null), "VnumAndAmount", [], "any", false, false, false, 33));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 34
                echo "                                    <li><img src='/icon_shop/";
                echo twig_escape_filter($this->env, $this->extensions['App\Helper\TwigFunctions']->iconPath($context["key"]), "html", null, true);
                echo "' alt=''> x";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $context["value"], 0, "", "."), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, $this->extensions['App\Helper\TwigFunctions']->itemName($context["key"]), "html", null, true);
                echo "</li>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "                                </ul>
                                ";
        }
        // line 38
        echo "                                ";
        if ((twig_get_attribute($this->env, $this->source, ($context["coin"] ?? null), "DragonCoinsAmount", [], "any", false, false, false, 38) > 0)) {
            // line 39
            echo "                                <hr>
                                Bônus:
                                <ul class=\"dot-style\">
                                    <li class=\"text-danger\"> ";
            // line 42
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["coin"] ?? null), "DragonCoinsAmount", [], "any", false, false, false, 42), 0, "", "."), "html", null, true);
            echo " Pontos</li>
                                </ul>
                                ";
        }
        // line 45
        echo "                                <hr>
                                <div class=\"alert alert-secondary\" role=\"alert\">
                                    A ativação é automática após confirmação do pagamento.
                                </div>
                            </div>
                            ";
        // line 50
        if (twig_constant("ENABLE_CAPTCHA")) {
            // line 51
            echo "                            <div class=\"mb-3 d-flex justify-content-center pt-3\">
                                <div class=\"g-recaptcha\" id=\"captcha\" data-sitekey=\"";
            // line 52
            echo twig_escape_filter($this->env, twig_constant("CAPTCHA_PUBLIC_KEY"), "html", null, true);
            echo "\"></div>
                            </div>
                            ";
        }
        // line 55
        echo "                            <div class=\"d-flex justify-content-center mt-3 gap-5 flex-wrap\">
                                <!--  -->
                                ";
        // line 57
        if ((twig_get_attribute($this->env, $this->source, ($context["coin"] ?? null), "getPaypalBtn", [], "method", false, false, false, 57) != "")) {
            // line 58
            echo "                                <form action=\"/shop/coin/checkout\" method=\"POST\" id=\"js-paypal\">
                                    <input type=\"hidden\" name=\"token\" value=\"";
            // line 59
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 59), "html", null, true);
            echo "\">
                                    <input type=\"hidden\" name=\"product\" value=\"";
            // line 60
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["coin"] ?? null), "ItemLink", [], "any", false, false, false, 60), "html", null, true);
            echo "\">
                                    <input type=\"hidden\" name=\"paymentMethod\" value=\"paypal\">
                                    <button class=\"payment-btn rounded-3 position-relative btn btn-primary\" >
                                        ";
            // line 63
            if ((twig_get_attribute($this->env, $this->source, ($context["bonus"] ?? null), "paypal", [], "any", false, false, false, 63) > 0)) {
                // line 64
                echo "                                        <span class=\"position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success\">
                                            Bônus ";
                // line 65
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["bonus"] ?? null), "paypal", [], "any", false, false, false, 65), "html", null, true);
                echo "%
                                        </span>
                                        ";
            }
            // line 68
            echo "                                        <i class=\"bi bi-paypal\"></i>
                                        <span class=\"texts\">
                                          <span class=\"text-1\">Pague com</span>
                                          <span class=\"text-2\">PayPal</span>
                                        </span>
                                    </button>
                                </form>
                                ";
        }
        // line 76
        echo "                                <!--  -->
                                <form action=\"/shop/coin/checkout\" method=\"POST\" id=\"js-pix\">
                                    <input type=\"hidden\" name=\"token\" value=\"";
        // line 78
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 78), "html", null, true);
        echo "\">
                                    <input type=\"hidden\" name=\"product\" value=\"";
        // line 79
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["coin"] ?? null), "ItemLink", [], "any", false, false, false, 79), "html", null, true);
        echo "\">
                                    <input type=\"hidden\" name=\"paymentMethod\" value=\"pix\">
                                    <button class=\"payment-btn rounded-3 position-relative btn btn-primary\" >
                                    ";
        // line 82
        if ((twig_get_attribute($this->env, $this->source, ($context["bonus"] ?? null), "pix", [], "any", false, false, false, 82) > 0)) {
            // line 83
            echo "                                    <span class=\"position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success\">
                                        Bônus ";
            // line 84
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["bonus"] ?? null), "pix", [], "any", false, false, false, 84), "html", null, true);
            echo "%
                                    </span>
                                    ";
        }
        // line 87
        echo "                                    <i class=\"bi bi-qr-code-scan\"></i>
                                    <span class=\"texts\">
                                        <span class=\"text-1\">Pague com</span>
                                        <span class=\"text-2\">Pix</span>
                                    </span>
                                    </button>
                                </form>
                                <!-- \"\" -->
                            </div>
                        </div>
                    </div>
                    <div class=\"col-md-3\">
                        ";
        // line 99
        $this->loadTemplate("/my-account-menu.html", "checkout-coin.html", 99)->display($context);
        echo "                   
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

";
    }

    // line 108
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 109
        echo "<script src=\"/js/jquery.js\"></script>
";
        // line 110
        $this->loadTemplate("/custom-js.html", "checkout-coin.html", 110)->display($context);
        // line 111
        echo "<script>
    
    \$(\"#js-paypal\").submit((e) => {
        e.preventDefault()
        const form = document.getElementById(\"js-paypal\")

        ";
        // line 117
        if (twig_constant("ENABLE_CAPTCHA")) {
            // line 118
            echo "        const captcha = document.getElementById('g-recaptcha-response').value
        const captchaInput = document.createElement('input')
        captchaInput.type = 'hidden'
        captchaInput.name = 'g-recaptcha-response'
        captchaInput.value = captcha
        form.appendChild(captchaInput)
        ";
        }
        // line 125
        echo "
        swalLoading()
        form.submit()
    })

    \$(\"#js-pix\").submit((e) => {
        e.preventDefault()
        // const form = new FormData(document.getElementById(\"js-pix\"))
        const form = document.getElementById(\"js-pix\")

        Swal.fire({
            title: 'Informações Necessárias',
            html: `<input type=\"text\" id=\"name\" class=\"form-control mb-3\" placeholder=\"Nome Completo\" autocomplete=\"off\">
            <input type=\"text\" id=\"cpf\" class=\"form-control\" placeholder=\"CPF\" autocomplete=\"off\">
            <br>
            <span class=\"text-light\" style=\"font-size:12px;\"> Seus dados não serão armazenados.</span><br>
            <span class=\"text-danger\" style=\"font-size:12px;\"> Seus dados precisam ser válidos.</span>`,
            confirmButtonText: 'Continuar',
            focusConfirm: false,
            confirmButtonColor: 'black',
            preConfirm: () => {
                const name = Swal.getPopup().querySelector('#name').value
                const cpf = Swal.getPopup().querySelector('#cpf').value

                ";
        // line 149
        if (twig_constant("ENABLE_CAPTCHA")) {
            // line 150
            echo "                const captcha = document.getElementById('g-recaptcha-response').value
                ";
        }
        // line 152
        echo "
                if (!name || !cpf) {
                    Swal.showValidationMessage(`Informe seu Nome e CPF`)
                    return;
                }

                const nameInput = document.createElement('input')
                nameInput.type = 'hidden'
                nameInput.name = 'name'
                nameInput.value = name

                const cpfInput = document.createElement('input')
                cpfInput.type = 'hidden'
                cpfInput.name = 'cpf'
                cpfInput.value = cpf

                ";
        // line 168
        if (twig_constant("ENABLE_CAPTCHA")) {
            // line 169
            echo "                const captchaInput = document.createElement('input')
                captchaInput.type = 'hidden'
                captchaInput.name = 'g-recaptcha-response'
                captchaInput.value = captcha
                form.appendChild(captchaInput)
                ";
        }
        // line 175
        echo "                
                form.appendChild(nameInput)
                form.appendChild(cpfInput)
                swalLoading()
                form.submit()

                return false
            }
        })
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "checkout-coin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  324 => 175,  316 => 169,  314 => 168,  296 => 152,  292 => 150,  290 => 149,  264 => 125,  255 => 118,  253 => 117,  245 => 111,  243 => 110,  240 => 109,  236 => 108,  223 => 99,  209 => 87,  203 => 84,  200 => 83,  198 => 82,  192 => 79,  188 => 78,  184 => 76,  174 => 68,  168 => 65,  165 => 64,  163 => 63,  157 => 60,  153 => 59,  150 => 58,  148 => 57,  144 => 55,  138 => 52,  135 => 51,  133 => 50,  126 => 45,  120 => 42,  115 => 39,  112 => 38,  108 => 36,  95 => 34,  91 => 33,  86 => 30,  84 => 29,  79 => 27,  71 => 22,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "checkout-coin.html", "/home/u811429539/domains/mt2.pro/public_html/chaos2/view/checkout-coin.html");
    }
}
