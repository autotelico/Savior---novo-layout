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

/* admin/post.html */
class __TwigTemplate_2420674b43efe9c7dfa04aa0368d031c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'css' => [$this, 'block_css'],
            'content' => [$this, 'block_content'],
            'js' => [$this, 'block_js'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "admin/structure.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("admin/structure.html", "admin/post.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<link rel=\"stylesheet\" href=\"/plugins/summernote/summernote-bs4.min.css\">
<link rel=\"stylesheet\" href=\"/css/sweetalert2.min.css\">
<script src=\"/js/sweetalert2.all.min.js\"></script>
";
    }

    // line 9
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "<div class=\"content-wrapper\">
    <!-- Content Header (Page header) -->
    <div class=\"content-header\">
      <div class=\"container-fluid\">
        <div class=\"row mb-2\">
          <div class=\"col-sm-6\">
            <h1 class=\"m-0\">Postagens</h1>
          </div><!-- /.col -->
          <div class=\"col-sm-6 d-none\">
            <ol class=\"breadcrumb float-sm-right\">
              <li class=\"breadcrumb-item\"><a href=\"#\">Home</a></li>
              <li class=\"breadcrumb-item active\">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class=\"content\">
      <div class=\"container-fluid\">
        <div class=\"row\">
          <div class=\"col-12\">
            <form action=\"#\" id=\"form-post\">
                <div class=\"card\">
                  <div class=\"card-header\">
                      <h3 class=\"card-title\">Nova Postagem</h3>
                      <div class=\"card-tools\">
                        <button type=\"button\" class=\"btn btn-tool\" data-card-widget=\"collapse\">
                            <i class=\"bi bi-dash\"></i>
                        </button>
                      </div>
                  </div>
                  <div class=\"card-body\">
                      <div class=\"form-group\">
                          <input type=\"text\" class=\"form-control\" placeholder=\"Título\" name=\"title\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "title", [], "any", false, false, false, 46), "html", null, true);
        echo "\">
                      </div>
                      <div class=\"form-group\">
                          <select name=\"category\" id=\"#\" class=\"form-control\">
                              ";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 51
            echo "                              ";
            if ((twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "category", [], "any", false, false, false, 51) == twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 51))) {
                // line 52
                echo "                              <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 52), "html", null, true);
                echo "\" selected> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "value", [], "any", false, false, false, 52), "html", null, true);
                echo "</option>
                              ";
            } else {
                // line 54
                echo "                              <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 54), "html", null, true);
                echo "\"> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "value", [], "any", false, false, false, 54), "html", null, true);
                echo "</option>
                              ";
            }
            // line 56
            echo "                              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "                          </select>
                      </div>
                      <div class=\"form-group\">
                          <input type=\"text\" class=\"form-control\" placeholder=\"Link da Imagem\" name=\"img_url\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "imgUrl", [], "any", false, false, false, 60), "html", null, true);
        echo "\">
                      </div>
                      <div class=\"form-group\">
                          <textarea class=\"note-codable\" aria-multiline=\"true\" style=\"height: 44px;\" id=\"compose\" name=\"content\">";
        // line 63
        echo twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "content", [], "any", false, false, false, 63);
        echo "</textarea>
                      </div>
                      <input type=\"hidden\" name=\"token\" id=\"__token\" value=\"";
        // line 65
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "token", [], "any", false, false, false, 65), "html", null, true);
        echo "\">
                      <input type=\"hidden\" name=\"id\" id=\"__id\" value=\"";
        // line 66
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "id", [], "any", false, false, false, 66), "html", null, true);
        echo "\">
                      <input type=\"hidden\" name=\"views\" id=\"views\" value=\"";
        // line 67
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "views", [], "any", false, false, false, 67), "html", null, true);
        echo "\">
                      <input type=\"hidden\" name=\"date\" id=\"date\" value=\"";
        // line 68
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "date", [], "any", false, false, false, 68), "html", null, true);
        echo "\">
                      <input type=\"hidden\" name=\"link\" id=\"link\" value=\"";
        // line 69
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "link", [], "any", false, false, false, 69), "html", null, true);
        echo "\">
                      <span class=\"text-muted\"><i class=\"bi bi-eye-fill\"></i>  <span class=\"views\">";
        // line 70
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "views", [], "any", false, false, false, 70), "html", null, true);
        echo "</span></span>
                      <br>
                      <span class=\"text-muted\"><i class=\"bi bi-calendar-date\"></i>  <span class=\"date\">";
        // line 72
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "date", [], "any", false, false, false, 72), "d/m/Y"), "html", null, true);
        echo " às ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "date", [], "any", false, false, false, 72), "H:i:s"), "html", null, true);
        echo "h</span></span>
                  </div>
                  <div class=\"card-footer\">
                      <div class=\"btn-group\" id=\"btn-delete-post\">
                          ";
        // line 76
        if (twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "id", [], "any", false, false, false, 76)) {
            // line 77
            echo "                          <a onclick=\"return postDelete('";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["post"] ?? null), "id", [], "any", false, false, false, 77), "html", null, true);
            echo "')\" class=\"btn btn-danger\"><i class=\"bi bi-trash\"></i> Apagar</a>
                          <a href=\"/admin/post\" class=\"btn btn-default\"><i class=\"bi bi-newspaper\"></i> Novo</a>
                          ";
        }
        // line 80
        echo "                      </div>
                      <div class=\"btn-group float-right\">
                          <a onclick=\"return create()\" class=\"btn btn-secondary\"><i class=\"bi bi-pencil\"></i> Salvar Rascunho</a>
                          <a onclick=\"return create(true)\" class=\"btn btn-success\"><i class=\"bi bi-arrow-right\"></i> Publicar</a>
                      </div>
                  </div>
                </div>
            </form>
          </div>

        </div>
        <!-- /.row -->
        <div class=\"row\">
          <div class=\"col-lg-8\">
            <div class=\"card\">
              <div class=\"card-header\">
                <h3 class=\"card-title\">Últimas Postagens</h3>
              </div>
              <div class=\"card-body p-0\">
                <div class=\"table-responsive text-center\">
                  <table class=\"table m-0\">
                    <thead>
                      <tr>
                        <th>Categoria</th>
                        <th>Título</th>
                        <th>Status</th>
                        <th>Visualizações</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody id=\"publishedTable\">
                      <!-- <tr>
                        <td><a href=\"#\">Eventos</a></td>
                        <td><a href=\"#\">Eventos Semanais</a></td>
                        <td><span class=\"badge badge-success\">Publicado</span></td>
                        <td>1.375</td>
                        <td>
                          <div class=\"btn-group\">
                              <a href=\"#\" class=\"btn btn-primary btn-sm\" title=\"Editar\"><i class=\"bi bi-pencil-square\"></i></a>
                              <a href=\"#\" class=\"btn btn-danger btn-sm\" title=\"Apagar\"><i class=\"bi bi-trash\"></i></a>
                          </div>
                        </td>
                      </tr> -->
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <div class=\"card-footer text-center\">
                <a href=\"#\" class=\"\">Ver Mais</a>
              </div>
            </div>
          </div>
          <div class=\"col-lg-4\">
              <div class=\"card\">
                <div class=\"card-header\">
                  <h3 class=\"card-title\">Rascunhos</h3>
                </div>
                <div class=\"card-body p-0\">
                  <div class=\"table-responsive text-center\">
                    <table class=\"table m-0\">
                      <thead>
                        <tr>
                          <th>Categoria</th>
                          <th>Título</th>
                          <th>Status</th>
                          <th>Opções</th>
                        </tr>
                      </thead>
                      <tbody id=\"draftTable\">
                        <!-- <tr>
                          <td><a href=\"#\">Eventos</a></td>
                          <td><a href=\"#\">Eventos Semanais</a></td>
                          <td><span class=\"badge badge-warning\">Rascunho</span></td>
                          <td>
                            <div class=\"btn-group\">
                              <a href=\"#\" class=\"btn btn-primary btn-sm\" title=\"Editar\"><i class=\"bi bi-pencil-square\"></i></a>
                              <a href=\"#\" class=\"btn btn-danger btn-sm\" title=\"Apagar\"><i class=\"bi bi-trash\"></i></a>
                            </div>
                          </td>
                        </tr> -->

                      </tbody>
                    </table>
                  </div>
                </div>
                <div class=\"card-footer text-center\">
                  <a href=\"#\" class=\"\">Ver Mais</a>
                </div>
              </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
";
    }

    // line 178
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 179
        echo "<script src=\"/plugins/summernote/summernote-bs4.min.js\"></script>
  <script>
    \$('#compose').summernote()

    function updateCurrentPost(data)
    {
      
      \$(\"#__id\").val(data.id)
      \$(\"#views\").val(data.views)
      \$(\"#date\").val(data.date)
      \$(\"#link\").val(data.link)
      
      var formattedDate = new Date(data.date);
      var formattedDateText = formattedDate.getDate() + \"/\" + (formattedDate.getMonth() + 1) + \"/\" + formattedDate.getFullYear();
      var formattedTimeText = formattedDate.getHours() + \":\" + formattedDate.getMinutes() + \":\" + formattedDate.getSeconds();
      
      \$(\"span.views\").html(data.views)
      \$(\"span.date\").html(\" \" + formattedDateText + \" às \" + formattedTimeText + \"h\")
     
      let deleteContainer = document.getElementById('btn-delete-post')
      deleteContainer.classList.remove('d-none')
      deleteContainer.innerHTML = `
      <a onclick=\"return postDelete(\${data.id})\" class=\"btn btn-danger\"><i class=\"bi bi-trash\"></i> Apagar</a>
      <a href=\"/admin/post\" class=\"btn btn-default\"><i class=\"bi bi-newspaper\"></i> Novo</a>`
    }
    
    function updateToken(responseToken)
    {
      document.getElementById('__token').value = responseToken;
    }

    function create(draft = false)
    {
      const formData = new FormData(document.getElementById('form-post'))
      if (draft) {
        formData.append('publish', true)
      }

      swalLoading()

      fetch('/admin/post/create', {
          method: 'POST',
          body: formData
      })
      .then(response => response.json())
      .then(data => {
          updateToken(data.token)
          
          if (data.extra.id) {
            updateCurrentPost(data.extra)
          }

          if (data.success === true) {
            Swal.fire('Successo!', data.msg, 'success')
            updateDraft()
            updatePublished()
            return;
          }

          swalError(data.msg)
          return;
      })
      .catch(error => {
          Swal.fire('Ops!', 'Atualize a página e tente novamente.', 'error')
      })
    }

    function postDelete(id) 
    {
      fetch(`/admin/post/delete/\${id}`, {
          method: 'GET',
        })
        .then(response => response)
        .then(data => {
          document.getElementById('__id').value = '';
          updateDraft()
          updatePublished()
        })
        .catch(error => {
            console.log(error)
        })
    }

    function updateDraft()
    {
        fetch('/admin/post/list/draft', {
            method: 'GET',
        })
        .then(response => response.json())
        .then(data => {
          const tableBody = document.getElementById('draftTable');
          tableBody.innerHTML = ''

          data.forEach(item => {
          let html = `
            <tr>
              <td><a href=\"/post/\${item.category}\" target=\"__blank\">\${item.category}</a></td>
              <td><a href=\"/post/\${item.category}/\${item.link}\" target=\"__blank\">\${item.title}</a></td>
              <td><span class=\"badge badge-warning\">Rascunho</span></td>
              <td>
                <div class=\"btn-group\">
                  <a href=\"/admin/post/\${item.id}\" class=\"btn btn-primary btn-sm\" title=\"Editar\"><i class=\"bi bi-pencil-square\"></i></a>
                  <a onclick=\"return postDelete(\${item.id})\" class=\"btn btn-danger btn-sm\" title=\"Apagar\"><i class=\"bi bi-trash\"></i></a>
                </div>
              </td>
            </tr>
          `;

          // Adicionar o HTML gerado à tabela existente
          tableBody.innerHTML += html;
        });
        })
        .catch(error => {
            console.log(error)
        })
    }

    function updatePublished()
    {
      fetch('/admin/post/list/published', {
            method: 'GET',
        })
        .then(response => response.json())
        .then(data => {
          const tableBody = document.getElementById('publishedTable');
          tableBody.innerHTML = ''

          data.forEach(item => {
          let html = `
          <tr>
            <td><a href=\"/post/\${item.category}\" target=\"__blank\">\${item.category}</a></td>
            <td><a href=\"/post/\${item.category}/\${item.link}\" target=\"__blank\">\${item.title}</a></td>
            <td><span class=\"badge badge-success\">Publicado</span></td>
            <td>\${item.views}</td>
            <td>
              <div class=\"btn-group\">
                <a href=\"/admin/post/\${item.id}\" class=\"btn btn-primary btn-sm\" title=\"Editar\"><i class=\"bi bi-pencil-square\"></i></a>
                  <a onclick=\"return postDelete(\${item.id})\" class=\"btn btn-danger btn-sm\" title=\"Apagar\"><i class=\"bi bi-trash\"></i></a>
              </div>
            </td>
          </tr>
          `;

          // Adicionar o HTML gerado à tabela existente
          tableBody.innerHTML += html;
        });
        })
        .catch(error => {
            console.log(error)
        })
    }

    window.addEventListener('load',function() {
      updateDraft()
      updatePublished()
    });
  </script>
";
    }

    public function getTemplateName()
    {
        return "admin/post.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  300 => 179,  296 => 178,  196 => 80,  189 => 77,  187 => 76,  178 => 72,  173 => 70,  169 => 69,  165 => 68,  161 => 67,  157 => 66,  153 => 65,  148 => 63,  142 => 60,  137 => 57,  131 => 56,  123 => 54,  115 => 52,  112 => 51,  108 => 50,  101 => 46,  63 => 10,  59 => 9,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/post.html", "/home/u261225349/domains/alcatraz2.online/public_html/view/admin/post.html");
    }
}
