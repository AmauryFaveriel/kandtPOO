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
<<<<<<< HEAD

    /**
     * @param \PDOStatement $stmt
     * @throws \Exception
     */
    public static function errorHandler(\PDOStatement $stmt) : void
    {
        if ($stmt->errorCode() !== '00000') {
            throw new \Exception($stmt->errorInfo()[1]);
        }
    }
}
=======
}
>>>>>>> c54fad69b12de39333271ea54eec0ec9de786e2d
