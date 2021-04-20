<?php

namespace App\Model;

class AdvertisementManager extends AbstractManager
{
    public const TABLE_BIEN = 'test_photo';

    /**
    * Get one row from database by ID.
    *
    */
    public function selectOneById(int $id)
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT * FROM " . static::TABLE_BIEN . " WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
