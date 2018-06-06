<?php

namespace Helper;

/**
 * Class PdoConnexion
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Helper
 */
final class PdoConnexion
{
    /**
     * @var
     */
    private static $pdo;

    /**
     * PdoConnexion constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return \PDO
     */
    public static function get()
    {
        if (\is_null(self::$pdo)) {
            try {
                self::$pdo = new \PDO('mysql:host=localhost;dbname=kandt', 'kandt', 'kandt');
                self::$pdo->exec("SET NAMES UTF8");
            } catch (\PDOException $exception) {
                die($exception->getMessage());
            }
        }

        return self::$pdo;
    }
}
