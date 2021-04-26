<?php

namespace App\Model;

class ClientManager extends AbstractManager
{
    public const TABLE = 'client';

    public function insert(array $client): void
    {
        $queryPart1 = "(`firstname`, `lastname`, `phone`, `email`, `address`,";
        $queryPart2 = "`propertyType`, `topic`, `city`, `postalcode`, `message`)";
        $queryPart3 = " VALUES (:firstname, :lastname, :phone, :email, :address, ";
        $queryPart4 = ":propertyType, :topic, :city, :postalcode,:message)";
        $query = "INSERT INTO " . self::TABLE . $queryPart1 . $queryPart2 . $queryPart3 . $queryPart4;
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('firstname', $client['firstname'], \PDO::PARAM_STR);
        $statement->bindValue('lastname', $client['lastname'], \PDO::PARAM_STR);
        $statement->bindValue('phone', $client['phone'], \PDO::PARAM_STR);
        $statement->bindValue('email', $client['email'], \PDO::PARAM_STR);
        $statement->bindValue('address', $client['address'], \PDO::PARAM_STR);
        $statement->bindValue('propertyType', $client['propertyType'], \PDO::PARAM_STR);
        $statement->bindValue('city', $client['city'], \PDO::PARAM_STR);
        $statement->bindValue('topic', $client['topic'], \PDO::PARAM_STR);
        $statement->bindValue('postalcode', $client['postalcode'], \PDO::PARAM_STR);
        $statement->bindValue('message', $client['message'], \PDO::PARAM_STR);
        $statement->execute();
    }
}
