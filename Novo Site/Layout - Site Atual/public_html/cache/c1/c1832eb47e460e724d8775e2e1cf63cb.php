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

/* /my-account-menu.html */
class __TwigTemplate_6e4f5a99610919951dc2fa5b0046e6f4 extends Template
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
        echo "<ul class=\"user-menu pb-3 mt-3 mt-md-0\">
    <li class=\"\">Olá, <b>";
        // line 2
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "login", [], "any", false, false, false, 2), "html", null, true);
        echo "</b></li>
    <li class=\"\">Cash: <b class=\"text-warning\">";
        // line 3
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "getCoins", [], "any", false, false, false, 3), 0, "", "."), "html", null, true);
        echo "</b></li>
    <li><a href=\"/my-account\">Inicio</a></li>
    <hr>
    <li class=\"text-light\">Gerenciar Conta:</li>
    <li><a onclick=\"return confirmPassword('change-email')\" style=\"color:#be3928; cursor:pointer;\">Alterar E-mail</a></li>
    <li><a onclick=\"return confirmPassword('change-password')\" style=\"color:#be3928; cursor:pointer;\">Alterar Senha</a></li>
    <li><a onclick=\"return confirmPassword('warehouse-password')\" style=\"color:#be3928; cursor:pointer;\">Senha do Armazém</a></li>
    <hr>
    <li class=\"text-light\">Gerenciar Personagens:</li>
    <li><a href=\"/unstuck-char\">Listar Personagens</a></li>
    <li><a onclick=\"return confirmPassword('social-id')\" style=\"color:#be3928; cursor:pointer;\">Senha do Personagem</a></li>
    <hr>
    <li class=\"text-light\">Loja:</li>
    <li><a href=\"/shop/coin\">Comprar Cash</a></li>   
    <li><a href=\"/shop/orders\">Histórico de Compras</a></li>   
    <hr>
    <li><a href=\"/logout\">Logout</a></li>
</ul>   ";
    }

    public function getTemplateName()
    {
        return "/my-account-menu.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/my-account-menu.html", "/home/u920559473/domains/metin2savior.com/public_html/view/my-account-menu.html");
    }
}
