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

/* login.html */
class __TwigTemplate_04ca78aaf3f02f4af97a2f115cbdde60 extends Template
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

<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <link rel=\"stylesheet\" href=\"http://localhost/ultra/assets/css/styles.css\">
  <title>Document</title>
</head>

<body>
  <div class=\"box_login\">
    <h1>Faça seu login</h1>

    <form method=\"POST\" action=\"/ultra/login/check\">
      <input type=\"email\" name=\"e-mail\" placeholder=\"E-mail\">
      <input type=\"password\" name=\"password\" placeholder=\"Senha\">

      <button class=\"btn_login\">Logar</button>
      <span class=\"msg_error\">Tentativa Inválida</span>
    </form>
  </div>
</body>

</html>";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "login.html", "C:\\xampp\\htdocs\\ultra\\app\\view\\login.html");
    }
}
