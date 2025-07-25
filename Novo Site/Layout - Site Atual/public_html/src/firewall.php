<?PHP

	// Function
	function GServ($v)
	{
		global $_SERVER;
		if (isset($_SERVER[$v]))
			return $_SERVER[$v];
		else
			return "";
	}

	// X-XSS-Protection
	header("X-XSS-Protection: 1; mode=block");

	// Copy Protection
	$navigateur = GServ("HTTP_USER_AGENT");
	$bannav     = Array(
		'HTTrack',
		'httrack',
		'WebCopier',
		'HTTPClient',
		'websitecopier',
		'webcopier',
		'PageNest',
		'pagenest',
		'Teleport',
		'teleport',
		'TeleportPro',
		'teleportpro',
		'Teleport Pro',
		'teleport pro'
	);
	foreach ($bannav as $banni) {
		$comparaison = strstr($navigateur, $banni);
		if ($comparaison !== false) {
			echo '<html><head><title>Eroare (2) </title></head><body><style>.genericError{border: 1px dashed #CC0000;font-family: Tahoma;background-color: #FBEEEB;padding: 10px;color: #CC0000;}</style><div class="genericError"><strong>Eroare (2)</strong><br/> Ne pare rau! <br><br>Site-ul realizat de <a href="https://f-aws.com">Aninu</a>, nu poate fi copiat cu aceste programe. <br><br> Daca doresti un site poti comanda unul de pe site-ul oficial: <a href="https://f-aws.com">https://f-aws.com</a>. <br><br> Iti urez o zi buna!</div></body></html>';
			exit;
		}
	}

	// Inject Protection
	$time         = date("d M Y , H:i");
	$script       = GServ("PATH_TRANSLATED");
	$sql_inject_1 = array(
		";",
		"'",
		"%",
		'"'
	);
	$sql_inject_2 = array(
		"",
		"",
		"",
		"&quot;"
	);
	$GET_KEY      = array_keys($_GET);
	$POST_KEY     = array_keys($_POST);
	$COOKIE_KEY   = array_keys($_COOKIE);
	for ($i = 0; $i < count($GET_KEY); $i++) {
		$real_get[$i]       = $_GET[$GET_KEY[$i]];
		$_GET[$GET_KEY[$i]] = str_replace($sql_inject_1, $sql_inject_2, HtmlSpecialChars($_GET[$GET_KEY[$i]]));
		if ($real_get[$i] != $_GET[$GET_KEY[$i]]) {
			$vl = $real_get[$i];
		}
	}
	for ($i = 0; $i < count($POST_KEY); $i++) {
		$real_post[$i]        = $_POST[$POST_KEY[$i]];
		$_POST[$POST_KEY[$i]] = str_replace($sql_inject_1, $sql_inject_2, HtmlSpecialChars($_POST[$POST_KEY[$i]]));
		if ($real_post[$i] != $_POST[$POST_KEY[$i]]) {
			$vl = $real_post[$i];
		}
	}
	for ($i = 0; $i < count($COOKIE_KEY); $i++) {
		$real_cookie[$i]          = $_COOKIE[$COOKIE_KEY[$i]];
		$_COOKIE[$COOKIE_KEY[$i]] = str_replace($sql_inject_1, $sql_inject_2, HtmlSpecialChars($_COOKIE[$COOKIE_KEY[$i]]));
		if ($real_cookie[$i] != $_COOKIE[$COOKIE_KEY[$i]]) {
			$vl = $real_cookie[$i];
		}
	}

	// PHP Firewall
	define('PHP_FIREWALL_REQUEST_URI', strip_tags(GServ('REQUEST_URI')));

	/************************************************************************/
	/* PHP Firewall: Universal Firewall for WebSite                         */
	/* ============================================                         */
	/* Write by Cyril Levert                                                */
	/* Copyright (c) 2009-2010                                              */
	/* http://www.php-firewall.info                                         */
	/* dev@php-maximus.org                                                  */
	/* Others projects:                                                     */
	/* CMS PHP Maximus ( with mysql database ) www.php-maximus.org          */
	/* Blog PHP Minimus ( with mysqli database ) www.php-minimus.org        */
	/* Mini CMS PHP Nanomus ( without database ) www.php-nanomus.org        */
	/* Stop Spam Referer ( without database ) www.stop-spam-referer.info    */
	/* Twitter clone ( PHP Kweeker CMS ) www.twitter.php-minimus.org        */
	/* PHP Firewall ( without database ) www.php-firewall.info              */
	/* Personnal blog www.cyril-levert.info                                 */
	/* Release version 1.0.3                                                */
	/* Release date : 12-04-2010                                            */
	/*                                                                      */
	/* This program is free software.                                       */
	/************************************************************************/

	/** IP Protected */
	$IP_ALLOW = array();

	/** configuration define */
	define('PHP_FIREWALL_LANGUAGE', 'brasil');
	define('PHP_FIREWALL_ADMIN_MAIL', '');
	define('PHP_FIREWALL_PUSH_MAIL', false);
	define('PHP_FIREWALL_PROTECTION_UNSET_GLOBALS', true);
	define('PHP_FIREWALL_PROTECTION_RANGE_IP_DENY', true);
	define('PHP_FIREWALL_PROTECTION_RANGE_IP_SPAM', true);
	define('PHP_FIREWALL_PROTECTION_URL', true);
	define('PHP_FIREWALL_PROTECTION_REQUEST_SERVER', true);
	define('PHP_FIREWALL_PROTECTION_SANTY', true);
	define('PHP_FIREWALL_PROTECTION_BOTS', true);
	define('PHP_FIREWALL_PROTECTION_REQUEST_METHOD', true);
	define('PHP_FIREWALL_PROTECTION_DOS', true);
	define('PHP_FIREWALL_PROTECTION_UNION_SQL', true);
	define('PHP_FIREWALL_PROTECTION_CLICK_ATTACK', true);
	define('PHP_FIREWALL_PROTECTION_XSS_ATTACK', true);
	define('PHP_FIREWALL_PROTECTION_COOKIES', true);
	define('PHP_FIREWALL_PROTECTION_POST', true);
	define('PHP_FIREWALL_PROTECTION_GET', true);
	define('PHP_FIREWALL_PROTECTION_SERVER_OVH', true);
	define('PHP_FIREWALL_PROTECTION_SERVER_KIMSUFI', true);
	define('PHP_FIREWALL_PROTECTION_SERVER_DEDIBOX', true);
	define('PHP_FIREWALL_PROTECTION_SERVER_DIGICUBE', true);
	define('PHP_FIREWALL_PROTECTION_SERVER_OVH_BY_IP', true);
	define('PHP_FIREWALL_PROTECTION_SERVER_KIMSUFI_BY_IP', true);
	define('PHP_FIREWALL_PROTECTION_SERVER_DEDIBOX_BY_IP', true);
	define('PHP_FIREWALL_PROTECTION_SERVER_DIGICUBE_BY_IP', true);
	/** end configuration */

	/** IPS PROTECTED */
	if (count($IP_ALLOW) > 0) {
		if (in_array($_SERVER['REMOTE_ADDR'], $IP_ALLOW))
			return;
	}
	/** END IPS PROTECTED */

	/** LANGUAGE */
	if (PHP_FIREWALL_LANGUAGE === 'brasil') {
		define('_PHPF_PROTECTION_DEDIBOX', 'Proteção DEDIBOX Servidor ativo, esta faixa de IP não é permitida!');
		define('_PHPF_PROTECTION_DEDIBOX_IP', 'Proteção DEDIBOX Server ativo, este IP não é permitido!');
		define('_PHPF_PROTECTION_DIGICUBE', 'Proteção DIGICUBE Servidor ativo, este intervalo de IP não é permitido!');
		define('_PHPF_PROTECTION_DIGICUBE_IP', 'Proteção DIGICUBE Servidor ativo, este IP não é permitido!');
		define('_PHPF_PROTECTION_KIMSUFI', 'Proteção KIMSUFI Server ativo, este intervalo de IP não é permitido!');
		define('_PHPF_PROTECTION_OVH', 'Proteção OVH Server ativo, este range de IP não é permitido!');
		define('_PHPF_PROTECTION_BOTS', 'Ataque de bot detectado! pare com isso ...');
		define('_PHPF_PROTECTION_CLICK', 'Clique em ataque detectado! pare com isso ...');
		define('_PHPF_PROTECTION_DOS', 'Agente de usuário inválido! Pare com isso ...');
		define('_PHPF_PROTECTION_OTHER_SERVER', 'Postar de outro servidor não permitido!');
		define('_PHPF_PROTECTION_REQUEST', 'Verificação do método de pedido inválido! Pare com isso ...');
		define('_PHPF_PROTECTION_SANTY', 'Ataque Santy detectado! Pare com isso ...');
		define('_PHPF_PROTECTION_SPAM', 'Proteção SPAM IPs ativos, este intervalo de IP não é permitido!');
		define('_PHPF_PROTECTION_SPAM_IP', 'Proteção morreu IPs ativos, este intervalo de IP não é permitido!');
		define('_PHPF_PROTECTION_UNION', 'Ataque da União detectado! pare com isso ...');
		define('_PHPF_PROTECTION_URL', 'URL de proteção ativo, string não permitido!');
		define('_PHPF_PROTECTION_XSS', 'Ataque XSS detectado! pare com isso ...');
	} else {
		define('_PHPF_PROTECTION_DEDIBOX', 'Protection DEDIBOX Server active, this IP range is not allowed !');
		define('_PHPF_PROTECTION_DEDIBOX_IP', 'Protection DEDIBOX Server active, this IP is not allowed !');
		define('_PHPF_PROTECTION_DIGICUBE', 'Protection DIGICUBE Server active, this IP range is not allowed !');
		define('_PHPF_PROTECTION_DIGICUBE_IP', 'Protection DIGICUBE Server active, this IP is not allowed !');
		define('_PHPF_PROTECTION_KIMSUFI', 'Protection KIMSUFI Server active, this IP range is not allowed !');
		define('_PHPF_PROTECTION_OVH', 'Protection OVH Server active, this IP range is not allowed !');
		define('_PHPF_PROTECTION_BOTS', 'Bot attack detected ! stop it ...');
		define('_PHPF_PROTECTION_CLICK', 'Click attack detected ! stop it .....');
		define('_PHPF_PROTECTION_DOS', 'Invalid user agent ! Stop it ...');
		define('_PHPF_PROTECTION_OTHER_SERVER', 'Posting from another server not allowed !');
		define('_PHPF_PROTECTION_REQUEST', 'Invalid request method check ! Stop it ...');
		define('_PHPF_PROTECTION_SANTY', 'Attack Santy detected ! Stop it ...');
		define('_PHPF_PROTECTION_SPAM', 'Protection SPAM IPs active, this IP range is not allowed !');
		define('_PHPF_PROTECTION_SPAM_IP', 'Protection died IPs active, this IP range is not allowed !');
		define('_PHPF_PROTECTION_UNION', 'Union attack detected ! stop it ......');
		define('_PHPF_PROTECTION_URL', 'Protection url active, string not allowed !');
		define('_PHPF_PROTECTION_XSS', 'XSS attack detected ! stop it ...');
	}
	/** END LANGUAGE*/

	if (PHP_FIREWALL_ACTIVATION === true) {
		FUNCTION PHP_FIREWALL_unset_globals()
		{
			if (ini_get('register_globals')) {
				$allow = array(
					'_ENV' => 1,
					'_GET' => 1,
					'_POST' => 1,
					'_COOKIE' => 1,
					'_FILES' => 1,
					'_SERVER' => 1,
					'_REQUEST' => 1,
					'GLOBALS' => 1
				);
				foreach ($GLOBALS as $key => $value) {
					if (!isset($allow[$key]))
						unset($GLOBALS[$key]);
				}
			}
		}
		
		if (PHP_FIREWALL_PROTECTION_UNSET_GLOBALS === true)
			PHP_FIREWALL_unset_globals();
		
		/** fonctions de base */
		FUNCTION PHP_FIREWALL_get_env($st_var)
		{
			global $HTTP_SERVER_VARS;
			if (isset($_SERVER[$st_var])) {
				return strip_tags($_SERVER[$st_var]);
			} elseif (isset($_ENV[$st_var])) {
				return strip_tags($_ENV[$st_var]);
			} elseif (isset($HTTP_SERVER_VARS[$st_var])) {
				return strip_tags($HTTP_SERVER_VARS[$st_var]);
			} elseif (getenv($st_var)) {
				return strip_tags(getenv($st_var));
			} elseif (function_exists('apache_getenv') && apache_getenv($st_var, true)) {
				return strip_tags(apache_getenv($st_var, true));
			}
			return '';
		}
		
		FUNCTION PHP_FIREWALL_get_referer()
		{
			if (PHP_FIREWALL_get_env('HTTP_REFERER'))
				return PHP_FIREWALL_get_env('HTTP_REFERER');
			return 'no referer';
		}
		
		FUNCTION PHP_FIREWALL_get_ip()
		{
			if (PHP_FIREWALL_get_env('HTTP_X_FORWARDED_FOR')) {
				return PHP_FIREWALL_get_env('HTTP_X_FORWARDED_FOR');
			} elseif (PHP_FIREWALL_get_env('HTTP_CLIENT_IP')) {
				return PHP_FIREWALL_get_env('HTTP_CLIENT_IP');
			} else {
				return PHP_FIREWALL_get_env('REMOTE_ADDR');
			}
		}
		FUNCTION PHP_FIREWALL_get_user_agent()
		{
			if (PHP_FIREWALL_get_env('HTTP_USER_AGENT'))
				return PHP_FIREWALL_get_env('HTTP_USER_AGENT');
			return 'none';
		}
		
		FUNCTION PHP_FIREWALL_get_query_string()
		{
			if (PHP_FIREWALL_get_env('QUERY_STRING'))
				return str_replace('%09', '%20', PHP_FIREWALL_get_env('QUERY_STRING'));
			return '';
		}
		FUNCTION PHP_FIREWALL_get_request_method()
		{
			if (PHP_FIREWALL_get_env('REQUEST_METHOD'))
				return PHP_FIREWALL_get_env('REQUEST_METHOD');
			return 'none';
		}
		FUNCTION PHP_FIREWALL_gethostbyaddr()
		{
			if (PHP_FIREWALL_PROTECTION_SERVER_OVH === true OR PHP_FIREWALL_PROTECTION_SERVER_KIMSUFI === true OR PHP_FIREWALL_PROTECTION_SERVER_DEDIBOX === true OR PHP_FIREWALL_PROTECTION_SERVER_DIGICUBE === true) {
				if (@empty($_SESSION['PHP_FIREWALL_gethostbyaddr'])) {
					return $_SESSION['PHP_FIREWALL_gethostbyaddr'] = @gethostbyaddr(PHP_FIREWALL_get_ip());
				} else {
					return strip_tags($_SESSION['PHP_FIREWALL_gethostbyaddr']);
				}
			}
		}
		
		/** bases define */
		define('PHP_FIREWALL_GET_QUERY_STRING', strtolower(PHP_FIREWALL_get_query_string()));
		define('PHP_FIREWALL_USER_AGENT', PHP_FIREWALL_get_user_agent());
		define('PHP_FIREWALL_GET_IP', PHP_FIREWALL_get_ip());
		define('PHP_FIREWALL_GET_HOST', PHP_FIREWALL_gethostbyaddr());
		define('PHP_FIREWALL_GET_REFERER', PHP_FIREWALL_get_referer());
		define('PHP_FIREWALL_GET_REQUEST_METHOD', PHP_FIREWALL_get_request_method());
		define('PHP_FIREWALL_REGEX_UNION', '#\w?\s?union\s\w*?\s?(select|all|distinct|insert|update|drop|delete)#is');
		FUNCTION PHP_FIREWALL_push_email($subject, $msg)
		{
			$headers = "From: PHP Firewall: " . PHP_FIREWALL_ADMIN_MAIL . " <" . PHP_FIREWALL_ADMIN_MAIL . ">\r\n" . "Reply-To: " . PHP_FIREWALL_ADMIN_MAIL . "\r\n" . "Priority: urgent\r\n" . "Importance: High\r\n" . "Precedence: special-delivery\r\n" . "Organization: PHP Firewall\r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/plain\r\n" . "Content-Transfer-Encoding: 8bit\r\n" . "X-Priority: 1\r\n" . "X-MSMail-Priority: High\r\n" . "X-Mailer: PHP/" . phpversion() . "\r\n" . "X-PHPFirewall: 1.0 by PHPFirewall\r\n" . "Date:" . date("D, d M Y H:s:i") . " +0100\n";
			if (PHP_FIREWALL_ADMIN_MAIL != '')
				@mail(PHP_FIREWALL_ADMIN_MAIL, $subject, $msg, $headers);
		}
		
		FUNCTION PHP_FIREWALL_LOGS($type)
		{
			$l_data    = date('Y-m-d H:i:s');
			$l_ip      = PHP_FIREWALL_GET_IP;
			$l_dns     = gethostbyaddr(PHP_FIREWALL_GET_IP);
			$l_agent   = PHP_FIREWALL_USER_AGENT;
			$l_url     = PHP_FIREWALL_REQUEST_URI;
			$l_referer = PHP_FIREWALL_GET_REFERER;
			
			if (PHP_FIREWALL_PUSH_MAIL === false) {
				PHP_FIREWALL_push_email('Alert PHP Firewall ' . strip_tags($_SERVER['SERVER_NAME']), "PHP Firewall logs of " . strip_tags($_SERVER['SERVER_NAME']) . "\n" . str_replace('|', "\n", $msg));
			}
		}
		
		if (PHP_FIREWALL_PROTECTION_SERVER_OVH === true) {
			if (stristr(PHP_FIREWALL_GET_HOST, 'ovh')) {
				PHP_FIREWALL_LOGS('OVH Server list');
				die(_PHPF_PROTECTION_OVH);
			}
		}
		
        if (PHP_FIREWALL_PROTECTION_SERVER_OVH_BY_IP === true) {
            $ip = explode('.', PHP_FIREWALL_GET_IP);
            
            if (count($ip) >= 2 && ($ip[0] . '.' . $ip[1] == '87.98' || $ip[0] . '.' . $ip[1] == '91.121' || $ip[0] . '.' . $ip[1] == '94.23' || $ip[0] . '.' . $ip[1] == '213.186' || $ip[0] . '.' . $ip[1] == '213.251')) {
                PHP_FIREWALL_LOGS('OVH Server IP');
                die(_PHPF_PROTECTION_OVH);
            }
        }
        
        if (PHP_FIREWALL_PROTECTION_SERVER_KIMSUFI === true) {
            if (stristr(PHP_FIREWALL_GET_HOST, 'kimsufi')) {
                PHP_FIREWALL_LOGS('KIMSUFI Server list');
                die(_PHPF_PROTECTION_KIMSUFI);
            }
        }
        
        if (PHP_FIREWALL_PROTECTION_SERVER_DEDIBOX === true) {
            if (stristr(PHP_FIREWALL_GET_HOST, 'dedibox')) {
                PHP_FIREWALL_LOGS('DEDIBOX Server list');
                die(_PHPF_PROTECTION_DEDIBOX);
            }
        }
        
        if (PHP_FIREWALL_PROTECTION_SERVER_DEDIBOX_BY_IP === true) {
            $ip = explode('.', PHP_FIREWALL_GET_IP);
            
            if (count($ip) >= 2 && $ip[0] . '.' . $ip[1] == '88.191') {
                PHP_FIREWALL_LOGS('DEDIBOX Server IP');
                die(_PHPF_PROTECTION_DEDIBOX_IP);
            }
        }
        
        if (PHP_FIREWALL_PROTECTION_SERVER_DIGICUBE === true) {
            if (stristr(PHP_FIREWALL_GET_HOST, 'digicube')) {
                PHP_FIREWALL_LOGS('DIGICUBE Server list');
                die(_PHPF_PROTECTION_DIGICUBE);
            }
        }
        
        if (PHP_FIREWALL_PROTECTION_SERVER_DIGICUBE_BY_IP === true) {
            $ip = explode('.', PHP_FIREWALL_GET_IP);
            if (count($ip) >= 2 && $ip[0] . '.' . $ip[1] == '95.130') {
                PHP_FIREWALL_LOGS('DIGICUBE Server IP');
                die(_PHPF_PROTECTION_DIGICUBE_IP);
            }
        }

		
		if (PHP_FIREWALL_PROTECTION_RANGE_IP_SPAM === true) {
			$ip_array = array(
				'24',
				'222'
			);
			$range_ip = explode('.', PHP_FIREWALL_GET_IP);
			if (in_array($range_ip[0], $ip_array)) {
				PHP_FIREWALL_LOGS('IPs Spam list');
				die(_PHPF_PROTECTION_SPAM);
			}
		}
		
		if (PHP_FIREWALL_PROTECTION_RANGE_IP_DENY === true) {
			$ip_array = array(
				'0',
				'1',
				'2',
				'5',
				'10',
				'14',
				'23',
				'27',
				'31',
				'36',
				'37',
				'39',
				'42',
				'46',
				'49',
				'50',
				'192',
				'224'
			);
			$range_ip = explode('.', PHP_FIREWALL_GET_IP);
			if (in_array($range_ip[0], $ip_array)) {
				PHP_FIREWALL_LOGS('IPs reserved list');
				die(_PHPF_PROTECTION_SPAM_IP);
			}
		}
		
		if (PHP_FIREWALL_PROTECTION_COOKIES === true) {
			$ct_rules = Array(
				'applet',
				'base',
				'bgsound',
				'blink',
				'embed',
				'expression',
				'frame',
				'javascript',
				'layer',
				'link',
				'meta',
				'object',
				'onabort',
				'onactivate',
				'onafterprint',
				'onafterupdate',
				'onbeforeactivate',
				'onbeforecopy',
				'onbeforecut',
				'onbeforedeactivate',
				'onbeforeeditfocus',
				'onbeforepaste',
				'onbeforeprint',
				'onbeforeunload',
				'onbeforeupdate',
				'onblur',
				'onbounce',
				'oncellchange',
				'onchange',
				'onclick',
				'oncontextmenu',
				'oncontrolselect',
				'oncopy',
				'oncut',
				'ondataavailable',
				'ondatasetchanged',
				'ondatasetcomplete',
				'ondblclick',
				'ondeactivate',
				'ondrag',
				'ondragend',
				'ondragenter',
				'ondragleave',
				'ondragover',
				'ondragstart',
				'ondrop',
				'onerror',
				'onerrorupdate',
				'onfilterchange',
				'onfinish',
				'onfocus',
				'onfocusin',
				'onfocusout',
				'onhelp',
				'onkeydown',
				'onkeypress',
				'onkeyup',
				'onlayoutcomplete',
				'onload',
				'onlosecapture',
				'onmousedown',
				'onmouseenter',
				'onmouseleave',
				'onmousemove',
				'onmouseout',
				'onmouseover',
				'onmouseup',
				'onmousewheel',
				'onmove',
				'onmoveend',
				'onmovestart',
				'onpaste',
				'onpropertychange',
				'onreadystatechange',
				'onreset',
				'onresize',
				'onresizeend',
				'onresizestart',
				'onrowenter',
				'onrowexit',
				'onrowsdelete',
				'onrowsinserted',
				'onscroll',
				'onselect',
				'onselectionchange',
				'onselectstart',
				'onstart',
				'onstop',
				'onsubmit',
				'onunload',
				'script',
				'style',
				'title',
				'vbscript',
				'xml'
			);
			if (PHP_FIREWALL_PROTECTION_COOKIES === true) {
				foreach ($_COOKIE as $value) {
					$check = str_replace($ct_rules, '*', $value);
					if ($value != $check) {
						PHP_FIREWALL_LOGS('Cookie protect');
						unset($value);
					}
				}
			}
			if (PHP_FIREWALL_PROTECTION_POST === true) {
				foreach ($_POST as $value) {
					$check = str_replace($ct_rules, '*', $value);
					if ($value != $check) {
						PHP_FIREWALL_LOGS('POST protect');
						unset($value);
					}
				}
			}
			if (PHP_FIREWALL_PROTECTION_GET === true) {
				foreach ($_GET as $value) {
					$check = str_replace($ct_rules, '*', $value);
					if ($value != $check) {
						PHP_FIREWALL_LOGS('GET protect');
						unset($value);
					}
				}
			}
		}
		
		/** protection de l'url */
		if (PHP_FIREWALL_PROTECTION_URL === true) {
			$ct_rules = array(
				'absolute_path',
				'ad_click',
				'alert(',
				'alert%20',
				' and ',
				'basepath',
				'bash_history',
				'.bash_history',
				'cgi-',
				'chmod(',
				'chmod%20',
				'%20chmod',
				'chmod=',
				'chown%20',
				'chgrp%20',
				'chown(',
				'/chown',
				'chgrp(',
				'chr(',
				'chr=',
				'chr%20',
				'%20chr',
				'chunked',
				'cookie=',
				'cmd',
				'cmd=',
				'%20cmd',
				'cmd%20',
				'.conf',
				'configdir',
				'config.php',
				'cp%20',
				'%20cp',
				'cp(',
				'diff%20',
				'dat?',
				'db_mysql.inc',
				'document.location',
				'document.cookie',
				'drop%20',
				'echr(',
				'%20echr',
				'echr%20',
				'echr=',
				'}else{',
				'.eml',
				'esystem(',
				'esystem%20',
				'.exe',
				'exploit',
				'file\://',
				'fopen',
				'fwrite',
				'~ftp',
				'ftp:',
				'ftp.exe',
				'getenv',
				'%20getenv',
				'getenv%20',
				'getenv(',
				'grep%20',
				'_global',
				'global_',
				'global[',
				'http:',
				'_globals',
				'globals_',
				'globals[',
				'grep(',
				'g\+\+',
				'halt%20',
				'.history',
				'?hl=',
				'.htpasswd',
				'http_',
				'http-equiv',
				'http/1.',
				'http_php',
				'http_user_agent',
				'http_host',
				'&icq',
				'if{',
				'if%20{',
				'img src',
				'img%20src',
				'.inc.php',
				'.inc',
				'insert%20into',
				'ISO-8859-1',
				'ISO-',
				'javascript\://',
				'.jsp',
				'.js',
				'kill%20',
				'kill(',
				'killall',
				'%20like',
				'like%20',
				'locate%20',
				'locate(',
				'lsof%20',
				'mdir%20',
				'%20mdir',
				'mdir(',
				'mcd%20',
				'motd%20',
				'mrd%20',
				'rm%20',
				'%20mcd',
				'%20mrd',
				'mcd(',
				'mrd(',
				'mcd=',
				'mod_gzip_status',
				'modules/',
				'mrd=',
				'mv%20',
				'nc.exe',
				'new_password',
				'nigga(',
				'%20nigga',
				'nigga%20',
				'~nobody',
				'org.apache',
				'+outfile+',
				'%20outfile%20',
				'*/outfile/*',
				' outfile ',
				'outfile',
				'password=',
				'passwd%20',
				'%20passwd',
				'passwd(',
				'phpadmin',
				'perl%20',
				'/perl',
				'phpbb_root_path',
				'*/phpbb_root_path/*',
				'p0hh',
				'ping%20',
				'.pl',
				'powerdown%20',
				'rm(',
				'%20rm',
				'rmdir%20',
				'mv(',
				'rmdir(',
				'phpinfo()',
				'<?php',
				'reboot%20',
				'/robot.txt',
				'~root',
				'root_path',
				'rush=',
				'%20and%20',
				'%20xorg%20',
				'%20rush',
				'rush%20',
				'secure_site, ok',
				'select%20',
				'select from',
				'select%20from',
				'_server',
				'server_',
				'server[',
				'server-info',
				'server-status',
				'servlet',
				'sql=',
				'<script',
				'<script>',
				'</script',
				'script>',
				'/script',
				'switch{',
				'switch%20{',
				'.system',
				'system(',
				'telnet%20',
				'traceroute%20',
				'.txt',
				'union%20',
				'%20union',
				'union(',
				'union=',
				'vi(',
				'vi%20',
				'wget',
				'wget%20',
				'%20wget',
				'wget(',
				'window.open',
				'wwwacl',
				' xor ',
				'xp_enumdsn',
				'xp_availablemedia',
				'xp_filelist',
				'xp_cmdshell',
				'$_request',
				'$_get',
				'$request',
				'$get',
				'&aim',
				'/etc/password',
				'/etc/shadow',
				'/etc/groups',
				'/etc/gshadow',
				'/bin/ps',
				'uname\x20-a',
				'/usr/bin/id',
				'/bin/echo',
				'/bin/kill',
				'/bin/',
				'/chgrp',
				'/usr/bin',
				'bin/python',
				'bin/tclsh',
				'bin/nasm',
				'/usr/x11r6/bin/xterm',
				'/bin/mail',
				'/etc/passwd',
				'/home/ftp',
				'/home/www',
				'/servlet/con',
				'?>',
				'.txt'
			);
			$check    = str_replace($ct_rules, '*', PHP_FIREWALL_GET_QUERY_STRING);
			if (PHP_FIREWALL_GET_QUERY_STRING != $check) {
				PHP_FIREWALL_LOGS('URL protect');
				die(_PHPF_PROTECTION_URL);
			}
		}
		
		/** Posting from other servers in not allowed */
		if (PHP_FIREWALL_PROTECTION_REQUEST_SERVER === true) {
			if (PHP_FIREWALL_GET_REQUEST_METHOD == 'POST') {
				if (isset($_SERVER['HTTP_REFERER'])) {
					if (!stripos($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST'], 0)) {
						PHP_FIREWALL_LOGS('Posting another server');
						die(_PHPF_PROTECTION_OTHER_SERVER);
					}
				}
			}
		}
		
		/** protection contre le vers santy */
		if (PHP_FIREWALL_PROTECTION_SANTY === true) {
			$ct_rules = array(
				'rush',
				'highlight=%',
				'perl',
				'chr(',
				'pillar',
				'visualcoder',
				'sess_'
			);
			$check    = str_replace($ct_rules, '*', strtolower(PHP_FIREWALL_REQUEST_URI));
			if (strtolower(PHP_FIREWALL_REQUEST_URI) != $check) {
				PHP_FIREWALL_LOGS('Santy');
				die(_PHPF_PROTECTION_SANTY);
			}
		}
		
		/** protection bots */
		if (PHP_FIREWALL_PROTECTION_BOTS === true) {
			$ct_rules = array(
				'@nonymouse',
				'addresses.com',
				'ideography.co.uk',
				'adsarobot',
				'ah-ha',
				'aktuelles',
				'alexibot',
				'almaden',
				'amzn_assoc',
				'anarchie',
				'art-online',
				'aspseek',
				'assort',
				'asterias',
				'attach',
				'atomz',
				'atspider',
				'autoemailspider',
				'backweb',
				'backdoorbot',
				'bandit',
				'batchftp',
				'bdfetch',
				'big.brother',
				'black.hole',
				'blackwidow',
				'blowfish',
				'bmclient',
				'boston project',
				'botalot',
				'bravobrian',
				'buddy',
				'bullseye',
				'bumblebee ',
				'builtbottough',
				'bunnyslippers',
				'capture',
				'cegbfeieh',
				'cherrypicker',
				'cheesebot',
				'chinaclaw',
				'cicc',
				'civa',
				'clipping',
				'collage',
				'collector',
				'copyrightcheck',
				'cosmos',
				'crescent',
				'custo',
				'cyberalert',
				'deweb',
				'diagem',
				'digger',
				'digimarc',
				'diibot',
				'directupdate',
				'disco',
				'dittospyder',
				'download accelerator',
				'download demon',
				'download wonder',
				'downloader',
				'drip',
				'dsurf',
				'dts agent',
				'dts.agent',
				'easydl',
				'ecatch',
				'echo extense',
				'efp@gmx.net',
				'eirgrabber',
				'elitesys',
				'emailsiphon',
				'emailwolf',
				'envidiosos',
				'erocrawler',
				'esirover',
				'express webpictures',
				'extrac',
				'eyenetie',
				'fastlwspider',
				'favorg',
				'favorites sweeper',
				'fezhead',
				'filehound',
				'filepack.superbr.org',
				'flashget',
				'flickbot',
				'fluffy',
				'frontpage',
				'foobot',
				'galaxyBot',
				'generic',
				'getbot ',
				'getleft',
				'getright',
				'getsmart',
				'geturl',
				'getweb',
				'gigabaz',
				'girafabot',
				'go-ahead-got-it',
				'go!zilla',
				'gornker',
				'grabber',
				'grabnet',
				'grafula',
				'green research',
				'harvest',
				'havindex',
				'hhjhj@yahoo',
				'hloader',
				'hmview',
				'homepagesearch',
				'htmlparser',
				'hulud',
				'http agent',
				'httpconnect',
				'httpdown',
				'http generic',
				'httplib',
				'httrack',
				'humanlinks',
				'ia_archiver',
				'iaea',
				'ibm_planetwide',
				'image stripper',
				'image sucker',
				'imagefetch',
				'incywincy',
				'indy',
				'infonavirobot',
				'informant',
				'interget',
				'internet explore',
				'infospiders',
				'internet ninja',
				'internetlinkagent',
				'interneteseer.com',
				'ipiumbot',
				'iria',
				'irvine',
				'jbh',
				'jeeves',
				'jennybot',
				'jetcar',
				'joc web spider',
				'jpeg hunt',
				'justview',
				'kapere',
				'kdd explorer',
				'kenjin.spider',
				'keyword.density',
				'kwebget',
				'lachesis',
				'larbin',
				'laurion(dot)com',
				'leechftp',
				'lexibot',
				'lftp',
				'libweb',
				'links aromatized',
				'linkscan',
				'link*sleuth',
				'linkwalker',
				'libwww',
				'lightningdownload',
				'likse',
				'lwp',
				'mac finder',
				'mag-net',
				'magnet',
				'marcopolo',
				'mass',
				'mata.hari',
				'mcspider',
				'memoweb',
				'microsoft url control',
				'microsoft.url',
				'midown',
				'miixpc',
				'minibot',
				'mirror',
				'missigua',
				'mister.pix',
				'mmmtocrawl',
				'moget',
				'mozilla/2',
				'mozilla/3.mozilla/2.01',
				'mozilla.*newt',
				'multithreaddb',
				'munky',
				'msproxy',
				'nationaldirectory',
				'naverrobot',
				'navroad',
				'nearsite',
				'netants',
				'netcarta',
				'netcraft',
				'netfactual',
				'netmechanic',
				'netprospector',
				'netresearchserver',
				'netspider',
				'net vampire',
				'newt',
				'netzip',
				'nicerspro',
				'npbot',
				'octopus',
				'offline.explorer',
				'offline explorer',
				'offline navigator',
				'opaL',
				'openfind',
				'opentextsitecrawler',
				'orangebot',
				'packrat',
				'papa foto',
				'pagegrabber',
				'pavuk',
				'pbwf',
				'pcbrowser',
				'personapilot',
				'pingalink',
				'pockey',
				'program shareware',
				'propowerbot/2.14',
				'prowebwalker',
				'proxy',
				'psbot',
				'psurf',
				'puf',
				'pushsite',
				'pump',
				'qrva',
				'quepasacreep',
				'queryn.metasearch',
				'realdownload',
				'reaper',
				'recorder',
				'reget',
				'replacer',
				'repomonkey',
				'rma',
				'robozilla',
				'rover',
				'rpt-httpclient',
				'rsync',
				'rush=',
				'searchexpress',
				'searchhippo',
				'searchterms.it',
				'second street research',
				'seeker',
				'shai',
				'sitecheck',
				'sitemapper',
				'sitesnagger',
				'slysearch',
				'smartdownload',
				'snagger',
				'spacebison',
				'spankbot',
				'spanner',
				'spegla',
				'spiderbot',
				'spiderengine',
				'sqworm',
				'ssearcher100',
				'star downloader',
				'stripper',
				'sucker',
				'superbot',
				'surfwalker',
				'superhttp',
				'surfbot',
				'surveybot',
				'suzuran',
				'sweeper',
				'szukacz/1.4',
				'tarspider',
				'takeout',
				'teleport',
				'telesoft',
				'templeton',
				'the.intraformant',
				'thenomad',
				'tighttwatbot',
				'titan',
				'tocrawl/urldispatcher',
				'toolpak',
				'traffixer',
				'true_robot',
				'turingos',
				'turnitinbot',
				'tv33_mercator',
				'uiowacrawler',
				'urldispatcherlll',
				'url_spider_pro',
				'urly.warning ',
				'utilmind',
				'vacuum',
				'vagabondo',
				'vayala',
				'vci',
				'visualcoders',
				'visibilitygap',
				'vobsub',
				'voideye',
				'vspider',
				'w3mir',
				'webauto',
				'webbandit',
				'web.by.mail',
				'webcapture',
				'webcatcher',
				'webclipping',
				'webcollage',
				'webcopier',
				'webcopy',
				'webcraft@bea',
				'web data extractor',
				'webdav',
				'webdevil',
				'webdownloader',
				'webdup',
				'webenhancer',
				'webfetch',
				'webgo',
				'webhook',
				'web.image.collector',
				'web image collector',
				'webinator',
				'webleacher',
				'webmasters',
				'webmasterworldforumbot',
				'webminer',
				'webmirror',
				'webmole',
				'webreaper',
				'websauger',
				'websaver',
				'website.quester',
				'website quester',
				'websnake',
				'websucker',
				'web sucker',
				'webster',
				'webreaper',
				'webstripper',
				'webvac',
				'webwalk',
				'webweasel',
				'webzip',
				'wget',
				'widow',
				'wisebot',
				'whizbang',
				'whostalking',
				'wonder',
				'wumpus',
				'wweb',
				'www-collector-e',
				'wwwoffle',
				'wysigot',
				'xaldon',
				'xenu',
				'xget',
				'x-tractor',
				'zeus'
			);
			$check    = str_replace($ct_rules, '*', strtolower(PHP_FIREWALL_USER_AGENT));
			if (strtolower(PHP_FIREWALL_USER_AGENT) != $check) {
				PHP_FIREWALL_LOGS('Bots attack');
				die(_PHPF_PROTECTION_BOTS);
			}
		}
		
		/** Invalid request method check */
		if (PHP_FIREWALL_PROTECTION_REQUEST_METHOD === true) {
			if (strtolower(PHP_FIREWALL_GET_REQUEST_METHOD) != 'get' AND strtolower(PHP_FIREWALL_GET_REQUEST_METHOD) != 'head' AND strtolower(PHP_FIREWALL_GET_REQUEST_METHOD) != 'post' AND strtolower(PHP_FIREWALL_GET_REQUEST_METHOD) != 'put') {
				PHP_FIREWALL_LOGS('Invalid request');
				die(_PHPF_PROTECTION_REQUEST);
			}
		}
		
		/** protection dos attaque */
		if (PHP_FIREWALL_PROTECTION_DOS === true) {
			if (!defined('PHP_FIREWALL_USER_AGENT') || PHP_FIREWALL_USER_AGENT == '-') {
				PHP_FIREWALL_LOGS('Dos attack');
				die(_PHPF_PROTECTION_DOS);
			}
		}
		
		/** protection union sql attaque */
		if (PHP_FIREWALL_PROTECTION_UNION_SQL === true) {
			$stop     = 0;
			$ct_rules = array(
				'*/from/*',
				'*/insert/*',
				'+into+',
				'%20into%20',
				'*/into/*',
				' into ',
				'into',
				'*/limit/*',
				'not123exists*',
				'*/radminsuper/*',
				'*/select/*',
				'+select+',
				'%20select%20',
				' select ',
				'+union+',
				'%20union%20',
				'*/union/*',
				' union ',
				'*/update/*',
				'*/where/*'
			);
			$check    = str_replace($ct_rules, '*', PHP_FIREWALL_GET_QUERY_STRING);
			if (PHP_FIREWALL_GET_QUERY_STRING != $check)
				$stop++;
			if (preg_match(PHP_FIREWALL_REGEX_UNION, PHP_FIREWALL_GET_QUERY_STRING))
				$stop++;
			if (preg_match('/([OdWo5NIbpuU4V2iJT0n]{5}) /', rawurldecode(PHP_FIREWALL_GET_QUERY_STRING)))
				$stop++;
			if (strstr(rawurldecode(PHP_FIREWALL_GET_QUERY_STRING), '*'))
				$stop++;
			if (!empty($stop)) {
				PHP_FIREWALL_LOGS('Union attack');
				die(_PHPF_PROTECTION_UNION);
			}
		}
		
		/** protection click attack */
		if (PHP_FIREWALL_PROTECTION_CLICK_ATTACK === true) {
			$ct_rules = array(
				'/*',
				'c2nyaxb0',
				'/*'
			);
			if (PHP_FIREWALL_GET_QUERY_STRING != str_replace($ct_rules, '*', PHP_FIREWALL_GET_QUERY_STRING)) {
				PHP_FIREWALL_LOGS('Click attack');
				die(_PHPF_PROTECTION_CLICK);
			}
		}
		
		/** protection XSS attack */
		if (PHP_FIREWALL_PROTECTION_XSS_ATTACK === true) {
			$ct_rules = array(
				'http\:\/\/',
				'https\:\/\/',
				'cmd=',
				'&cmd',
				'exec',
				'concat',
				'./',
				'../',
				'http:',
				'h%20ttp:',
				'ht%20tp:',
				'htt%20p:',
				'http%20:',
				'https:',
				'h%20ttps:',
				'ht%20tps:',
				'htt%20ps:',
				'http%20s:',
				'https%20:',
				'ftp:',
				'f%20tp:',
				'ft%20p:',
				'ftp%20:',
				'ftps:',
				'f%20tps:',
				'ft%20ps:',
				'ftp%20s:',
				'ftps%20:',
				'.php?url='
			);
			$check    = str_replace($ct_rules, '*', PHP_FIREWALL_GET_QUERY_STRING);
			if (PHP_FIREWALL_GET_QUERY_STRING != $check) {
				PHP_FIREWALL_LOGS('XSS attack');
				die(_PHPF_PROTECTION_XSS);
			}
		}
		
	}

?>