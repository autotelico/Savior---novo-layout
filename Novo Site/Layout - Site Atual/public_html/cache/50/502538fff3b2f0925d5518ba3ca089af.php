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

/* forgot.html */
class __TwigTemplate_1e7e068e7e2ea2ba05bee2e04f0f4b58 extends Template
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
        $this->parent = $this->loadTemplate("structure.html", "forgot.html", 1);
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
                <h1>Recuperar Usuário ou Senha</h1>
            </div>
            <div class=\"content-bg pb-5\">
                <div class=\"user-forms\">
                    <ul class=\"nav nav-pills mb-3 border-bottom pb-3 border-secondary\" id=\"pills-tab\" role=\"tablist\">
                        <li class=\"nav-item\" role=\"presentation\">
                          <button class=\"nav-link active\" id=\"pills-home-tab\" data-bs-toggle=\"pill\" data-bs-target=\"#pills-home\" type=\"button\" role=\"tab\" aria-controls=\"pills-home\" aria-selected=\"true\">Recuperar Senha</button>
                        </li>
                        <li class=\"nav-item\" role=\"presentation\">
                          <button class=\"nav-link\" id=\"pills-profile-tab\" data-bs-toggle=\"pill\" data-bs-target=\"#pills-profile\" type=\"button\" role=\"tab\" aria-controls=\"pills-profile\" aria-selected=\"false\">Recuperar Login</button>
                        </li>
                        
                      </ul>
                      <div class=\"tab-content\" id=\"pills-tabContent\">
                        <div class=\"tab-pane fade show active\" id=\"pills-home\" role=\"tabpanel\" aria-labelledby=\"pills-home-tab\">
                            <form method=\"POST\" action=\"/forgot-pw\" id=\"form-login\">            
                                <div class=\"input-group mb-3\">
                                    <input type=\"text\" class=\"form-control rounded-0\" placeholder=\"Login\" aria-label=\"Login\" required pattern=\".{4,16}\" name=\"login\">
                                </div>

                                ";
        // line 28
        if (twig_constant("ENABLE_CAPTCHA")) {
            // line 29
            echo "                                <div class=\"d-flex justify-content-center pt-1\">
                                    <div id=\"js-captcha\" class=\"g-recaptcha\" data-sitekey=\"";
            // line 30
            echo twig_escape_filter($this->env, twig_constant("CAPTCHA_PUBLIC_KEY"), "html", null, true);
            echo "\"></div>
                                </div>
                                ";
        }
        // line 33
        echo "                                <input type=\"hidden\" name=\"token\" value=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 33), "html", null, true);
        echo "\">
                                <div class=\"d-grid gap-2 d-md-flex justify-content-md-center mt-3\">
                                    <button class=\"btn btn-primary\" type=\"submit\">Enviar</button>
                                </div>
                            </form>
                        </div>
                        <div class=\"tab-pane fade\" id=\"pills-profile\" role=\"tabpanel\" aria-labelledby=\"pills-profile-tab\">
                            <form method=\"POST\" action=\"/forgot-user\" id=\"form-login\">            
                                <div class=\"input-group mb-3\">
                                    <input type=\"text\" class=\"form-control rounded-0\" placeholder=\"E-mail\" aria-label=\"E-mail\" required pattern=\".{4,16}\" name=\"email\">
                                </div>

                                ";
        // line 45
        if (twig_constant("ENABLE_CAPTCHA")) {
            // line 46
            echo "                                <div class=\"d-flex justify-content-center pt-1\">
                                    <div id=\"js-captcha\" class=\"g-recaptcha\" data-sitekey=\"";
            // line 47
            echo twig_escape_filter($this->env, twig_constant("CAPTCHA_PUBLIC_KEY"), "html", null, true);
            echo "\"></div>
                                </div>
                                ";
        }
        // line 50
        echo "                                <input type=\"hidden\" name=\"token\" value=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 50), "html", null, true);
        echo "\">
                                <div class=\"d-grid gap-2 d-md-flex justify-content-md-center mt-3\">
                                    <button class=\"btn btn-primary\" type=\"submit\">Enviar</button>
                                </div>
                            </form>
                        </div>
                      </div>
                      
                </div>
                  

            </div>
        </div>
    </section>
</main>
";
    }

    public function getTemplateName()
    {
        return "forgot.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 50,  108 => 47,  105 => 46,  103 => 45,  87 => 33,  81 => 30,  78 => 29,  76 => 28,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "forgot.html", "/home/u261225349/domains/alcatraz2.online/public_html/view/forgot.html");
    }
}
