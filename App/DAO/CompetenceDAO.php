<?php

namespace App\DAO;
use Exception;
use App\Model\CompetenceModel;

class CompetenceDAO extends DAO
{
    // Constructor to initialize the CompetenceDAO object
    public function __construct()
    {
        // Call the parent class constructor (DAO) to initialize the database connection
        parent::__construct();
    }

    // Method to select all records from the "Etudiant" table
    public function selectAll()
    {
        // Definition of the SQL query to select all records from the "Competence" table
        $sql = "SELECT * FROM Competence";

        // Prepare SQL query using database connection
        $stmt = $this->conn->prepare($sql);

        // Execute the prepared query
        $stmt->execute();

        // Returns all query results as class objects (based on DAO class)
        return $stmt->fetchAll(DAO::FETCH_CLASS);
    }
	public function select(int $id)
	{
		// Definition of the SQL query to select all records from the "Competence" table
		$sql = "SELECT * FROM Competence WHERE id_comp = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll(DAO::FETCH_CLASS);
	}

    // Method to insert a new record into the "Competence" table
    public function insert(int $id_semestre, String $label)
    {
        try {
            // Definition of the SQL query to insert a new record into the "Competence" table
            $sql = "INSERT INTO Competence (id_semestre, label) VALUES (:id_semestre, :label)";
            
            // Prepare SQL query using database connection
            $stmt = $this->conn->prepare($sql);
            
            // Bind parameters
            $stmt->bindValue(':id_semestre', $id_semestre);
            $stmt->bindValue(':label', $label);

            // Execute the prepared query
            $stmt->execute();
            return "Competence added successfully!";
        } catch (Exception $e) {
            // Throws an exception in case of error during execution
            throw $e;
        }
    }

    public function delete(int $id)
	{
		// Definition of the SQL query to select all records from the "Competence" table
		$sql = "DELETE FROM Competence WHERE id_comp = :id";

		// Prepare SQL query using database connection
		$stmt = $this->conn->prepare($sql);

		// Bind the parameter :id to the value $id
		$stmt->bindValue(':id', $id);

		// Execute the prepared query
		$stmt->execute();

		// Returns all query results as class objects (based on DAO class)
		return $stmt->fetchAll("Competence removed successfully!");
	}
}