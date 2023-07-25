<?php

namespace Database;

abstract class Connection
{

  private static $conn;

  /**
   * Conexão com o PDO para o banco de dados
   */
  public static function getConn()
  {
    if (!self::$conn) {
      try {
        self::$conn = new \PDO('mysql:host=localhost;dbname=ultra', 'root', '');
      } catch (\PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
      }
    }

    return self::$conn;
  }
}