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

/* unstuck-char.html */
class __TwigTemplate_9b5e1db9638795064d3f36f7e577204d extends Template
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
        $this->parent = $this->loadTemplate("structure.html", "unstuck-char.html", 1);
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
                <h1>Gerenciar Personagens</h1>
            </div>
            <div class=\"content-bg\">
                <div class=\"row\">
                    <div class=\"col-md-9\">
                        <span>Para mover o personagem para a cidade, aguarde 5 minutos após deslogar.</span>
                        <div class=\"d-flex flex-column\">
                            ";
        // line 15
        if ((($context["characters"] ?? null) == [])) {
            // line 16
            echo "                            <span class=\"text-info p-3\">Você ainda não possui personagens.</span>
                            ";
        }
        // line 18
        echo "                            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["characters"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["character"]) {
            // line 19
            echo "                            <div class=\"border m-3 p-3 rounded border-danger d-flex gap-3\">
                                <div>";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["character"], "name", [], "any", false, false, false, 20), "html", null, true);
            echo " <span class=\"text-light\">(Lv. ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["character"], "level", [], "any", false, false, false, 20), "html", null, true);
            echo ")</span></div>
                                <div>
                                    <form action=\"/unstuck-char\" method=\"post\">
                                        <input type=\"hidden\" name=\"token\" value=\"";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 23), "html", null, true);
            echo "\">
                                        <input type=\"hidden\" name=\"character\" value=\"";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["character"], "name", [], "any", false, false, false, 24), "html", null, true);
            echo "\">
                                        <button class=\"btn btn-danger btn-sm\">Mover para Cidade</button>
                                    </form>
                                </div>
                            </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['character'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "                        </div>
                    </div>
                    <div class=\"col-md-3\">
                        ";
        // line 33
        $this->loadTemplate("/my-account-menu.html", "unstuck-char.html", 33)->display($context);
        echo "                   
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
";
    }

    // line 41
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 42
        $this->loadTemplate("/custom-js.html", "unstuck-char.html", 42)->display($context);
    }

    public function getTemplateName()
    {
        return "unstuck-char.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 42,  119 => 41,  107 => 33,  102 => 30,  90 => 24,  86 => 23,  78 => 20,  75 => 19,  70 => 18,  66 => 16,  64 => 15,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "unstuck-char.html", "/home/u811429539/domains/mt2.pro/public_html/xtremepvp/view/unstuck-char.html");
    }
}
