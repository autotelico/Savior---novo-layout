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

/* register.html */
class __TwigTemplate_fe27276e38a7d52f6f11c746e2513dd0 extends Template
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
        $this->parent = $this->loadTemplate("structure.html", "register.html", 1);
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
                <h1>Nova Conta</h1>
            </div>
            <div class=\"content-bg pb-5\">
                <form onsubmit=\"return register()\" id=\"js-register-form\" class=\"user-forms\">

                    <div class=\"input-group mb-3\">
                        <input type=\"text\" class=\"form-control rounded-0\" placeholder=\"Login\" aria-label=\"Login\" required pattern=\".{4,16}\" name=\"login\">
                        <span class=\"input-group-text rounded-0\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" data-bs-html=\"true\" title=\"
                        - Between 4 and 16 Characters. <br>
                        - Must start with a letter. <br>
                        - Allowed only numbers and letters. <br>
                        \">?</span>
                    </div>

                    <div class=\"input-group mb-3\">
                        <input type=\"password\" class=\"form-control rounded-0\" placeholder=\"Password\" aria-label=\"Password\" required pattern=\".{8,16}\" name=\"password\">
                        <span class=\"input-group-text rounded-0\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" data-bs-html=\"true\" title=\"
                        - Between 8 and 16 Characters. <br>
                        - Must have at least 1 number. <br>
                        - Must have at least 1 letter. <br>
                        - Must have at least 1 special character. <br>
                        - Must have at least 1 uppercase letter . <br>
                        \">?</span>
                    </div>
                    <div class=\"input-group mb-3\">
                        <input type=\"password\" class=\"form-control rounded-0\" placeholder=\"Confirm Password\" aria-label=\"Confirm Password\" aria-describedby=\"basic-addon2\" required pattern=\".{8,16}\" name=\"confirm-password\">
                    </div>

                    <div class=\"input-group mb-3\">
                        <input type=\"email\" class=\"form-control rounded-0\" placeholder=\"Email\" aria-label=\"Email\" required name=\"email\">
                        <span class=\"input-group-text rounded-0\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" data-bs-html=\"true\" title=\"
                        - Must be a valid email. <br>
                        \">?</span>
                    </div>
                    <div class=\"input-group mb-3\">
                        <input type=\"number\" class=\"form-control rounded-0\" placeholder=\"Senha do Personagem\" aria-label=\"Senha do Personagem\" required name=\"char-code\">
                        <span class=\"input-group-text rounded-0\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" data-bs-html=\"true\" title=\"
                        - 7 Números. Ex. 123467 <br>
                        \">?</span>
                    </div>

                    <div class=\"form-check mb-3\">
                        <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"invalidCheck2\" required>
                        <label class=\"form-check-label\" for=\"invalidCheck2\">
                            By registering you agree to our <a href=\"\">Terms Of Services</a>. 
                        </label>
                    </div>
                    ";
        // line 55
        if (twig_constant("ENABLE_CAPTCHA")) {
            // line 56
            echo "                    <div class=\"d-flex justify-content-center pb-3\">
                        <div id=\"js-captcha\" class=\"g-recaptcha\" data-sitekey=\"";
            // line 57
            echo twig_escape_filter($this->env, twig_constant("CAPTCHA_PUBLIC_KEY"), "html", null, true);
            echo "\"></div>
                    </div>
                    ";
        }
        // line 60
        echo "                    <div class=\"d-grid gap-2 d-md-flex justify-content-md-center\">
                        <button class=\"btn btn-primary\" type=\"submit\" id=\"js-submit-register\">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
";
    }

    // line 69
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 70
        echo "<script>
    
function swalLoading()
{
    Swal.fire({
        title: \"Aguarde...\",
        didOpen: () => {
            Swal.showLoading();
        },
    });
}

function register() 
{
    swalLoading()
    
    const formElement = document.getElementById(\"js-register-form\")
    const formData = new FormData(formElement)
    const btnSubmit = document.getElementById(\"js-submit-register\")
    const captchaElement = document.getElementById(\"js-captcha\")

    btnSubmit.setAttribute('disabled', 'disabled')

    fetch('/register', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success === true) { 
            Swal.fire({
                title: 'Sucesso!',
                icon: 'success',
                text: data.msg,
                color: '#fff',
                confirmButtonColor: '#b71f1f'
            })
            formElement.reset()
        }

        if (data.success === false) {
            Swal.fire({
                title: 'Ops!',
                icon: 'error',
                text: data.msg,
                color: '#fff',
                confirmButtonColor: '#b71f1f'
            })
        }
    })
    // .catch(error => {
    //     Swal.fire({
    //         title: 'Ops!',
    //         icon: 'error',
    //         text: \"Atualize a página e tente novamente.\",
    //         color: '#fff',
    //         confirmButtonColor: '#b71f1f'
    //     })
    //     console.log(error)
    // })
    .finally(() => {
        if (captchaElement) {
            grecaptcha.reset();
        }
    
        btnSubmit.removeAttribute('disabled')
    })

    return false
}
</script>
";
    }

    public function getTemplateName()
    {
        return "register.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 70,  127 => 69,  115 => 60,  109 => 57,  106 => 56,  104 => 55,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "register.html", "/home/u811429539/domains/mt2.pro/public_html/chaos2/view/register.html");
    }
}
