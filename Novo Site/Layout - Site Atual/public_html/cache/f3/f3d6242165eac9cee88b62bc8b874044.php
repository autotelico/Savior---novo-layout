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

/* admin/custom-page.html */
class __TwigTemplate_fc2a28609cc470d95870fc3dd471fd89 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'css' => [$this, 'block_css'],
            'content' => [$this, 'block_content'],
            'js' => [$this, 'block_js'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "admin/structure.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("admin/structure.html", "admin/custom-page.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<link rel=\"stylesheet\" href=\"/plugins/summernote/summernote-bs4.min.css\">
<link rel=\"stylesheet\" href=\"/css/sweetalert2.min.css\">
<script src=\"/js/sweetalert2.all.min.js\"></script>
";
    }

    // line 9
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "<div class=\"content-wrapper\">
    <!-- Content Header (Page header) -->
    <div class=\"content-header\">
      <div class=\"container-fluid\">
        <div class=\"row mb-2\">
          <div class=\"col-sm-6\">
            <h1 class=\"m-0\">Termos de Uso e Políticas de Privacidade</h1>
          </div><!-- /.col -->
          <div class=\"col-sm-6 d-none\">
            <ol class=\"breadcrumb float-sm-right\">
              <li class=\"breadcrumb-item\"><a href=\"#\">Home</a></li>
              <li class=\"breadcrumb-item active\">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class=\"content\">
      <div class=\"container-fluid\">
        <div class=\"row\">
          <div class=\"col-12\">
            <form action=\"/admin/tos\" method=\"post\">
                <div class=\"card\">
                  <div class=\"card-header\">
                      <h3 class=\"card-title\">Termos de Uso</h3>
                      <div class=\"card-tools\">
                        <button type=\"button\" class=\"btn btn-tool\" data-card-widget=\"collapse\">
                            <i class=\"bi bi-dash\"></i>
                        </button>
                      </div>
                  </div>
                  <div class=\"card-body\">
                      <div class=\"form-group\">
                          <textarea class=\"note-codable compose\" aria-multiline=\"true\" style=\"height: 44px;\" name=\"content\">";
        // line 46
        echo twig_get_attribute($this->env, $this->source, ($context["tos"] ?? null), "content", [], "any", false, false, false, 46);
        echo "</textarea>
                      </div>
                      <input type=\"hidden\" name=\"type\" value=\"tos\">
                      <input type=\"hidden\" name=\"token\" id=\"__token\" value=\"";
        // line 49
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 49), "html", null, true);
        echo "\">
                  </div>
                  <div class=\"card-footer\">
                    <button class=\"btn btn-primary\" type=\"submit\">Salvar</button>
                  </div>
                </div>
            </form>
            <form action=\"/admin/tos\" method=\"post\">
                <div class=\"card\">
                  <div class=\"card-header\">
                      <h3 class=\"card-title\">Políticas de Privacidade</h3>
                      <div class=\"card-tools\">
                        <button type=\"button\" class=\"btn btn-tool\" data-card-widget=\"collapse\">
                            <i class=\"bi bi-dash\"></i>
                        </button>
                      </div>
                  </div>
                  <div class=\"card-body\">
                      <div class=\"form-group\">
                          <textarea class=\"note-codable compose\" aria-multiline=\"true\" style=\"height: 44px;\" name=\"content\">";
        // line 68
        echo twig_get_attribute($this->env, $this->source, ($context["pop"] ?? null), "content", [], "any", false, false, false, 68);
        echo "</textarea>
                      </div>
                      <input type=\"hidden\" name=\"type\" value=\"pop\">
                      <input type=\"hidden\" name=\"token\" id=\"__token\" value=\"";
        // line 71
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 71), "html", null, true);
        echo "\">
                  </div>
                  <div class=\"card-footer\">
                    <button class=\"btn btn-primary\" type=\"submit\">Salvar</button>
                  </div>
                </div>
            </form>
            <form action=\"/admin/tos\" method=\"post\">
                <div class=\"card\">
                  <div class=\"card-header\">
                      <h3 class=\"card-title\">Sobre Nós</h3>
                      <div class=\"card-tools\">
                        <button type=\"button\" class=\"btn btn-tool\" data-card-widget=\"collapse\">
                            <i class=\"bi bi-dash\"></i>
                        </button>
                      </div>
                  </div>
                  <div class=\"card-body\">
                      <div class=\"form-group\">
                          <textarea class=\"note-codable compose\" aria-multiline=\"true\" style=\"height: 44px;\" name=\"content\">";
        // line 90
        echo twig_get_attribute($this->env, $this->source, ($context["about"] ?? null), "content", [], "any", false, false, false, 90);
        echo "</textarea>
                      </div>
                      <input type=\"hidden\" name=\"type\" value=\"about\">
                      <input type=\"hidden\" name=\"token\" id=\"__token\" value=\"";
        // line 93
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 93), "html", null, true);
        echo "\">
                  </div>
                  <div class=\"card-footer\">
                    <button class=\"btn btn-primary\" type=\"submit\">Salvar</button>
                  </div>
                </div>
            </form>
          </div>

        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
";
    }

    // line 111
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 112
        echo "<script src=\"/plugins/summernote/summernote-bs4.min.js\"></script>
  <script>
    \$('.compose').summernote()
  </script>
";
    }

    public function getTemplateName()
    {
        return "admin/custom-page.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 112,  184 => 111,  163 => 93,  157 => 90,  135 => 71,  129 => 68,  107 => 49,  101 => 46,  63 => 10,  59 => 9,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/custom-page.html", "/home/u811429539/domains/mt2.pro/public_html/xtreme/view/admin/custom-page.html");
    }
}
