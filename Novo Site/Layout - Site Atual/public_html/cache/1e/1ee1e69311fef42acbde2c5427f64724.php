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

/* account-download.html */
class __TwigTemplate_01f762d1601f0e3f91dcb08a034ff916 extends Template
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
        echo "
<div class=\"home-download-box\">
    <a href=\"https://drive.google.com/file/d/1NwgcvMvnk43QrlkDIFMusRNLeuw9bVNn\">
        <img class=\"btn-home-download-box\" src=\"/images/btn-download.webp\" alt=\"\">
    </a>
    <div class=\"home-login-box\">
        ";
        // line 7
        if (twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "login", [], "any", false, false, false, 7)) {
            // line 8
            echo "        <a href=\"/my-account\" class=\"btn-home-login-box text-uppercase\">Minha Conta</a>

        <span>Bem vindo(a), <a href=\"/my-account\">";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "login", [], "any", false, false, false, 10), "html", null, true);
            echo "</a>! Se desejar sair, faça <a
                href=\"/logout\">Logout</a> </span>
        ";
        } else {
            // line 13
            echo "        <a href=\"/login\" class=\"btn-home-login-box text-uppercase\">Acesse sua conta</a>
        <span>Você não tem uma conta? <a href=\"/register\">Criar conta!</a></span>
        ";
        }
        // line 16
        echo "    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "account-download.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 16,  57 => 13,  51 => 10,  47 => 8,  45 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "account-download.html", "/home/heron/Desktop/programming/servicos/Savior---novo-layout/Novo Site/Layout - Site Atual/public_html/view/account-download.html");
    }
}
