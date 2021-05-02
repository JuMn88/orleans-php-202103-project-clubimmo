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

    public function selectLastProperties(): array
    {
        $query =  'SELECT DISTINCT PR.ID AS ID FROM ' . static::TABLE . ' PH  ';
        $query .= 'INNER JOIN property PR ON PH.PROPERTY_ID = PR.ID  ';
        $query .= 'ORDER BY PR.ID DESC LIMIT 3;';
        return $this->pdo->query($query)->fetchAll();
    }
}
