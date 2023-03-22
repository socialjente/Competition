<?php

namespace Core;

use PDO;

class Database
{
    public $connection;
    public $statement;

    public function findValue()
    {
        $value = $this->statement->fetch();

        return implode("", $value);
    }

    // Loads specific data_type for logged in User
    public function loadData($data_type)
    {
        $query = "select $data_type from chairs where binary user_name = :current_user";

        $params = ['current_user' => $_SESSION['username']];

        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        $value = $this->statement->fetch();

        return implode("", $value);
    }




    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($params);

        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) {
            abort();
        }

        return $result;
    }
}
