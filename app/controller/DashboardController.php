<?php

class DashboardController
{
  private $amostras;
  /**
   *  Renderiza a index da dashboard para as amostras
   *
   */
  public function index()
  {
    $loader = new \Twig\Loader\FilesystemLoader('app/view');
    $twig = new \Twig\Environment($loader, [
      'cache' => 'path/to/compilation_cache',
      'auto_reload' => true,
    ]);

    $template = $twig->load('dashboard.html');
    $params['name_user'] = $_SESSION['usr']['name_user'];
    $params['amostras'] = $this->amostras;

    return $template->render($params);
  }

  /**
   *  Carrega as asmostras
   *
   */
  public function carregar()
  {
    $amostra = new Amostra();
    $amostrasCarregadas = $amostra->carregaAmostras();

    header('Content-Type: application/json');
    return json_encode($amostrasCarregadas);
  }

  /**
   *  Destrói a session do usuário logado
   *
   */
  public function logout()
  {
    unset($_SESSION['usr']);
    session_destroy();
    header('Location: http://localhost/ultra/');
  }

}