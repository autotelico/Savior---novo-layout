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

/* forgot-change-password.html */
class __TwigTemplate_1ed7c4fd5f5aa71fcc2b35772c6b4084 extends Template
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
        $this->parent = $this->loadTemplate("structure.html", "forgot-change-password.html", 1);
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
                <h1>Alterar Senha</h1>
                <!-- Página para alterar senha com link do e-mail -->
            </div>
            <div class=\"content-bg pb-5\">
                <form method=\"POST\" action=\"/forgot/change-password\" id=\"form-login\" class=\"user-forms\">
                    <div class=\"input-group mb-3\">
                        <input type=\"password\" class=\"form-control rounded-0\" placeholder=\"Nova Senha\" aria-label=\"Password\" required pattern=\".{8,16}\" name=\"password\">
                        <span class=\"input-group-text rounded-0\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" data-bs-html=\"true\" title=\"
                        - Between 8 and 16 Characters. <br>
                        - Must have at least 1 number. <br>
                        - Must have at least 1 letter. <br>
                        - Must have at least 1 special character. <br>
                        - Must have at least 1 uppercase letter . <br>
                        \">?</span>
                    </div>
                    <div class=\"input-group mb-3\">
                        <input type=\"password\" class=\"form-control rounded-0\" placeholder=\"Confirme a Nova Senha\" aria-label=\"Confirm Password\" aria-describedby=\"basic-addon2\" required pattern=\".{8,16}\" name=\"confirm-password\">
                    </div>

                    <input type=\"hidden\" name=\"token\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 27), "html", null, true);
        echo "\">
                    <input type=\"hidden\" name=\"code\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, ($context["code"] ?? null), "html", null, true);
        echo "\">
                    ";
        // line 29
        if (twig_constant("ENABLE_CAPTCHA")) {
            // line 30
            echo "                    <div class=\"d-flex justify-content-center\">
                        <div class=\"g-recaptcha\" data-sitekey=\"";
            // line 31
            echo twig_escape_filter($this->env, twig_constant("CAPTCHA_PUBLIC_KEY"), "html", null, true);
            echo "\"></div>
                    </div>
                    ";
        }
        // line 34
        echo "
                    <div class=\"d-grid gap-2 d-md-flex justify-content-md-center mt-3\">
                        <button class=\"btn btn-primary\" type=\"submit\">Alterar Senha</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
";
    }

    public function getTemplateName()
    {
        return "forgot-change-password.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 34,  88 => 31,  85 => 30,  83 => 29,  79 => 28,  75 => 27,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "forgot-change-password.html", "/home/u261225349/domains/alcatraz2.online/public_html/view/forgot-change-password.html");
    }
}
