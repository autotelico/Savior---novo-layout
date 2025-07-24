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

/* ranking-level.html */
class __TwigTemplate_fe6e1a906dae8c808dea00e0bd0aabcd extends Template
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
        $this->parent = $this->loadTemplate("structure.html", "ranking-level.html", 1);
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
                <h1>Player Ranking</h1>
            </div>
            <div class=\"content-bg\">
                <div class=\"d-flex justify-content-center\">
                    <a href=\"/guild-ranking\" class=\"btn btn-primary mb-3\">Guild Ranking</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th class=\"ranking-class\">Class</th>
                            <th>Name</th>
                            <th>Level</th>
                            <th class=\"ranking-empire\">Empire</th>
                            <th class=\"ranking-exp\">EXP</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["records"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["player"]) {
            // line 27
            echo "                        <tr>
                            <td>";
            // line 28
            echo twig_escape_filter($this->env, (($context["offset"] ?? null) + ($context["key"] + 1)), "html", null, true);
            echo "</td>
                            <td class=\"ranking-class\">";
            // line 29
            echo $this->extensions['App\Helper\TwigFunctions']->getClassImg(twig_get_attribute($this->env, $this->source, $context["player"], "job", [], "any", false, false, false, 29));
            echo "</td>
                            <td>";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "name", [], "any", false, false, false, 30), "html", null, true);
            echo "</td>
                            <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "level", [], "any", false, false, false, 31), "html", null, true);
            echo "</td>
                            <td class=\"ranking-empire\">";
            // line 32
            echo $this->extensions['App\Helper\TwigFunctions']->getEmpireFlag(twig_get_attribute($this->env, $this->source, $context["player"], "empire", [], "any", false, false, false, 32));
            echo "</td>
                            <td class=\"ranking-exp\">";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["player"], "exp", [], "any", false, false, false, 33), "html", null, true);
            echo "</td>
                        </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['player'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "                    </tbody>
                </table>
                <div class=\"d-flex justify-content-center d-none\">
                    <nav aria-label=\"Page navigation example\">
                        <ul class=\"pagination mt-5\">
                          <li class=\"page-item\">
                            <a class=\"page-link\" href=\"#\" aria-label=\"Previous\">
                              <span aria-hidden=\"true\">&laquo;</span>
                            </a>
                          </li>
                          <li class=\"page-item\"><a class=\"page-link\" href=\"#\">1</a></li>
                          <li class=\"page-item\"><a class=\"page-link\" href=\"#\">2</a></li>
                          <li class=\"page-item\"><a class=\"page-link\" href=\"#\">3</a></li>
                          <li class=\"page-item\">
                            <a class=\"page-link\" href=\"#\" aria-label=\"Next\">
                              <span aria-hidden=\"true\">&raquo;</span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                </div>
            </div>
        </div>
    </section>
</main>
";
    }

    public function getTemplateName()
    {
        return "ranking-level.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 36,  101 => 33,  97 => 32,  93 => 31,  89 => 30,  85 => 29,  81 => 28,  78 => 27,  74 => 26,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "ranking-level.html", "/home/u811429539/domains/mt2.pro/public_html/xtreme/view/ranking-level.html");
    }
}
