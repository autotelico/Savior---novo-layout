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

/* admin/login.html */
class __TwigTemplate_7eb14824f2770d76f907286fb77ab1f8 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback\">
  <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css\">
  <script src=\"https://www.google.com/recaptcha/api.js\" async defer></script>
  <!-- Theme style -->
  <link rel=\"stylesheet\" href=\"/dist/css/adminlte.min.css\">
  <link rel=\"stylesheet\" href=\"/css/sweetalert2.min.css\">
  <style>
    
.colored-toast.swal2-icon-success {
    background-color: #448c1a !important;
  }
  
  .colored-toast.swal2-icon-error {
    background-color: #ab1919 !important;
  }
  
  .colored-toast.swal2-icon-warning {
    background-color: #f8bb86 !important;
  }
  
  .colored-toast.swal2-icon-info {
    background-color: #3fc3ee !important;
  }
  
  .colored-toast.swal2-icon-question {
    background-color: #87adbd !important;
  }
  
  .colored-toast .swal2-title {
    color: white;
  }
  
  .colored-toast .swal2-close {
    color: white;
  }
  
  .colored-toast .swal2-html-container {
    color: white;
  }
  </style>
</head>
<body class=\"hold-transition login-page\">
<div class=\"login-box\">
  <!-- /.login-logo -->
  <div class=\"card card-outline card-primary\">
    <div class=\"card-header text-center\">
      <a href=\"/\" class=\"h1\"><b>";
        // line 55
        echo twig_escape_filter($this->env, twig_constant("SERVER_NAME"), "html", null, true);
        echo "</b></a>
    </div>
    <div class=\"card-body\">
      <p class=\"login-box-msg\">Informe seu login e senha</p>

      <form action=\"/admin/login\" method=\"post\">
        <div class=\"input-group mb-3\">
          <input type=\"text\" class=\"form-control\" placeholder=\"Login\" name=\"login\">
          <div class=\"input-group-append\">
            <div class=\"input-group-text\">
              <i class=\"bi bi-person\"></i>
            </div>
          </div>
        </div>
        <div class=\"input-group mb-3\">
          <input type=\"password\" class=\"form-control\" placeholder=\"Senha\" name=\"password\">
          <input type=\"hidden\" name=\"token\" value=\"";
        // line 71
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 71), "html", null, true);
        echo "\">
          <div class=\"input-group-append\">
            <div class=\"input-group-text\">
              <i class=\"bi bi-key\"></i>
            </div>
          </div>
        </div>
        <div class=\"row\">
          <!-- /.col -->
          <div class=\"col-4 mx-auto\">
            ";
        // line 81
        if (twig_constant("ENABLE_CAPTCHA")) {
            // line 82
            echo "              <div class=\"mb-3 d-flex justify-content-center\">
                  <div class=\"g-recaptcha\" id=\"captcha\" data-sitekey=\"";
            // line 83
            echo twig_escape_filter($this->env, twig_constant("CAPTCHA_PUBLIC_KEY"), "html", null, true);
            echo "\"></div>
              </div>
            ";
        }
        // line 86
        echo "            <button type=\"submit\" class=\"btn btn-primary btn-block\">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src=\"/plugins/jquery/jquery.min.js\"></script>
<!-- Bootstrap 4 -->
<script src=\"/plugins/bootstrap/js/bootstrap.bundle.min.js\"></script>
<!-- AdminLTE App -->
<script src=\"/dist/js/adminlte.min.js\"></script>
<script src=\"/js/sweetalert2.all.min.js\"></script>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "admin/login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 86,  130 => 83,  127 => 82,  125 => 81,  112 => 71,  93 => 55,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/login.html", "/home/u811429539/domains/mt2.pro/public_html/xtreme/view/admin/login.html");
    }
}
