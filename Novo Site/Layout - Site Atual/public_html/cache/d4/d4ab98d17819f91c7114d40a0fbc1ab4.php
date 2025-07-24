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

/* login.html */
class __TwigTemplate_2bfe867b983b76b1599b7becc70cebbe extends Template
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
        $this->parent = $this->loadTemplate("structure.html", "login.html", 1);
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
                <h1>Login</h1>
            </div>
            <div class=\"content-bg pb-5\">
                <form method=\"POST\" action=\"/login\" id=\"form-login\" class=\"user-forms\">
                    <div class=\"input-group mb-3\">
                        <input type=\"text\" class=\"form-control rounded-0\" placeholder=\"Username\" aria-label=\"Username\" required pattern=\".{4,16}\" name=\"login\">
                    </div>

                    <div class=\"input-group mb-3\">
                        <input type=\"password\" class=\"form-control rounded-0\" placeholder=\"Password\" aria-label=\"Password\" required pattern=\".{8,16}\" name=\"password\">
                    </div>
                    <a href=\"/forgot\">Esqueceu o usuário ou senha?</a>
                    <input type=\"hidden\" name=\"token\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 20), "html", null, true);
        echo "\">

                    ";
        // line 22
        if (twig_constant("ENABLE_CAPTCHA")) {
            // line 23
            echo "                    <div class=\"d-flex justify-content-center pt-1\">
                        <div id=\"js-captcha\" class=\"g-recaptcha\" data-sitekey=\"";
            // line 24
            echo twig_escape_filter($this->env, twig_constant("CAPTCHA_PUBLIC_KEY"), "html", null, true);
            echo "\"></div>
                    </div>
                    ";
        }
        // line 27
        echo "                    <div class=\"d-grid gap-2 d-md-flex justify-content-md-center mt-3\">
                        <button class=\"btn btn-primary\" type=\"submit\">Entrar</button>
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
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 27,  78 => 24,  75 => 23,  73 => 22,  68 => 20,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "login.html", "/home/u811429539/domains/mt2.pro/public_html/xtremepvp/view/login.html");
    }
}
