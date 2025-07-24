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

/* /custom-js.html */
class __TwigTemplate_36ea3a6bd212872a9c32b45990f8b597 extends Template
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
        echo "<script>
    var token = null

    function swalError(msg)
    {
        Swal.fire('Ops!', msg, 'error')
    }

    function swalLoading() {
        Swal.fire({
            title: \"Aguarde...\",
            didOpen: () => {
                Swal.showLoading();
            },
        });
    }

    const SWAL_HTML = {
        confirmPass: `
        <input type=\"password\" name=\"current-password\" id=\"current-password\" class=\"form-control\" placeholder=\"Senha Atual\" >
        `,
        changePassword: `
        <form id=\"change-password-form\" class=\"overflow-hidden\">
        <div class=\"text-start mb-3\" style=\"font-size: 12px;\">
            - Deve conter entre 8 e 16 caracteres. <br>
            - Deve conter ao menos 1 letra minúscula. <br>
            - Deve conter ao menos 1 letra maiúscula. <br>
            - Deve conter ao menos 1 número. <br>
            - Deve conter ao menos 1 caractere especial. <br>
        </div>
        <input type=\"password\" name=\"password\" id=\"swal-password\" class=\"form-control mb-3\" placeholder=\"Nova Senha\" >
        <input type=\"password\" name=\"confirm-password\" id=\"swal-password-confirm\" class=\"form-control mb-3\" placeholder=\"Confirme a Senha\" >
        <input type=\"hidden\" name=\"token\" id=\"__token\" value=\"";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 33), "html", null, true);
        echo "\">
        ";
        // line 34
        if (twig_constant("ENABLE_CAPTCHA")) {
            // line 35
            echo "            <div class=\"mt-1 d-flex justify-content-center\">
                <div class=\"g-recaptcha\" id=\"change-password-captcha\" data-sitekey=\"";
            // line 36
            echo twig_escape_filter($this->env, twig_constant("CAPTCHA_PUBLIC_KEY"), "html", null, true);
            echo "\"></div>
            </div>
        ";
        }
        // line 39
        echo "        </form>
        `,
        changeEmail: `
        <form id=\"change-email-form\" class=\"overflow-hidden\">
        <div class=\"text-start mb-3\" style=\"font-size: 12px;\">
            - Deve ser válido. <br>
        </div>
        <input type=\"email\" name=\"email\" id=\"swal-email\" class=\"form-control mb-3\" placeholder=\"Novo E-mail\" autocomplete=\"off\">
        <input type=\"email\" name=\"confirm-email\" id=\"swal-email-confirm\" class=\"form-control mb-3\" placeholder=\"Confirme E-mail\" autocomplete=\"off\">
        <input type=\"hidden\" name=\"token\" id=\"__token\" value=\"";
        // line 48
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 48), "html", null, true);
        echo "\">
        ";
        // line 49
        if (twig_constant("ENABLE_CAPTCHA")) {
            // line 50
            echo "            <div class=\"mt-1 d-flex justify-content-center\">
                <div class=\"g-recaptcha\" id=\"change-email-captcha\" data-sitekey=\"";
            // line 51
            echo twig_escape_filter($this->env, twig_constant("CAPTCHA_PUBLIC_KEY"), "html", null, true);
            echo "\"></div>
            </div>
        ";
        }
        // line 54
        echo "        </form>
        `
        }

        const BTN_LABELS = {
            continue: \"Continuar\",
            confirm: \"Confirmar\",
            cancel: \"Cancelar\",
            enter: \"Entrar\",
            color: 'darkred'
        }

        function renderCaptcha(form) 
        {
            let enabled = `";
        // line 68
        echo twig_escape_filter($this->env, twig_constant("ENABLE_CAPTCHA"), "html", null, true);
        echo "` 

            if (enabled) {
                grecaptcha.render(form, {
                    'sitekey': '";
        // line 72
        echo twig_escape_filter($this->env, twig_constant("CAPTCHA_PUBLIC_KEY"), "html", null, true);
        echo "'
                })
            }
        }

        function updateToken()
        {
            if (token !== null) {
                document.getElementById('__token').value = token;
            }
        }

        function changePassword(currentPass)
        {
            Swal.fire({
            title: 'Digite a Nova Senha',
            html: SWAL_HTML.changePassword,
            didOpen: () => {
                renderCaptcha('change-password-captcha')
                updateToken()
                const passwordInput = Swal.getPopup().querySelector('#swal-password');

                passwordInput.addEventListener('keydown', (event) => {
                    if (event.key === 'Enter') {
                    event.preventDefault();
                    }
                });
            },
            confirmButtonText: BTN_LABELS.continue,
            confirmButtonColor: BTN_LABELS.color,
            showCancelButton: true,
            cancelButtonText: BTN_LABELS.cancel,
            focusConfirm: false,
            preConfirm: () => {
                const password = Swal.getPopup().querySelector('#swal-password').value
                const confirmPassword = Swal.getPopup().querySelector('#swal-password-confirm').value

                if (!password || !confirmPassword) {
                    Swal.showValidationMessage(`Preencha todos os campos.`)
                }
                return { password: password, confirmPassword: confirmPassword }
            }
            })
            .then((result) => {
                if (result.isConfirmed === false) {
                    return;
                }

                const formData = new FormData(document.getElementById('change-password-form'))
                formData.append('current-password', currentPass)

                swalLoading()

                fetch('/change-password', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    token = data.token

                    if (data.success === true) {
                        Swal.fire('Successo!', data.msg, 'success')
                        return;
                    }

                    swalError(data.msg)
                    return;
                })
                .catch(error => {
                    Swal.fire('Ops!', 'Atualize a página e tente novamente.', 'error')
                })
            })
        }

        function changeEmail(currentPass)
        {
            Swal.fire({
            title: 'Digite o Novo Email',
            html: SWAL_HTML.changeEmail,
            didOpen: () => {
                renderCaptcha('change-email-captcha')
                updateToken()
                const emailInput = Swal.getPopup().querySelector('#swal-email');

                emailInput.addEventListener('keydown', (event) => {
                    if (event.key === 'Enter') {
                    event.preventDefault();
                    }
                });
            },
            confirmButtonText: BTN_LABELS.continue,
            confirmButtonColor: BTN_LABELS.color,
            showCancelButton: true,
            cancelButtonText: BTN_LABELS.cancel,
            focusConfirm: false,
            preConfirm: () => {
                const email = Swal.getPopup().querySelector('#swal-email').value
                const confirmemail = Swal.getPopup().querySelector('#swal-email-confirm').value

                if (!email || !confirmemail) {
                    Swal.showValidationMessage(`Preencha todos os campos.`)
                }
                return { email: email, confirmemail: confirmemail }
            }
            })
            .then((result) => {
                if (result.isConfirmed === false) {
                    return;
                }

                const formData = new FormData(document.getElementById('change-email-form'))
                formData.append('current-password', currentPass)

                swalLoading()

                fetch('/change-email', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    token = data.token

                    if (data.success === true) {
                        Swal.fire('Successo!', data.msg, 'success')
                        return;
                    }

                    swalError(data.msg)
                    return;
                })
                .catch(error => {
                    Swal.fire('Ops!', 'Atualize a página e tente novamente.', 'error')
                })
            })
        }
        
        function socialId(currentPass)
        {
            const formData = new FormData();
            formData.append('current-password', currentPass)

            swalLoading()

            fetch('/char-code', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success === true) {
                    Swal.fire({
                    title: 'Senha do Personagem:',
                    icon: 'info',
                    html:
                        `<div style=\"background-color:#e6bf6b; max-width:50%; padding:15px; margin:auto;\"><b>\${data.msg}</b></div>`,
                    focusConfirm: false,
                    confirmButtonText:
                        'Ok'
                    })
                    return;
                }
                swalError(data.msg)
                return;
            })
            .catch(error => {
                Swal.fire('Ops!', 'Atualize a página e tente novamente.', 'error')
            })
        }

        function warehousePassword(currentPass)
        {
            const formData = new FormData();
            formData.append('current-password', currentPass)

            swalLoading()

            fetch('/warehouse-password', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success === true) {
                    Swal.fire({
                    title: 'Senha do Armazém:',
                    icon: 'info',
                    html:
                        `<div style=\"background-color:#e6bf6b; max-width:50%; padding:15px; margin:auto;\"><b>\${data.msg}</b></div>
                        <span class=\"text-muted\" style=\"font-size:11px;\">Você pode alterar sua senha ingame.</span>`,
                    focusConfirm: false,
                    confirmButtonText:
                        'Ok'
                    })
                    return;
                }
                swalError(data.msg)
                return;
            })
            .catch(error => {
                Swal.fire('Ops!', 'Atualize a página e tente novamente.', 'error')
            })
        }

        function confirmPassword(i) 
        {
            Swal.fire({
            title: 'Informe sua senha para continuar',
            html: SWAL_HTML.confirmPass,
            didOpen: () => {
                updateToken()

                const passwordInput = Swal.getPopup().querySelector('#current-password');

                passwordInput.addEventListener('keydown', (event) => {
                    if (event.key === 'Enter') {
                    event.preventDefault();
                    }
                });
            },
            confirmButtonText: BTN_LABELS.continue,
            confirmButtonColor: BTN_LABELS.color,
            showCancelButton: true,
            cancelButtonText: BTN_LABELS.cancel,
            focusConfirm: false,
            showLoaderOnConfirm: true,
            preConfirm: () => {
                const currentPassword = Swal.getPopup().querySelector('#current-password').value

                if (!currentPassword) {
                    Swal.showValidationMessage(`Informe sua senha atual.`)
                }
                return { currentPassword: currentPassword }
            }
            })
            .then((result) => {
                if (result.isConfirmed === false) {
                    return;
                }

                let currentPass = result.value.currentPassword

                switch (i) {
                    case 'change-password':
                        changePassword(currentPass)
                        break;
                    case 'change-email':
                        changeEmail(currentPass)
                        break;
                    case 'social-id':
                        socialId(currentPass)
                        break;
                    case 'warehouse-password':
                        warehousePassword(currentPass)
                        break;
                }
            })
        }
</script>";
    }

    public function getTemplateName()
    {
        return "/custom-js.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 72,  128 => 68,  112 => 54,  106 => 51,  103 => 50,  101 => 49,  97 => 48,  86 => 39,  80 => 36,  77 => 35,  75 => 34,  71 => 33,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/custom-js.html", "/home/u811429539/domains/mt2.pro/public_html/xtreme/view/custom-js.html");
    }
}
