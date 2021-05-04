<?php

namespace App\Model;

class PhotoManager extends AbstractManager
{
    public const TABLE = 'photo';

    public function selectByPropertyId(int $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE property_id =:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }
}
