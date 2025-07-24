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

/* admin/aside-nav.html */
class __TwigTemplate_2ae5b03a1c434ad1eb5f7aa8ddbe44e6 extends Template
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
        echo "<ul class=\"nav nav-pills nav-sidebar flex-column\" data-widget=\"treeview\" role=\"menu\"
                        data-accordion=\"false\">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class=\"nav-item\">
                            <a href=\"/admin/dashboard\" class=\"nav-link\">
                                <i class=\"bi bi-house\"></i>
                                <p>
                                    Página Inicial
                                </p>
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a href=\"/admin/post\" class=\"nav-link \">
                                <i class=\"bi bi-newspaper\"></i>
                                <p>
                                    Posts
                                </p>
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a href=\"/admin/shop-coins\" class=\"nav-link \">
                                <i class=\"bi bi-cash-coin\"></i>
                                <p>
                                    Loja de Moedas
                                </p>
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a href=\"/admin/shop-promotion\" class=\"nav-link \">
                                <i class=\"bi bi-percent\"></i>
                                <p>
                                    Promoções
                                </p>
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a href=\"/admin/tos\" class=\"nav-link\">
                                <i class=\"bi bi-check-square-fill\"></i>
                                <p>
                                    Termos & Políticas
                                </p>
                            </a>
                        </li>
                        
                    </ul>";
    }

    public function getTemplateName()
    {
        return "admin/aside-nav.html";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/aside-nav.html", "/home/u811429539/domains/mt2.pro/public_html/chaos2/view/admin/aside-nav.html");
    }
}
