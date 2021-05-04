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
        $query =  'SELECT DISTINCT pr.id AS id FROM ' . static::TABLE . ' ph ';
        $query .= 'INNER JOIN property pr ON ph.property_id = pr.id ';
        $query .= 'ORDER BY pr.id DESC LIMIT 3;';
        return $this->pdo->query($query)->fetchAll();
    }
}
