<?php


namespace Src\TableGateways;


class AdminGateway
{
    // database connection and table name
    private $db = null;
    private $tableName = "admin";

    // object properties
    public $login;
    public $password;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function checkAuth()
    {
        $statement = "
			SELECT * FROM
			    " . $this->tableName . "
            WHERE 
                login=:login and password=:password;
		";
        try {
            $this->login=htmlspecialchars(strip_tags($this->login));
            $this->password=htmlspecialchars(strip_tags($this->password));

            $statement = $this->db->prepare($statement);
            // bind values
            $statement->bindParam(':login', $this->login);
            $statement->bindParam(':password', $this->password);

            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_ASSOC) !== Array();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}