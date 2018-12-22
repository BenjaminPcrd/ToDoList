<?php
class Connexion extends PDO {
    private $stmt;

    function __construct($dsn, $login, $password) {
        parent::__construct($dsn, $login, $password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery($query, array$parameters=[]) {
        $this->stmt = parent::prepare($query);
        foreach ($parameters as $name => $value) {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }
        return $this->stmt->execute();
    }

    public function getResults() {
        return $this->stmt->fetchall();
    }
}

