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

/* register.html */
class __TwigTemplate_81cfae8c646b4923128a840b63cac00f extends Template
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
        $this->parent = $this->loadTemplate("structure.html", "register.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<main>
\t<section class=\"home-content\">

\t\t\t<main class=\"content\">
\t\t\t\t<div class=\"fast-button\">
\t\t\t\t\t<div class=\"download-block\">
\t\t\t\t\t\t<a href=\"download.html\"><span>DOWNLOAD</span><br>
\t\t\t\t\t\t\t<p>Game client 1.45Gb</p>
\t\t\t\t\t\t</a>
\t\t\t\t\t</div><!-- DOWNLOAD-block -->
\t\t\t\t\t<div class=\"status-block\">
\t\t\t\t\t\t<div class=\"server\">
\t\t\t\t\t\t\t<div class=\"flex-s-c\">
\t\t\t\t\t\t\t\t<span class=\"server-name\">SERVER NAME</span> <span class=\"status-online\">Online:</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"progress-bar\">
\t\t\t\t\t\t\t\t<span style=\"width: 70%;\"></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a href=\"\" class=\"desc\">Server Description</a> <span class=\"status-online\">3546</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"reg-block\">
\t\t\t\t\t\t<a href=\"download.html\"><span>REGISTRATION</span><br>
\t\t\t\t\t\t\t<p>Join us now!</p>
\t\t\t\t\t\t</a>
\t\t\t\t\t</div><!-- DOWNLOAD-block -->
\t\t\t\t</div>
\t\t\t\t<div class=\"page-content\">
\t\t\t\t\t<div class=\"block-widget-widget page-left\">
\t\t\t\t\t\t<div class=\"block-players widget-fon\"><!--block-TOP PLAYERS-->
\t\t\t\t\t\t\t<div class=\"block-widget-title\">
\t\t\t\t\t\t\t\tTOP PLAYERS
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<ul class=\"top-block\">
\t\t\t\t\t\t\t\t<li class=\"top-title\">
\t\t\t\t\t\t\t\t\t<span class=\"top-number\">#</span> <span class=\"top-flag\"></span> <span
\t\t\t\t\t\t\t\t\t\tclass=\"top-name\">Name</span> <span class=\"top-lvl\">LvL</span> <span
\t\t\t\t\t\t\t\t\t\tclass=\"top-Res\">Res<sup>ML</sup></span>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li class=\"top-list\">
\t\t\t\t\t\t\t\t\t<span class=\"top-number\">1.</span> <span class=\"top-flag\"><img
\t\t\t\t\t\t\t\t\t\t\tsrc=\"images/flag-icon.png\" alt=\"\"></span> <span class=\"top-name\"><a href=\"\"
\t\t\t\t\t\t\t\t\t\t\ttitle=\"nickname\">KINGman</a></span> <span class=\"top-lvl\">150</span> <span
\t\t\t\t\t\t\t\t\t\tclass=\"top-Res\">400<sup>398</sup></span>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li class=\"top-list\">
\t\t\t\t\t\t\t\t\t<span class=\"top-number\">2.</span> <span class=\"top-flag\"><img
\t\t\t\t\t\t\t\t\t\t\tsrc=\"images/flag-icon.png\" alt=\"\"></span> <span class=\"top-name\"><a href=\"\"
\t\t\t\t\t\t\t\t\t\t\ttitle=\"nickname\">TOR_GOR</a></span> <span class=\"top-lvl\">150</span> <span
\t\t\t\t\t\t\t\t\t\tclass=\"top-Res\">400<sup>398</sup></span>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li class=\"top-list\">
\t\t\t\t\t\t\t\t\t<span class=\"top-number\">3.</span> <span class=\"top-flag\"><img
\t\t\t\t\t\t\t\t\t\t\tsrc=\"images/flag-icon.png\" alt=\"\"></span> <span class=\"top-name\"><a href=\"\"
\t\t\t\t\t\t\t\t\t\t\ttitle=\"nickname\">Very_Long_Nick_Name_Long_Nick</a></span> <span
\t\t\t\t\t\t\t\t\t\tclass=\"top-lvl\">150</span> <span class=\"top-Res\">400<sup>398</sup></span>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li class=\"top-list\">
\t\t\t\t\t\t\t\t\t<span class=\"top-number\">4.</span> <span class=\"top-flag\"><img
\t\t\t\t\t\t\t\t\t\t\tsrc=\"images/flag-icon.png\" alt=\"\"></span> <span class=\"top-name\"><a href=\"\"
\t\t\t\t\t\t\t\t\t\t\ttitle=\"nickname\">shushka</a></span> <span class=\"top-lvl\">150</span> <span
\t\t\t\t\t\t\t\t\t\tclass=\"top-Res\">400<sup>398</sup></span>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li class=\"top-list\">
\t\t\t\t\t\t\t\t\t<span class=\"top-number\">5.</span> <span class=\"top-flag\"><img
\t\t\t\t\t\t\t\t\t\t\tsrc=\"images/flag-icon.png\" alt=\"\"></span> <span class=\"top-name\"><a href=\"\"
\t\t\t\t\t\t\t\t\t\t\ttitle=\"nickname\">OPapa_2019</a></span> <span class=\"top-lvl\">150</span>
\t\t\t\t\t\t\t\t\t<span class=\"top-Res\">400<sup>398</sup></span>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li class=\"top-list\">
\t\t\t\t\t\t\t\t\t<span class=\"top-number\">6.</span> <span class=\"top-flag\"><img
\t\t\t\t\t\t\t\t\t\t\tsrc=\"images/flag-icon.png\" alt=\"\"></span> <span class=\"top-name\"><a href=\"\"
\t\t\t\t\t\t\t\t\t\t\ttitle=\"nickname\">shushka</a></span> <span class=\"top-lvl\">150</span> <span
\t\t\t\t\t\t\t\t\t\tclass=\"top-Res\">400<sup>398</sup></span>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li class=\"top-list\">
\t\t\t\t\t\t\t\t\t<span class=\"top-number\">7.</span> <span class=\"top-flag\"><img
\t\t\t\t\t\t\t\t\t\t\tsrc=\"images/flag-icon.png\" alt=\"\"></span> <span class=\"top-name\"><a href=\"\"
\t\t\t\t\t\t\t\t\t\t\ttitle=\"nickname\">OPapa_2019</a></span> <span class=\"top-lvl\">150</span>
\t\t\t\t\t\t\t\t\t<span class=\"top-Res\">400<sup>398</sup></span>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t<div class=\"buttons-small\">
\t\t\t\t\t\t\t\t<a href=\"\" class=\"button-small\">more</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div><!--block-TOP PLAYERS-->
\t\t\t\t\t\t<div class=\"block-players widget-fon-discussions\"><!--block-GUILDS-->
\t\t\t\t\t\t\t<div class=\"block-widget-title\">
\t\t\t\t\t\t\t\tTOP GUILDS
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"discussions-content-top\">
\t\t\t\t\t\t\t\t<div class=\"discussionsContent flex-s-c\">
\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_img\">
\t\t\t\t\t\t\t\t\t\t<img src=\"images/icon_1.jpg\" alt=\"\">
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_info\">
\t\t\t\t\t\t\t\t\t\t<a href=\"\" class=\"discussionsContent_info-link\"
\t\t\t\t\t\t\t\t\t\t\ttitle=\"Welcome to our new site. There are site\">Welcome to our new site.
\t\t\t\t\t\t\t\t\t\t\tThere are site</a>
\t\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_info-text\">
\t\t\t\t\t\t\t\t\t\t\tBy <a href=\"\">Daniel_91</a> | 12.05.2019
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_number\">
\t\t\t\t\t\t\t\t\t\t<span>1</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"discussionsContent flex-s-c\">
\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_img\">
\t\t\t\t\t\t\t\t\t\t<img src=\"images/icon_1.jpg\" alt=\"\">
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_info\">
\t\t\t\t\t\t\t\t\t\t<a href=\"\" class=\"discussionsContent_info-link\"
\t\t\t\t\t\t\t\t\t\t\ttitle=\"Welcome to our new site. There are site\">Welcome to our new site.
\t\t\t\t\t\t\t\t\t\t\tThere are site</a>
\t\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_info-text\">
\t\t\t\t\t\t\t\t\t\t\tBy <a href=\"\">Daniel_91</a> | 12.05.2019
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_number\">
\t\t\t\t\t\t\t\t\t\t<span>1</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"discussionsContent flex-s-c\">
\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_img\">
\t\t\t\t\t\t\t\t\t\t<img src=\"images/icon_1.jpg\" alt=\"\">
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_info\">
\t\t\t\t\t\t\t\t\t\t<a href=\"\" class=\"discussionsContent_info-link\"
\t\t\t\t\t\t\t\t\t\t\ttitle=\"Welcome to our new site. There are site\">Welcome to our new site.
\t\t\t\t\t\t\t\t\t\t\tThere are site</a>
\t\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_info-text\">
\t\t\t\t\t\t\t\t\t\t\tBy <a href=\"\">Daniel_91</a> | 12.05.2019
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_number\">
\t\t\t\t\t\t\t\t\t\t<span>1</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"discussionsContent flex-s-c\">
\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_img\">
\t\t\t\t\t\t\t\t\t\t<img src=\"images/icon_1.jpg\" alt=\"\">
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_info\">
\t\t\t\t\t\t\t\t\t\t<a href=\"\" class=\"discussionsContent_info-link\"
\t\t\t\t\t\t\t\t\t\t\ttitle=\"Welcome to our new site. There are site\">Welcome to our new site.
\t\t\t\t\t\t\t\t\t\t\tThere are site</a>
\t\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_info-text\">
\t\t\t\t\t\t\t\t\t\t\tBy <a href=\"\">Daniel_91</a> | 12.05.2019
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_number\">
\t\t\t\t\t\t\t\t\t\t<span>1</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"discussionsContent flex-s-c\">
\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_img\">
\t\t\t\t\t\t\t\t\t\t<img src=\"images/icon_1.jpg\" alt=\"\">
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_info\">
\t\t\t\t\t\t\t\t\t\t<a href=\"\" class=\"discussionsContent_info-link\"
\t\t\t\t\t\t\t\t\t\t\ttitle=\"Welcome to our new site. There are site\">Welcome to our new site.
\t\t\t\t\t\t\t\t\t\t\tThere are site</a>
\t\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_info-text\">
\t\t\t\t\t\t\t\t\t\t\tBy <a href=\"\">Daniel_91</a> | 12.05.2019
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"discussionsContent_number\">
\t\t\t\t\t\t\t\t\t\t<span>1</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"buttons-small\">
\t\t\t\t\t\t\t\t<a href=\"\" class=\"button-small\">more</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div><!--block-GUILDS-->
\t\t\t\t\t\t<div class=\"block-players widget-fon-guilds\"><!--block-FAST LINK-->
\t\t\t\t\t\t\t<div class=\"block-widget-title\">
\t\t\t\t\t\t\t\tFAST LINK
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<ul class=\"top-block-block\">
\t\t\t\t\t\t\t\t<li class=\"top-list-list\">
\t\t\t\t\t\t\t\t\t<a href=\"\" title=\"nickname\">Item Shop</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li class=\"top-list-list\">
\t\t\t\t\t\t\t\t\t<a href=\"\" title=\"nickname\">Media Wallpapers</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li class=\"top-list-list\">
\t\t\t\t\t\t\t\t\t<a href=\"\" title=\"nickname\">Dowload Fiels</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li class=\"top-list-list\">
\t\t\t\t\t\t\t\t\t<a href=\"\" title=\"nickname\">Forum Community</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li class=\"top-list-list\">
\t\t\t\t\t\t\t\t\t<a href=\"\" title=\"nickname\">News and Events</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li class=\"top-list-list\">
\t\t\t\t\t\t\t\t\t<a href=\"\" title=\"nickname\">Guides and Info</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div><!--block-FAST LINK-->
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"news-top-1 news-top-top\"><!--Content text-->
\t\t\t\t\t\t<div class=\"block-widget-title-content\">
\t\t\t\t\t\t\tREGISTRATION
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<form>
\t\t\t\t\t\t\t<p class=\"input-user\"><input type=\"text\" name=\"login\" placeholder=\"Username\"></p>
\t\t\t\t\t\t\t<p class=\"input-user\"><input type=\"text\" name=\"login\" placeholder=\"Email\"></p>
\t\t\t\t\t\t\t<p class=\"input-user\"><input type=\"password\" name=\"login\" placeholder=\"Password\"></p>
\t\t\t\t\t\t\t<p class=\"input-user\"><input type=\"password\" name=\"login\" placeholder=\"Repeat Password\"></p>
\t\t\t\t\t\t\t<div class=\"buttons\">
\t\t\t\t\t\t\t\t<button class=\"button-border\">SIGN IN</button>
\t\t\t\t\t\t\t\t<p class=\"agree\"> <input type=\"checkbox\"> I have read and agree to the <a href=\"\">game
\t\t\t\t\t\t\t\t\t\trules.</a></p>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"fast-links\"><!--fast-links-->
\t\t\t\t\t<div class=\"fast-links-left\">
\t\t\t\t\t\t<div class=\"links-left\"><span>FORUM</span><br>
\t\t\t\t\t\t\t<p>Welcome to our forum!</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"fast-links-button-small\"><a href=\"\" class=\"button-small\">more</a></div>
\t\t\t\t\t</div>
\t\t\t\t\t<span></span>
\t\t\t\t\t<div class=\"fast-links-center\">
\t\t\t\t\t\t<div class=\"links-left\"><span>WIKI</span><br>
\t\t\t\t\t\t\t<p>Welcome to our WIKI!</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"fast-links-button-small\"><a href=\"\" class=\"button-small\">more</a></div>
\t\t\t\t\t</div>
\t\t\t\t\t<span></span>
\t\t\t\t\t<div class=\"fast-links-right\">
\t\t\t\t\t\t<div class=\"links-left\"><span>ITEM SHOP</span><br>
\t\t\t\t\t\t\t<p>Welcome to our ITEM SHOP!</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"fast-links-button-small\"><a href=\"\" class=\"button-small\">more</a></div>
\t\t\t\t\t</div>
\t\t\t\t</div><!--fast-links-->
\t\t\t</main><!-- .content -->
\t\t\t<footer class=\"footer\">
\t\t\t\t<div class=\"toTop-fon\">
\t\t\t\t\t<div class=\"toTop\" id=\"toTop\"></div>
\t\t\t\t</div>
\t\t\t\t<div class=\"footer-block-t\">
\t\t\t\t\t<ul class=\"f-menu\">
\t\t\t\t\t\t<li class=\"active\"><a href=\"\">Home</a></li>
\t\t\t\t\t\t<li><a href=\"\">Registration</a></li>
\t\t\t\t\t\t<li><a href=\"\">players</a></li>
\t\t\t\t\t\t<li><a href=\"\">guilds</a></li>
\t\t\t\t\t\t<li><a href=\"\">discussions</a></li>
\t\t\t\t\t\t<li><a href=\"\">forum</a></li>
\t\t\t\t\t\t<li><a href=\"\">About us</a></li>
\t\t\t\t\t</ul>
\t\t\t\t</div><!-- footer-block-t -->
\t\t\t\t<div class=\"footer-end\">
\t\t\t\t\t<div class=\"footer-logo\"><a href=\"/\"><img src=\"images/logo-footer.png\" alt=\"\"></a></div>
\t\t\t\t\t<div class=\"footer-block-coperite\">
\t\t\t\t\t\t<span>Copyright 2020 © <a href=\"/\">avalon.com</a></span><br><br>
\t\t\t\t\t\t<span class=\"copyright-text\">This site is in no way associated with <br>or endorsed by Webzen
\t\t\t\t\t\t\tInc.</span>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</footer><!-- .footer -->
\t\t</div><!-- .wrapper -->
\t\t<!-- Video Modal -->
\t\t<div id=\"overlay\"></div>
\t\t<script src=\"js/jquery-2.1.4.min.js\"></script>
\t\t<script src=\"js/global.js\"></script>
\t\t<script src=\"js/swiper.min.js\"></script>
\t\t<script src=\"js/main.js\"></script>
\t\t<script src=\"js/slick.min.js\"></script>
\t\t<script>
\t\t\t\$('.center').slick({
\t\t\t\tinfinite: true,
\t\t\t\tcenterMode: true,
\t\t\t\tcenterPadding: '50px 30px',
\t\t\t\tslidesToShow: 3,
\t\t\t\tslidesToScroll: 3
\t\t\t});
\t\t</script>
\t</section>
</main>
";
    }

    public function getTemplateName()
    {
        return "register.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "register.html", "/home/heron/Desktop/programming/servicos/Savior---novo-layout/Novo Site/Layout - Site Atual/public_html/view/register.html");
    }
}
