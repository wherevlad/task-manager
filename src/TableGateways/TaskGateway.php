<?php
namespace Src\TableGateways;

use mysql_xdevapi\DatabaseObject;

class TaskGateway {

    // database connection and table name
	private $db = null;
    private $tableName = "task";

    // object properties
    public $idTask;
    public $name;
    public $email;
    public $description;
    public $status;

	public function __construct($db)
	{
		$this->db = $db;
	}

    /**
     * @return object
     */
	public function createTask() :bool
	{
		$statement = "
			INSERT INTO
			    " . $this->tableName . "
                (name, email, description, status)
            VALUES 
                (:name, :email, :description, :status);
		";

		try {
            // posted values
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->description=htmlspecialchars(strip_tags($this->description));
            $this->status=htmlspecialchars(strip_tags($this->status));

            $statement = $this->db->prepare($statement);
            // bind values
            $statement->bindParam(':name', $this->name);
            $statement->bindParam(':email', $this->email);
            $statement->bindParam(':description', $this->description);
            $statement->bindParam(':status', $this->status);

			return $statement->execute();
		} catch (\PDOException $e) {
			exit($e->getMessage());
		}
	}

    /**
     * @return null
     */
	public function updateTask($idTask)
	{
		$statement = "
		    UPDATE
                " . $this->tableName . "
            SET
                name = :name,
                email = :email,
                description = :description,
                status = :status
            WHERE
                id = :idTask;
		";

		try {
			$statement = $this->db->prepare($statement);

            // posted values
            $this->idTask=htmlspecialchars(strip_tags($idTask));
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->description=htmlspecialchars(strip_tags($this->description));
            $this->status=htmlspecialchars(strip_tags($this->status));

            // bind parameters
            $statement->bindParam(':idTask', $idTask);
            $statement->bindParam(':name', $this->name);
            $statement->bindParam(':email', $this->email);
            $statement->bindParam(':description', $this->description);
            $statement->bindParam(':status', $this->status);

            return $statement->execute();
		} catch (\PDOException $e) {
			exit($e->getMessage());
		}
	}

    public function readOneTask($idTask)
    {
        $statement = "
			SELECT
				*
			FROM
				task
			WHERE
			    id=:idTask;
		";

        try {
            $statement = $this->db->prepare($statement);
            $statement->bindParam(':id', $idTask);
            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
	}

    /**
     * @return null
     */
    public function readAllTask()
    {
        $statement = "
			SELECT
				*
			FROM
				task;
		";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}