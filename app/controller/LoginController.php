<?php

class LoginController
{

  /**
   * Retorna a index do login (página inícial)
   */
  public function index()
  {
    $loader = new \Twig\Loader\FilesystemLoader('app/view');
    $twig = new \Twig\Environment($loader, [
      'cache' => 'path/to/compilation_cache',
      'auto_reload' => true,
    ]);
    $template = $twig->load('login.html');
    $params['error'] = $_SESSION['mgs_error'] ?? null;

    return $template->render($params);
  }

  /**
   * Checa os inputs de login e valida o usuário.
   */
  public function check()
  {
    try {
      $user = new User();

      // Filtro para o campo de email
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      if (!$email) {
        throw new Exception('Email inválido.');
      }
      $user->setEmail($email);

      // Filtro para o campo de senha (opcional, dependendo do uso)
      $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
      if (!$password) {
        throw new Exception('Senha inválida.');
      }
      $user->setPassword($password);

      $user->validateLogin();

      header('Location: http://localhost/ultra/dashboard');
    } catch (\Exception $e) {
      $_SESSION['mgs_error'] = array('msg' => $e->getMessage(), 'count' => 0);
      header('Location: http://localhost/ultra/');
    }
  }
}