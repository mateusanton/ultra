<?php

use Database\Connection;

class Amostra
{
  private $id;
  private $idAmostraExterna;

  private $status;

  private $origem;

  private $idUser;
  /**
   * Requisição para o banco de dados para as amostras
   */
  public function carregaAmostras()
  {
    $conn = Connection::getConn();
    $sql = 'SELECT * FROM amostra WHERE idUser = :idUser';

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':idUser', $_SESSION['usr']['id_user']);

    $stmt->execute();

    $amostras = array();

    if ($stmt->rowCount()) {
      while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $amostras[] = array(
          'id_amostra' => $result['id'],
          'id_amostraExterna' => $result['idAmostraExterno'],
          'origem' => $result['origem'],
          'status' => $result['status']
        );
      }
    }

    return $amostras;
  }

  ## Getters e setters

  public function setIdAmostraExterna($idAmostraExterna)
  {
    $this->idAmostraExterna = $idAmostraExterna;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function setIdUser($idUser)
  {
    $this->idUser = $idUser;
  }

  public function getIdAmostraExterna()
  {
    return $this->idAmostraExterna;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function getIdUser()
  {
    return $this->idUser;
  }

}