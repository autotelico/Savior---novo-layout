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

/* admin/shop-promotion.html */
class __TwigTemplate_98be528da603ab7070c1bad139ae8191 extends Template
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
        $this->parent = $this->loadTemplate("admin/structure.html", "admin/shop-promotion.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<link rel=\"stylesheet\" href=\"/css/sweetalert2.min.css\">
";
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "<div class=\"content-wrapper\">
  <!-- Content Header (Page header) -->
  <div class=\"content-header\">
      <div class=\"container-fluid\">
          <div class=\"row mb-2\">
              <div class=\"col-sm-6\">
                  <h1 class=\"m-0\">Promoções</h1> 
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
              <div class=\"col-lg-4\">
                  <form action=\"/admin/shop-promotion/payment-bonus\" method=\"POST\">
                      <div class=\"card\">
                        <div class=\"card-header\">
                            <h3 class=\"card-title\">Bônus Compra de Moedas (%)</h3>
                            <div class=\"card-tools\">
                              <button type=\"button\" class=\"btn btn-tool\" data-card-widget=\"collapse\">
                                  <i class=\"bi bi-dash\"></i>
                              </button>
                            </div>
                        </div>
                        <div class=\"card-body\">
                          <div class=\"form-row\">
                              <div class=\"col\">
                                  <div class=\"form-group\">
                                      <label for=\"\">Pix</label>
                                      <input type=\"number\" class=\"form-control\" name=\"pix\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["coinPaymentBonus"] ?? null), "pix", [], "any", false, false, false, 48), "html", null, true);
        echo "\">
                                  </div>
                              </div>
                              <div class=\"col\">
                                  <div class=\"form-group\">
                                      <label for=\"\">PayPal</label>
                                      <input type=\"number\" class=\"form-control\" name=\"paypal\" value=\"";
        // line 54
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["coinPaymentBonus"] ?? null), "paypal", [], "any", false, false, false, 54), "html", null, true);
        echo "\">
                                  </div>
                              </div>
                              <input type=\"hidden\" name=\"token\" value=\"";
        // line 57
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 57), "html", null, true);
        echo "\">
                          </div>
                          <span class=\"text-muted\">* Quantidade em Porcentagem.</span>
                      
                        </div>
                        <div class=\"card-footer\">
                            <div class=\"btn-group float-right\">
                                <button class=\"btn btn-success\"><i class=\"bi bi-arrow-right\"></i> Salvar</button>
                            </div>
                        </div>
                      </div>
                  </form>
              </div>
              
          </div>


      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

";
    }

    // line 82
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 83
        echo "<script src=\"/js/sweetalert2.all.min.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "admin/shop-promotion.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 83,  145 => 82,  118 => 57,  112 => 54,  103 => 48,  61 => 8,  57 => 7,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/shop-promotion.html", "/home/u811429539/domains/mt2.pro/public_html/xtreme/view/admin/shop-promotion.html");
    }
}
