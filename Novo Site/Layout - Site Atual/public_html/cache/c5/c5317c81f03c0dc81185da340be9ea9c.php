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

/* post-category.html */
class __TwigTemplate_aa1853f155636b02fbe7ae173e96b5c0 extends Template
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
        $this->parent = $this->loadTemplate("structure.html", "post-category.html", 1);
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
                <h1>Todas as Postagens</h1>
            </div>
            <div class=\"content-bg pb-5\">
                ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 12
            echo "                <div class=\"mb-3\">
                    <div class=\"d-flex gap-3 align-items-center\">
                        <a href=\"/post/";
            // line 14
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "category", [], "any", false, false, false, 14)), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "link", [], "any", false, false, false, 14), "html", null, true);
            echo "\" class=\"\">
                            <div style=\"width:260px; height:140px; background-image: url(";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "imgUrl", [], "any", false, false, false, 15), "html", null, true);
            echo "); background-size: cover;\">
                            </div>
                        </a>
                        <div>
                            <!-- <span class=\"badge text-bg-dark\">Encerrado</span> -->
                            <a href=\"/post/";
            // line 20
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "category", [], "any", false, false, false, 20)), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "link", [], "any", false, false, false, 20), "html", null, true);
            echo "\" class=\"link-underline link-underline-opacity-0\">
                                <h1 class=\"fs-3 fw-bold\" >";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 21), "html", null, true);
            echo "</h1>
                            </a>
                            <p style=\"font-size:14px;\"><span class=\"\"><i class=\"bi bi-eye\"></i> ";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "views", [], "any", false, false, false, 23), "html", null, true);
            echo "</span></p>
                            <span class=\"\" style=\"font-size:14px;\">Data da Postagem: ";
            // line 24
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "date", [], "any", false, false, false, 24), "d/m/Y"), "html", null, true);
            echo "</span>
                        </div>
                    </div>
                    <div class=\"border-bottom border-danger mt-2\"></div>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "            </div>
        </div>
    </section>
</main>
";
    }

    public function getTemplateName()
    {
        return "post-category.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 30,  96 => 24,  92 => 23,  87 => 21,  81 => 20,  73 => 15,  67 => 14,  63 => 12,  59 => 11,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "post-category.html", "/home/u261225349/domains/alcatraz2.online/public_html/view/post-category.html");
    }
}
