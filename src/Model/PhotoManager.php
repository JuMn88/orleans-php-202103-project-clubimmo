<?php

namespace App\Model;

class PhotoManager extends AbstractManager
{
    public const TABLE = 'photo';


    public function selectByPropertyId(int $id)
    {
        // get all pics of 1 specific property
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE . " WHERE property_id =:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll();
    }
}