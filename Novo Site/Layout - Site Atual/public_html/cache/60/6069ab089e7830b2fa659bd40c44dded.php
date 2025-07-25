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

/* home.html */
class __TwigTemplate_8cf33a9d267aa18b6d3a91de1dcb2bfd extends Template
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
        $this->parent = $this->loadTemplate("structure.html", "home.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<main>
    <div class=\"top-players-home text-center\">
        <h1 class=\"fw-bold\">Top Players</h1>
        <span class=\"fw-bold\">By Class</span>
    </div>
    <section class=\"top-players-cards\">
        <div class=\"container\">
            <div class=\"player-top-class-slide\">
                <div>
                    <div class=\"player-card mb-2\">
                        <div class=\"player-bg-card ";
        // line 14
        if (((($__internal_compile_0 = (($__internal_compile_1 = ($context["topClass"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["warrior"] ?? null) : null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["job"] ?? null) : null) == 0)) {
            echo "warrior-m";
        } else {
            echo "warrior-f";
        }
        echo "\">
                            <p class=\"player-name m-0\">";
        // line 15
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "warrior", [], "array", false, true, false, 15), "name", [], "array", true, true, false, 15) &&  !(null === (($__internal_compile_2 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "warrior", [], "array", false, true, false, 15)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["name"] ?? null) : null)))) ? (print (twig_escape_filter($this->env, (($__internal_compile_3 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "warrior", [], "array", false, true, false, 15)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["name"] ?? null) : null), "html", null, true))) : (print ("-")));
        echo "</p>
                            <p class=\"player-level m-0\">Nível: ";
        // line 16
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "warrior", [], "array", false, true, false, 16), "level", [], "array", true, true, false, 16) &&  !(null === (($__internal_compile_4 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "warrior", [], "array", false, true, false, 16)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["level"] ?? null) : null)))) ? (print (twig_escape_filter($this->env, (($__internal_compile_5 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "warrior", [], "array", false, true, false, 16)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["level"] ?? null) : null), "html", null, true))) : (print ("-")));
        echo "</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class=\"player-card mb-2\">
                        <div class=\"player-bg-card ";
        // line 22
        if (((($__internal_compile_6 = (($__internal_compile_7 = ($context["topClass"] ?? null)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["assassin"] ?? null) : null)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["job"] ?? null) : null) == 1)) {
            echo "ninja-f";
        } else {
            echo "ninja-m";
        }
        echo "\">
                            <p class=\"player-name m-0\">";
        // line 23
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "assassin", [], "array", false, true, false, 23), "name", [], "array", true, true, false, 23) &&  !(null === (($__internal_compile_8 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "assassin", [], "array", false, true, false, 23)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["name"] ?? null) : null)))) ? (print (twig_escape_filter($this->env, (($__internal_compile_9 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "assassin", [], "array", false, true, false, 23)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9["name"] ?? null) : null), "html", null, true))) : (print ("-")));
        echo "</p>
                            <p class=\"player-level m-0\">Nível: ";
        // line 24
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "assassin", [], "array", false, true, false, 24), "level", [], "array", true, true, false, 24) &&  !(null === (($__internal_compile_10 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "assassin", [], "array", false, true, false, 24)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10["level"] ?? null) : null)))) ? (print (twig_escape_filter($this->env, (($__internal_compile_11 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "assassin", [], "array", false, true, false, 24)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11["level"] ?? null) : null), "html", null, true))) : (print ("-")));
        echo "</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class=\"player-card mb-2\">
                        <div class=\"player-bg-card ";
        // line 30
        if (((($__internal_compile_12 = (($__internal_compile_13 = ($context["topClass"] ?? null)) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13["sura"] ?? null) : null)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12["job"] ?? null) : null) == 2)) {
            echo "shura-m";
        } else {
            echo "shura-f";
        }
        echo "\">
                            <p class=\"player-name m-0\">";
        // line 31
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "sura", [], "array", false, true, false, 31), "name", [], "array", true, true, false, 31) &&  !(null === (($__internal_compile_14 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "sura", [], "array", false, true, false, 31)) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14["name"] ?? null) : null)))) ? (print (twig_escape_filter($this->env, (($__internal_compile_15 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "sura", [], "array", false, true, false, 31)) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15["name"] ?? null) : null), "html", null, true))) : (print ("-")));
        echo "</p>
                            <p class=\"player-level m-0\">Nível: ";
        // line 32
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "sura", [], "array", false, true, false, 32), "level", [], "array", true, true, false, 32) &&  !(null === (($__internal_compile_16 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "sura", [], "array", false, true, false, 32)) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16["level"] ?? null) : null)))) ? (print (twig_escape_filter($this->env, (($__internal_compile_17 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "sura", [], "array", false, true, false, 32)) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17["level"] ?? null) : null), "html", null, true))) : (print ("-")));
        echo "</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class=\"player-card mb-2\">
                        <div class=\"player-bg-card ";
        // line 38
        if (((($__internal_compile_18 = (($__internal_compile_19 = ($context["topClass"] ?? null)) && is_array($__internal_compile_19) || $__internal_compile_19 instanceof ArrayAccess ? ($__internal_compile_19["shaman"] ?? null) : null)) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18["job"] ?? null) : null) == 3)) {
            echo "shaman-f";
        } else {
            echo "shaman-m";
        }
        echo "\">
                            <p class=\"player-name m-0\">";
        // line 39
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "shaman", [], "array", false, true, false, 39), "name", [], "array", true, true, false, 39) &&  !(null === (($__internal_compile_20 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "shaman", [], "array", false, true, false, 39)) && is_array($__internal_compile_20) || $__internal_compile_20 instanceof ArrayAccess ? ($__internal_compile_20["name"] ?? null) : null)))) ? (print (twig_escape_filter($this->env, (($__internal_compile_21 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "shaman", [], "array", false, true, false, 39)) && is_array($__internal_compile_21) || $__internal_compile_21 instanceof ArrayAccess ? ($__internal_compile_21["name"] ?? null) : null), "html", null, true))) : (print ("-")));
        echo "</p>
                            <p class=\"player-level m-0\">Nível: ";
        // line 40
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "shaman", [], "array", false, true, false, 40), "level", [], "array", true, true, false, 40) &&  !(null === (($__internal_compile_22 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "shaman", [], "array", false, true, false, 40)) && is_array($__internal_compile_22) || $__internal_compile_22 instanceof ArrayAccess ? ($__internal_compile_22["level"] ?? null) : null)))) ? (print (twig_escape_filter($this->env, (($__internal_compile_23 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "shaman", [], "array", false, true, false, 40)) && is_array($__internal_compile_23) || $__internal_compile_23 instanceof ArrayAccess ? ($__internal_compile_23["level"] ?? null) : null), "html", null, true))) : (print ("-")));
        echo "</p>
                        </div>
                    </div>
                </div>
                ";
        // line 44
        if (twig_constant("USE_LYCAN")) {
            // line 45
            echo "                <div>
                    <div class=\"player-card mb-2\">
                        <div class=\"player-bg-card lycan-m\">
                            <p class=\"player-name m-0\">";
            // line 48
            (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "lycan", [], "array", false, true, false, 48), "name", [], "array", true, true, false, 48) &&  !(null === (($__internal_compile_24 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "lycan", [], "array", false, true, false, 48)) && is_array($__internal_compile_24) || $__internal_compile_24 instanceof ArrayAccess ? ($__internal_compile_24["name"] ?? null) : null)))) ? (print (twig_escape_filter($this->env, (($__internal_compile_25 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "lycan", [], "array", false, true, false, 48)) && is_array($__internal_compile_25) || $__internal_compile_25 instanceof ArrayAccess ? ($__internal_compile_25["name"] ?? null) : null), "html", null, true))) : (print ("-")));
            echo "</p>
                            <p class=\"player-level m-0\">Nível: ";
            // line 49
            (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "lycan", [], "array", false, true, false, 49), "level", [], "array", true, true, false, 49) &&  !(null === (($__internal_compile_26 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "lycan", [], "array", false, true, false, 49)) && is_array($__internal_compile_26) || $__internal_compile_26 instanceof ArrayAccess ? ($__internal_compile_26["level"] ?? null) : null)))) ? (print (twig_escape_filter($this->env, (($__internal_compile_27 = twig_get_attribute($this->env, $this->source, ($context["topClass"] ?? null), "lycan", [], "array", false, true, false, 49)) && is_array($__internal_compile_27) || $__internal_compile_27 instanceof ArrayAccess ? ($__internal_compile_27["level"] ?? null) : null), "html", null, true))) : (print ("-")));
            echo "</p>
                        </div>
                    </div>
                </div>
                ";
        }
        // line 54
        echo "            </div>
        </div>
    </section>
    <section class=\"home-container home-news-bg\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-6 mb-5 mb-md-0\">
                    <h2 class=\"fw-bold\">Notícias <a href=\"/posts\">+</a></h2>
                    <ul class=\"news-home-list\">
                        ";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 64
            echo "                        <li>
                            <div class=\"d-flex gap-1\">
                                <b>[<a href=\"/post/";
            // line 66
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "getCategory", [], "method", false, false, false, 66)), "html", null, true);
            echo "\" class=\"text-light\">";
            echo twig_escape_filter($this->env, $this->extensions['App\Helper\TwigFunctions']->postCategory(twig_get_attribute($this->env, $this->source, $context["post"], "getCategory", [], "method", false, false, false, 66)), "html", null, true);
            echo "</a>]</b>
                                <a href=\"/post/";
            // line 67
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "getCategory", [], "method", false, false, false, 67)), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "getLink", [], "method", false, false, false, 67), "html", null, true);
            echo "\" class=\"text-light\"> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "getTitle", [], "method", false, false, false, 67), "html", null, true);
            echo "</a>
                            </div>
                            <i>";
            // line 69
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "getDate", [], "method", false, false, false, 69), "d/m/Y"), "html", null, true);
            echo "</i>
                        </li>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "                    </ul>
                </div>
                <div class=\"col-md-6\">
                    <h2 class=\"fw-bold\">Eventos <a href=\"/posts/event\">+</a></h2>
                    <div class=\"carousel-size\">
                        <div id=\"carouselExampleCaptions\" class=\"carousel slide\" data-bs-ride=\"carousel\">
                            <div class=\"carousel-inner\">
                            ";
        // line 79
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posts"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 80
            echo "                            ";
            if ((twig_get_attribute($this->env, $this->source, $context["post"], "getCategory", [], "method", false, false, false, 80) == "EVENT")) {
                // line 81
                echo "                            <div class=\"carousel-item ";
                if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 81)) {
                    echo "active";
                }
                echo "\">
                                <a href=\"/post/";
                // line 82
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "getCategory", [], "method", false, false, false, 82)), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "getLink", [], "method", false, false, false, 82), "html", null, true);
                echo "\">
                                    <img src=\"";
                // line 83
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "getImgUrl", [], "method", false, false, false, 83), "html", null, true);
                echo "\" class=\"d-block w-100\" alt=\"Slider\">
                                    <div class=\"carousel-caption p-0\">
                                      <h5 class=\"m-1\">";
                // line 85
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "getTitle", [], "any", false, false, false, 85), "html", null, true);
                echo "</h5>
                                      <p class=\"m-0\"></p>
                                    </div>
                                </a>
                            </div>
                            ";
            }
            // line 91
            echo "                            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        echo "                            </div>
                            <button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide=\"prev\">
                              <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
                              <span class=\"visually-hidden\">Previous</span>
                            </button>
                            <button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#carouselExampleCaptions\" data-bs-slide=\"next\">
                              <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
                              <span class=\"visually-hidden\">Next</span>
                            </button>
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
        return "home.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  276 => 92,  262 => 91,  253 => 85,  248 => 83,  242 => 82,  235 => 81,  232 => 80,  215 => 79,  206 => 72,  197 => 69,  188 => 67,  182 => 66,  178 => 64,  174 => 63,  163 => 54,  155 => 49,  151 => 48,  146 => 45,  144 => 44,  137 => 40,  133 => 39,  125 => 38,  116 => 32,  112 => 31,  104 => 30,  95 => 24,  91 => 23,  83 => 22,  74 => 16,  70 => 15,  62 => 14,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "home.html", "/home/heron/Desktop/programming/servicos/Savior---novo-layout/Novo Site/Layout - Site Atual/public_html/view/home.html");
    }
}
