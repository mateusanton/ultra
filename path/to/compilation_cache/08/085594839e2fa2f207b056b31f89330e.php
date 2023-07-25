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

/* dashboard.html */
class __TwigTemplate_75e520b08df648cd2d584e0af93a9650 extends Template
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
        echo "<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"UTF-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\" />
    <link
      rel=\"stylesheet\"
      href=\"http://localhost/ultra/assets/css/styles_dash.css\"
    />
    <title>Dashboard</title>
  </head>
  <body>
    <header>
      <div class=\"content_area\">
        Bem vindo ";
        // line 15
        echo twig_escape_filter($this->env, ($context["name_user"] ?? null), "html", null, true);
        echo ",
        <a href=\"http://localhost/ultra/dashboard/logout\">Sair</a>
      </div>
    </header>

    <section class=\"box_dash\">
      <h1>Amostras</h1>

      <button id=\"carregarAmostrasBtn\">Carregar Amostras</button>

      <div id=\"amostrasContainer\"></div>
    </section>

    <script src=\"https://code.jquery.com/jquery-3.6.0.min.js\"></script>
    <script>
      \$(document).ready(function () {
        \$('#carregarAmostrasBtn').on('click', function () {
          carregarAmostras()
        })

        function carregarAmostras() {
          \$.ajax({
            type: 'GET',
            url: 'http://localhost/ultra/dashboard/carregar',
            dataType: 'json',
            success: function (response) {
              exibirAmostras(response)
            },
            error: function (xhr, status, error) {
              console.error('Erro ao carregar amostras:', error)
            }
          })
        }

        function exibirAmostras(amostras) {
          var amostrasContainer = \$('#amostrasContainer')
          amostrasContainer.html('')

          if (amostras.length > 0) {
            var table = \$('<table>')
            var thead = \$('<thead>').appendTo(table)
            var tbody = \$('<tbody>').appendTo(table)
            var headerRow = \$('<tr>').appendTo(thead)

            ;['ID', 'ID Externo', 'Origem', 'Status'].forEach(function (
              headerText
            ) {
              \$('<th>').text(headerText).appendTo(headerRow)
            })

            amostras.forEach(function (amostra) {
              var row = \$('<tr>').appendTo(tbody)
              ;[
                amostra.id_amostra,
                amostra.id_amostraExterna,
                amostra.origem,
                amostra.status
              ].forEach(function (cellData) {
                \$('<td>').text(cellData).appendTo(row)
              })
            })

            amostrasContainer.append(table)
          } else {
            amostrasContainer.text('Nenhuma amostra encontrada.')
          }
        }
      })
    </script>
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 15,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "dashboard.html", "C:\\xampp\\htdocs\\ultra\\app\\view\\dashboard.html");
    }
}
