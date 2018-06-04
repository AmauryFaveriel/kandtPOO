<?php

namespace Model;

use Helper\PdoConnexion;

/**
 * Class PageModel
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Model
 */
class PageModel
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = PdoConnexion::get();
    }

    /**
     * @return array|null
     * @throws \Exception
     */
    public function findAll(): ?array
    {
        $requete = "
        SELECT
            `id`,
            `slug`
        FROM 
            `content`
        ;";
        $stmt = $this->pdo->prepare($requete);
        $stmt->execute();
        PdoConnexion::errorHandler($stmt);
        $row = $stmt -> fetchAll(\PDO::FETCH_ASSOC);
        if([] === $row){
            return null;
        }
        return $row;
    }

    /**
     * @param int $id
     * @return array|null
     * @throws \Exception
     */
    public function findOne(int $id): ?array
    {
        $requete = "SELECT 
          `id`, 
          `slug`,
          `title`,
          `h1`,
          `p`,
          `spanClass`,
          `spanText`,
          `img-alt`,
          `img-src`,
          `nav-title`
        FROM 
          `content`
        WHERE
          id = :id
        ;";
        $stmt = $this->pdo->prepare($requete);
        $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();
        PdoConnexion::errorHandler($stmt);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        if([] === $data){
            return null;
        }
        return $data;
    }

    /**
     * @param array $data
     * @return int
     * @throws \Exception
     */
    public function sqlAdd(array $data): int
    {
        $requete = "
        INSERT INTO `content`(
          `slug`,
          `title`,
          `h1`,
          `p`,
          `spanClass`,
          `spanText`,
          `img-alt`,
          `img-src`,
          `nav-title`
        ) VALUES (
          :slug,
          :title,
          :h1,
          :p,
          :spanclass,
          :spantext,
          :imgalt,
          :imgsrc,
          :navtitle
        )
        ;";
        $stmt = $this->pdo->prepare($requete);
        $stmt->bindValue(":slug", htmlspecialchars($data['slug']));
        $stmt->bindValue(":title", htmlspecialchars($data['title']));
        $stmt->bindValue(":h1", htmlspecialchars($data['h1']));
        $stmt->bindValue(":p", htmlspecialchars($data['p']));
        $stmt->bindValue(":spanclass", htmlspecialchars($data['span-class']));
        $stmt->bindValue(":spantext", htmlspecialchars($data['span-text']));
        $stmt->bindValue(":imgalt", htmlspecialchars($data['img-alt']));
        $stmt->bindValue(":imgsrc", htmlspecialchars($data['img-src']));
        $stmt->bindValue(":navtitle", htmlspecialchars($data['nav-title']));
        $stmt->execute();
        PdoConnexion::errorHandler($stmt);
        return $this->pdo->lastInsertId();
    }

    /**
     * @param array $data
     * @throws \Exception
     */
    public function sqlDelete(array $data): void
    {
        $requete = "
          DELETE FROM 
          `content` 
          WHERE 
          `id` = :id
          ;";
        $stmt = $this->pdo->prepare($requete);
        $stmt->bindParam(":id", $data['id']);
        $stmt->execute();
        PdoConnexion::errorHandler($stmt);
    }

    public function sqlEdit(array $data): void
    {
        $requete = "
        UPDATE
          `content`
        SET
          `slug` = :slug,
          `title` = :title,
          `h1` = :h1,
          `p` = :p,
          `spanClass` = :spanclass,
          `spanText` = :spantext,
          `img-alt` = :imgalt,
          `img-src` = :imgsrc,
          `nav-title` = :navtitle
        WHERE
          `id` = :id
        ;";
        $stmt = $this->pdo->prepare($requete);
        $stmt->bindValue(":id", htmlspecialchars($data['id']));
        $stmt->bindValue(":slug", htmlspecialchars($data['slug']));
        $stmt->bindValue(":title", htmlspecialchars($data['title']));
        $stmt->bindValue(":h1", htmlspecialchars($data['h1']));
        $stmt->bindValue(":p", htmlspecialchars($data['p']));
        $stmt->bindValue(":spanclass", htmlspecialchars($data['span-class']));
        $stmt->bindValue(":spantext", htmlspecialchars($data['span-text']));
        $stmt->bindValue(":imgalt", htmlspecialchars($data['img-alt']));
        $stmt->bindValue(":imgsrc", htmlspecialchars($data['img-src']));
        $stmt->bindValue(":navtitle", htmlspecialchars($data['nav-title']));
        $stmt->execute();
        PdoConnexion::errorHandler($stmt);
    }
    }
