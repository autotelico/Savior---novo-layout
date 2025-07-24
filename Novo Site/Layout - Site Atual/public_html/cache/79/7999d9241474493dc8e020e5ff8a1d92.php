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

/* structure.html */
class __TwigTemplate_0759abfe4174501109e00007e25150c3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'js' => [$this, 'block_js'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"author\" content=\"tso - Discord: tso.dev\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
<link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
<link href=\"https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&family=Josefin+Sans:wght@400;500&display=swap\" rel=\"stylesheet\"> 
<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css\" rel=\"stylesheet\"
integrity=\"sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9\" crossorigin=\"anonymous\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css\">
    <link rel=\"stylesheet\" href=\"/css/tiny-slider.css\">
    <link rel=\"stylesheet\" href=\"/css/style.css\">
    <link rel=\"stylesheet\" href=\"/css/odometer-theme-default.css\">
    <script src=\"https://www.google.com/recaptcha/api.js\" async defer></script>
    <link href=\"https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css\" rel=\"stylesheet\">
    <link rel=\"shortcut icon\" href=\"/metin2.ico\" type=\"image/x-icon\">
    <title>";
        // line 21
        echo twig_escape_filter($this->env, twig_constant("SERVER_NAME"), "html", null, true);
        echo "</title>
</head>

<body>
    <header>
        <nav class=\"navbar navbar-expand-lg navbar-dark\">
            <div class=\"container\">
                <a class=\"navbar-brand d-lg-none d-md-block text-uppercase\" href=\"#\">
                    <img src=\"/images/novo_logo.png\" alt=\"\">
                </a>
                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\"
                    data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\"
                    aria-label=\"Toggle navigation\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
                    <ul class=\"navbar-nav me-auto mb-2 mb-lg-0 text-uppercase\">
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"/\">Inicio</a>
                        </li>
                        <li class=\"nav-item\">
                            ";
        // line 42
        if (twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "login", [], "any", false, false, false, 42)) {
            // line 43
            echo "                            <a class=\"nav-link\" href=\"/my-account\">Minha Conta</a>
                            ";
        } else {
            // line 45
            echo "                            <a class=\"nav-link\" href=\"/register\">Criar Conta</a>
                            ";
        }
        // line 47
        echo "                        </li>
                        <li class=\"nav-item dropdown\">
                            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                              Rankings
                            </a>
                            <ul class=\"dropdown-menu rounded-0 dropdown-menu-dark\" aria-labelledby=\"navbarDropdown\">
                              <li><a class=\"dropdown-item\" href=\"/player-ranking\">Jogadores</a></li>
                              <li><a class=\"dropdown-item\" href=\"/guild-ranking\">Guildas</a></li>
                            </ul>
                          </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"/downloads\">Downloads</a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"https://xtreme.mt2.pro/\">SERVIDOR PVM</a>
                        </li>
                        ";
        // line 63
        if (twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "login", [], "any", false, false, false, 63)) {
            // line 64
            echo "                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"/logout\">logout</a>
                        </li>
                        ";
        }
        // line 68
        echo "                    </ul>
                </div>
            </div>
        </nav>
        <div class=\"container d-flex justify-content-center justify-content-lg-start\">
            <div class=\"home-download-box\">
                <a href=\"/downloads\">
                    <img class=\"btn-home-download-box\" src=\"/images/btn-download.webp\" alt=\"\">
                </a>
                <div class=\"home-login-box\">
                    ";
        // line 78
        if (twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "login", [], "any", false, false, false, 78)) {
            // line 79
            echo "                    <a href=\"/my-account\" class=\"btn-home-login-box text-uppercase\">Minha Conta</a>

                    <span>Bem vindo(a), <a href=\"/my-account\">";
            // line 81
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "login", [], "any", false, false, false, 81), "html", null, true);
            echo "</a>! Se desejar sair, faça <a href=\"/logout\">Logout</a> </span>
                    ";
        } else {
            // line 83
            echo "                    <a href=\"/login\" class=\"btn-home-login-box text-uppercase\">Acesse sua conta</a>
                    <span>Você não tem uma conta? <a href=\"/register\">Criar conta!</a></span>
                    ";
        }
        // line 86
        echo "                </div>
            </div>
            <div class=\"home-logo-decorator\">
                <img class=\"logo\" src=\"/images/novo_logo.png\" alt=\"\">
                <img class=\"decorator-render\" src=\"/images/ranking_race_render_warrior.webp\" alt=\"\">
            </div>
        </div>
    </header>
    ";
        // line 94
        $this->displayBlock('content', $context, $blocks);
        // line 96
        echo "    <footer>
        <div class=\"home-container home-footer-bg\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-6 mb-5 mb-md-0\">
                        <h2 class=\"fw-bold\">Server Statistics </h2>
                        <ul class=\"home-statistics\">
                            <li>Players Online: <hr> <b id=\"playersOnline\">~</b></li>
                            <li>Players Online (24h): <hr> <b id=\"playersOnline24h\">~</b></li>
                            <br>
                            <li>Accounts Created: <hr> <b id=\"accountsCreated\">~</b></li>
                            <li>Characters Created: <hr> <b id=\"players\">~</b></li>
                            <li>Guilds Created: <hr> <b id=\"guilds\">~</b></li>
                        </ul>
                    </div>
                    <div class=\"col-md-6\">
                        <h2 class=\"fw-bold\">Extra </h2>
                        <div class=\"d-flex flex-wrap\">
                            <ul class=\"footer-links flex-grow-1\">
                                <li><a href=\"/terms-of-service\">Termos de Uso</a></li>
                                <li><a href=\"/privacy-policy\">Políticas de Privacidade</a></li>
                            </ul>
                            <div>
                                <ul class=\"footer-social-medias mt-3 \">
                                    <li><a href=\"\"><i class=\"bi bi-facebook\"></i></a></li>
                                    <li><a href=\"\"><i class=\"bi bi-discord\"></i></a></li>
                                    <li><a href=\"\"><i class=\"bi bi-twitch\"></i></a></li>
                                    <li><a href=\"\"><i class=\"bi bi-twitter\"></i></a></li>
                                    <li><a href=\"\"><i class=\"bi bi-youtube\"></i></a></li>
                                    <li><a href=\"\"><i class=\"bi bi-instagram\"></i></a></li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"copyright\">
            <p class=\"m-0 p-1 text-light text-center\">Qualquer ato realizado utilizando algo relacionado ao Xtreme2 é de responsabilidade exclusiva do usuário.</p>
            <p class=\"m-0 p-1 text-light text-center\">Xtreme2 é uma organização independente sem fins lucrativos. As marcas registradas são seus devidos proprietários!</p>
        </div>
    </footer>
    
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js\"
        integrity=\"sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm\"
        crossorigin=\"anonymous\"></script>
    <script src=\"/js/tiny-slider.js\"></script>
    <script src=\"/js/global.js\"></script>
    <script src=\"/js/odometer.min.js\"></script>
    <script src=\"/js/jquery.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@11\"></script>
    ";
        // line 148
        $this->displayBlock('js', $context, $blocks);
        // line 151
        echo "    <script>
        var slider = tns(
        {
            'container': '.player-top-class-slide',
            'slideBy': 'page',
            'autoplay': true,
            \"controls\": false,
            \"nav\": false,
            \"autoplayButtonOutput\": false,
            \"speed\": 600,
            \"rewind\": true,
            \"responsive\": {
                \"350\": {
                \"items\": 1,
                \"edgePadding\": 50,
                },
                \"500\": {
                \"items\": 2,
                \"edgePadding\": 0,
                },
                \"768\": {
                \"items\": 3,
                \"edgePadding\": 0,
                },
                \"992\": {
                \"items\": 4,
                \"edgePadding\": 0,
                },
                \"1200\": {
                \"items\": ";
        // line 180
        echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["topClass"] ?? null)), "html", null, true);
        echo ",
                \"edgePadding\": 0,
                },
             }
        }   
       );
       
       
    </script>


    <script>
        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }
    
        async function getPlayersOnline() {
            let onlinePlayers = \$('#playersOnline')[0];
            let onlinePlayers24h = \$('#playersOnline24h')[0];
            let accountsCreated = \$('#accountsCreated')[0];
            let players = \$('#players')[0];
            let guilds = \$('#guilds')[0];
    
            try {
                const controller = new AbortController();
                const signal = controller.signal;
    
                setTimeout(() => controller.abort(), 10000);
    
                const response = await fetch('/api/statistics', { signal });
                const data = await response.json();
    
                const onlinePlayersOd = new Odometer({
                    format: '(.ddd)',
                    el: onlinePlayers
                });
                const onlinePlayers24hOd = new Odometer({
                    format: '(.ddd)',
                    el: onlinePlayers24h
                });
    
                data.playersOnline = data.playersOnline > 2 ? data.playersOnline * 3 : data.playersOnline;

                data.playersOnline24h = data.playersOnline24h > 2 ? data.playersOnline24h * 2 : data.playersOnline24h;

                data.accounts = data.accounts > 10 ? data.accounts * 2 : data.accounts;

                data.players = data.players > 10 ? data.players * 2 : data.players;
    
                onlinePlayersOd.update(data.playersOnline);
                onlinePlayers24hOd.update(data.playersOnline24h);
    
                const accountsOd = new Odometer({
                    format: '(.ddd)',
                    el: accountsCreated
                });
                accountsOd.update(data.accounts);
    
                const playersOd = new Odometer({
                    format: '(.ddd)',
                    el: players
                });
                playersOd.update(data.players);
    
                const guildsOd = new Odometer({
                    format: '(.ddd)',
                    el: guilds
                });
                guildsOd.update(data.guilds);
    
            } catch (error) {
                console.log(`Erro ao obter jogadores online: \${error}`);
            } finally {
                // Espera 5 segundos antes de chamar a função novamente
                await sleep(10000);
                await getPlayersOnline();
            }
        }
    
        window.addEventListener('load', async function() {
            await getPlayersOnline()
        });
    </script>




</body>

</html>";
    }

    // line 94
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 95
        echo "    ";
    }

    // line 148
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 149
        echo "    
    ";
    }

    public function getTemplateName()
    {
        return "structure.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  354 => 149,  350 => 148,  346 => 95,  342 => 94,  248 => 180,  217 => 151,  215 => 148,  161 => 96,  159 => 94,  149 => 86,  144 => 83,  139 => 81,  135 => 79,  133 => 78,  121 => 68,  115 => 64,  113 => 63,  95 => 47,  91 => 45,  87 => 43,  85 => 42,  61 => 21,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "structure.html", "/home/u811429539/domains/mt2.pro/public_html/xtremepvp/view/structure.html");
    }
}
