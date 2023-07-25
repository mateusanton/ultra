<?php

use Database\Connection;

class User
{
  private $id;
  private $name;
  private $email;
  private $password;

  /**
   * Valida usuário com o banco para o login
   */
  public function validateLogin()
  {
    $conn = Connection::getConn();
    $sql = 'SELECT * FROM user WHERE email = :email';


    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':email', $this->email);

    $stmt->execute();

    if ($stmt->rowCount()) {

      $result = $stmt->fetch();

      if (password_verify($this->password, $result['password'])) {
        $_SESSION['usr'] = array('id_user' => $result['id'], 'name_user' => $result['name']);

        return true;
      }
    }


    throw new \Exception('Login Inválido');
  }

  ## Getters e setters
  
  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getPassword()
  {
    return $this->password;
  }

}