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

/* admin/structure.html */
class __TwigTemplate_b2ebab1fff8e1f85e6931e57e2e73d42 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'css' => [$this, 'block_css'],
            'content' => [$this, 'block_content'],
            'js' => [$this, 'block_js'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"pt\">
<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>";
        // line 6
        echo twig_escape_filter($this->env, twig_constant("SERVER_NAME"), "html", null, true);
        echo " - Administração</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel=\"stylesheet\"
        href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback\">
    <!-- Bootstrap Icons -->
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css\">
    <!-- Theme style -->
    <link rel=\"stylesheet\" href=\"/dist/css/adminlte.min.css\">
    ";
        // line 15
        $this->displayBlock('css', $context, $blocks);
        // line 17
        echo "</head>

<body class=\"hold-transition sidebar-mini dark-mode\">
    <div class=\"wrapper\">

        <!-- Navbar -->
        <nav class=\"main-header navbar navbar-expand navbar-dark navbar-light\">
            <!-- Left navbar links -->
            <ul class=\"navbar-nav\">
                <li class=\"nav-item\">
                    <a class=\"nav-link\" data-widget=\"pushmenu\" href=\"#\" role=\"button\"><i
                            class=\"bi bi-layout-sidebar-inset\"></i></a>
                </li>
                <li class=\"nav-item d-none d-sm-inline-block\">
                    <a href=\"/\" class=\"nav-link\">";
        // line 31
        echo twig_escape_filter($this->env, twig_constant("SERVER_NAME"), "html", null, true);
        echo " - Site Principal</a>
                </li>
                <li class=\"nav-item d-none\">
                    <a href=\"#\" class=\"nav-link\">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class=\"navbar-nav ml-auto\">
                <!-- Navbar Search -->
                <li class=\"nav-item d-none\">
                    <a class=\"nav-link\" data-widget=\"navbar-search\" href=\"#\" role=\"button\">
                        <i class=\"bi bi-search\"></i>
                    </a>
                    <div class=\"navbar-search-block\">
                        <form class=\"form-inline\">
                            <div class=\"input-group input-group-sm\">
                                <input class=\"form-control form-control-navbar\" type=\"search\" placeholder=\"Search\"
                                    aria-label=\"Search\">
                                <div class=\"input-group-append\">
                                    <button class=\"btn btn-navbar\" type=\"submit\">
                                        <i class=\"bi bi-search\"></i>
                                    </button>
                                    <button class=\"btn btn-navbar\" type=\"button\" data-widget=\"navbar-search\">
                                        <i class=\"bi bi-x\"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class=\"nav-item dropdown d-none\">
                    <a class=\"nav-link\" data-toggle=\"dropdown\" href=\"#\">
                        <i class=\"bi bi-chat-left\"></i>
                        <span class=\"badge badge-danger navbar-badge\">3</span>
                    </a>
                    <div class=\"dropdown-menu dropdown-menu-lg dropdown-menu-right\">
                        <a href=\"#\" class=\"dropdown-item\">
                            <!-- Message Start -->
                            <div class=\"media\">
                                <div class=\"media-body\">
                                    <h3 class=\"dropdown-item-title\">
                                        accountName
                                        <span class=\"float-right text-sm text-danger\"><i
                                                class=\"bi bi-star-fill\"></i></i></span>
                                    </h3>
                                    <p class=\"text-sm\">Conta Roubada</p>
                                    <p class=\"text-sm text-muted\"><i class=\"bi bi-clock\"></i> 4 Horas atrás.</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class=\"dropdown-divider\"></div>
                        <a href=\"#\" class=\"dropdown-item\">
                            <!-- Message Start -->
                            <div class=\"media\">
                                <div class=\"media-body\">
                                    <h3 class=\"dropdown-item-title\">
                                        accountName
                                        <span class=\"float-right text-sm text-danger\"><i
                                                class=\"bi bi-star-fill\"></i></i></span>
                                    </h3>
                                    <p class=\"text-sm\">Conta Roubada</p>
                                    <p class=\"text-sm text-muted\"><i class=\"bi bi-clock\"></i> 4 Horas atrás.</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class=\"dropdown-divider\"></div>
                        <a href=\"#\" class=\"dropdown-item\">
                            <!-- Message Start -->
                            <div class=\"media\">
                                <div class=\"media-body\">
                                    <h3 class=\"dropdown-item-title\">
                                        accountName
                                        <span class=\"float-right text-sm text-danger\"><i
                                                class=\"bi bi-star-fill\"></i></i></span>
                                    </h3>
                                    <p class=\"text-sm\">Conta Roubada</p>
                                    <p class=\"text-sm text-muted\"><i class=\"bi bi-clock\"></i> 4 Horas atrás.</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class=\"dropdown-divider\"></div>
                        <a href=\"#\" class=\"dropdown-item dropdown-footer\">Ver Todos</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class=\"nav-item dropdown d-none\">
                    <a class=\"nav-link\" data-toggle=\"dropdown\" href=\"#\">
                        <i class=\"bi bi-bell\"></i>
                        <span class=\"badge badge-warning navbar-badge\">15</span>
                    </a>
                    <div class=\"dropdown-menu dropdown-menu-lg dropdown-menu-right\">
                        <span class=\"dropdown-header\">15 Notifications</span>
                        <div class=\"dropdown-divider\"></div>
                        <a href=\"#\" class=\"dropdown-item\">
                            <i class=\"bi bi-envelope mr-2\"></i> 4 new messages
                            <span class=\"float-right text-muted text-sm\">3 mins</span>
                        </a>
                        <div class=\"dropdown-divider\"></div>
                        <a href=\"#\" class=\"dropdown-item\">
                            <i class=\"bi bi-people mr-2\"></i> 8 friend requests
                            <span class=\"float-right text-muted text-sm\">12 hours</span>
                        </a>
                        <div class=\"dropdown-divider\"></div>
                        <a href=\"#\" class=\"dropdown-item\">
                            <i class=\"bi bi-file-earmark mr-2\"></i> 3 new reports
                            <span class=\"float-right text-muted text-sm\">2 days</span>
                        </a>
                        <div class=\"dropdown-divider\"></div>
                        <a href=\"#\" class=\"dropdown-item dropdown-footer\">See All Notifications</a>
                    </div>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" data-widget=\"fullscreen\" href=\"#\" role=\"button\">
                        <i class=\"bi bi-arrows-fullscreen\"></i>
                    </a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" data-widget=\"control-sidebar\" data-slide=\"true\" href=\"#\" role=\"button\">
                        <i class=\"bi bi-info-circle\"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class=\"main-sidebar sidebar-dark-primary elevation-4\">
            <!-- Brand Logo -->
            

            <!-- Sidebar -->
            <div class=\"sidebar\">
                <!-- Sidebar user panel (optional) -->
                <div class=\"user-panel mt-3 pb-3 mb-3 d-flex justify-content-center\">
                    <div class=\"info\">
                        <a href=\"#\" class=\"d-block\">Bem vindo(a), ";
        // line 172
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "login", [], "any", false, false, false, 172), "html", null, true);
        echo "</a>
                    </div>
                    <a href=\"/logout\" class=\"btn btn-sm btn-primary\">Sair</a>
                </div>

                <!-- SidebarSearch Form -->
                <div class=\"form-inline d-none\">
                    <div class=\"input-group\" data-widget=\"sidebar-search\">
                        <input class=\"form-control form-control-sidebar\" type=\"search\" placeholder=\"Search\"
                            aria-label=\"Search\">
                        <div class=\"input-group-append\">
                            <button class=\"btn btn-sidebar\">
                                <i class=\"bi bi-search\"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class=\"mt-2\">
                    ";
        // line 192
        echo twig_include($this->env, $context, "admin/aside-nav.html");
        echo "
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        ";
        // line 200
        $this->displayBlock('content', $context, $blocks);
        // line 203
        echo "        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class=\"control-sidebar control-sidebar-dark\">
            <!-- Control sidebar content goes here -->
            <div class=\"p-3\">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class=\"main-footer\">
            <!-- To the right -->
            <div class=\"float-right d-none d-sm-inline\">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href=\"https://adminlte.io\">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src=\"/plugins/jquery/jquery.min.js\"></script>
    <!-- Bootstrap 4 -->
    <script src=\"/plugins/bootstrap/js/bootstrap.bundle.min.js\"></script>
    <!-- AdminLTE App -->
    <script src=\"/dist/js/adminlte.min.js\"></script>
    <script>
        \$(function () {
            var url = window.location;
            // for single sidebar menu
            \$('ul.nav-sidebar a').filter(function () {
                return this.href == url;
            }).addClass('active');

            // for sidebar menu and treeview
            \$('ul.nav-treeview a').filter(function () {
                return this.href == url;
            }).parentsUntil(\".nav-sidebar > .nav-treeview\")
                .css({'display': 'block'})
                .addClass('menu-open').prev('a')
                .addClass('active');
        });

        function swalLoading() 
        {
            Swal.fire({
                title: \"Aguarde...\",
                didOpen: () => {
                    Swal.showLoading();
                },
            });
        }

        function swalError(msg)
        {
            Swal.fire('Ops!', msg, 'error')
        }

        
    </script>
    ";
        // line 270
        $this->displayBlock('js', $context, $blocks);
        // line 273
        echo "</body>

</html>";
    }

    // line 15
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 16
        echo "    ";
    }

    // line 200
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 201
        echo "        
        ";
    }

    // line 270
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 271
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "admin/structure.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  355 => 271,  351 => 270,  346 => 201,  342 => 200,  338 => 16,  334 => 15,  328 => 273,  326 => 270,  257 => 203,  255 => 200,  244 => 192,  221 => 172,  77 => 31,  61 => 17,  59 => 15,  47 => 6,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/structure.html", "/home/u811429539/domains/mt2.pro/public_html/xtreme/view/admin/structure.html");
    }
}
