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
class __TwigTemplate_b5df39fb8f7219a588c96653b7b35bc8 extends Template
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
    <div class=\"top-panel flex-c-c\">
\t\t\t<ul class=\"menu flex-c-c\">
\t\t\t\t<li id=\"home\"><a href=\"/\">Home</a></li>
\t\t\t\t<li id=\"register\"><a href=\"/register\">Registration</a></li>
\t\t\t\t<li id=\"guild-ranking\"><a href=\"/guild-ranking\">Guilds</a></li>
\t\t\t\t<li id=\"player-ranking\"><a href=\"/player-ranking\">Players</a></li>
\t\t\t\t<li id=\"wiki\"><a href=\"\">Wiki</a></li>
\t\t\t</ul>
\t\t\t<div class=\"top_panel-right flex\">
\t\t\t\t<div class=\"top_panel-soc-block flex-c-c\">
\t\t\t\t\t<a href=\"\" class=\"fb\"></a>
\t\t\t\t\t<a href=\"\" class=\"tw\"></a>
\t\t\t\t\t<a href=\"\" class=\"twch\"></a>
\t\t\t\t\t<a href=\"\" class=\"yt\"></a>
\t\t\t\t</div>
\t\t\t\t<div class=\"lang-block\">
\t\t\t\t\t<a href=\"javascript:void(0);\" class=\"main-item\"> Language <img class=\"img-lang\"
\t\t\t\t\t\t\tsrc=\"images/united-states.png\" alt=\"\"></a>
\t\t\t\t\t<ul class=\"hidden-block\">
\t\t\t\t\t\t<li><a href=\"\" class=\"main-item\"> English </a></li>
\t\t\t\t\t\t<li><a href=\"\" class=\"main-item\"> German </a></li>
\t\t\t\t\t\t<li><a href=\"\" class=\"main-item\"> French </a></li>
\t\t\t\t\t\t<li><a href=\"\" class=\"main-item\"> Russian </a></li>
\t\t\t\t\t</ul>
\t\t\t\t</div><!-- lang-block -->
\t\t\t</div>
\t\t</div><!-- top-panel -->
\t\t<div class=\"wrapper\">
\t\t\t<header class=\"header\">
\t\t\t\t<div class=\"logo\">
\t\t\t\t\t<a href=\"/\"><img src=\"images/logo-1.png\" alt=\"\"></a>
\t\t\t\t</div>
\t\t\t\t<div class=\"leaves\">
\t\t\t\t\t<div class=\"leaves-1\"></div>
\t\t\t\t\t<div class=\"leaves-2\"></div>
\t\t\t\t\t<div class=\"leaves-3\"></div>
\t\t\t\t</div>
\t\t\t\t<div class=\"smog\">
\t\t\t\t\t<i class=\"num1\"></i>
\t\t\t\t\t<i class=\"num2\"></i>
\t\t\t\t\t<i class=\"num3\"></i>
\t\t\t\t</div>
\t\t\t</header><!-- .header-->
    ";
        // line 68
        $this->displayBlock('content', $context, $blocks);
        // line 70
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
            <p class=\"m-0 p-1 text-light text-center\">Qualquer ato realizado utilizando algo relacionado ao Alcatraz é de responsabilidade exclusiva do usuário.</p>
            <p class=\"m-0 p-1 text-light text-center\">Alcatraz é uma organização independente sem fins lucrativos. As marcas registradas são seus devidos proprietários!</p>
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
        // line 122
        $this->displayBlock('js', $context, $blocks);
        // line 125
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
        // line 154
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

        const currentPath = window.location.pathname;;
        console.log(currentPath);
        switch (currentPath) {
            case '/':
                document.getElementById('home').classList.add('active');
                break;
            case '/register':
                document.getElementById('register').classList.add('active');
                break;
            case '/guild-ranking':
                document.getElementById('guild-ranking').classList.add('active');
                break;
            case '/player-ranking':
                document.getElementById('player-ranking').classList.add('active');
                break;
            case '/wiki':
                document.getElementById('wiki').classList.add('active');
                break;
            default:
                // Do nothing
                break;
        }
        

    </script>




</body>

</html>";
    }

    // line 68
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 69
        echo "    ";
    }

    // line 122
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 123
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
        return array (  331 => 123,  327 => 122,  323 => 69,  319 => 68,  200 => 154,  169 => 125,  167 => 122,  113 => 70,  111 => 68,  61 => 21,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "structure.html", "/home/heron/Desktop/programming/servicos/Savior---novo-layout/Novo Site/Layout - Site Atual/public_html/view/structure.html");
    }
}
