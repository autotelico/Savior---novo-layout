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

/* ranking-guild.html */
class __TwigTemplate_1353baa5c4a4d0fdc808c241c744b955 extends Template
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
        return "structure-no-logo.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("structure-no-logo.html", "ranking-guild.html", 1);
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
                <h1>Ranking de Guildas</h1>
            </div>
            <div class=\"content-bg\">
                <div class=\"d-flex justify-content-center\">
                    <a href=\"/player-ranking\" class=\"btn btn-primary mb-3\">Ranking de Jogadores</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th scope=\"col\">#</th>
                            <th scope=\"col\" class=\"d-none d-md-table-cell\">Guilda</th>
                            <th scope=\"col\">Vitórias</th>
                            <th scope=\"col\">Derrotas</th>
                            <th scope=\"col\">Empates</th>
                            <th scope=\"col\">Reino</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["records"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["guild"]) {
            // line 27
            echo "                        <tr>
                            <th scope=\"row\" class=\"pt-3\">";
            // line 28
            echo twig_escape_filter($this->env, (($context["offset"] ?? null) + ($context["key"] + 1)), "html", null, true);
            echo "</th>
                            <td class=\"d-none d-md-table-cell\">";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "name", [], "any", false, false, false, 29), "html", null, true);
            echo "</td>
                            <td class=\"pt-3\">";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "win", [], "any", false, false, false, 30), "html", null, true);
            echo "</td>
                            <td class=\"pt-3\">";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "loss", [], "any", false, false, false, 31), "html", null, true);
            echo "</td>
                            <td class=\"pt-3\">";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["guild"], "draw", [], "any", false, false, false, 32), "html", null, true);
            echo "</td>
                            ";
            // line 33
            if ((twig_get_attribute($this->env, $this->source, $context["guild"], "empire", [], "any", false, false, false, 33) == 1)) {
                // line 34
                echo "                            <td class=\"text-danger fw-bold pt-3\">Shinso</td>
                            ";
            }
            // line 36
            echo "                            ";
            if ((twig_get_attribute($this->env, $this->source, $context["guild"], "empire", [], "any", false, false, false, 36) == 2)) {
                // line 37
                echo "                            <td class=\"text-warning fw-bold pt-3\">Chunjo</td>
                            ";
            }
            // line 39
            echo "                            ";
            if ((twig_get_attribute($this->env, $this->source, $context["guild"], "empire", [], "any", false, false, false, 39) == 3)) {
                // line 40
                echo "                            <td class=\"text-primary fw-bold pt-3\">Jinno</td>
                            ";
            }
            // line 42
            echo "                        </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['guild'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
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
        return "ranking-guild.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 44,  121 => 42,  117 => 40,  114 => 39,  110 => 37,  107 => 36,  103 => 34,  101 => 33,  97 => 32,  93 => 31,  89 => 30,  85 => 29,  81 => 28,  78 => 27,  74 => 26,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "ranking-guild.html", "/home/heron/Desktop/programming/servicos/Savior---novo-layout/Novo Site/Layout - Site Atual/public_html/view/ranking-guild.html");
    }
}
