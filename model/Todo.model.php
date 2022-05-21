<?php

require_once(__DIR__."/../config/database.config.php");

/**
 * Model for making queries to the database
 * 
 * @author Faddal Ibrahim
 * 
 */

class Todo extends Database {
    private $table = "todo";

    /**
     * makes connection to database
     * 
     * if connection is unsuccessful, cuts off and returns the connection error
     * it is called in every method that queries the database
     * 
     */

    private function connectToDb() : void {
        if(!$this->connect()) exit(json_encode($this->connection_error));
    }

     /**
     * helper method to for making SELECT queries
     * 
     * @param string { sql } the id of the todo item to be deleted
     * 
     * @return pdo statement object
     */

    private function makeSelectQuery($sql) : object {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

     /**
     * fetches all todos
     * 
     * @return query statement
     */

    public function getAllTodos() : object {
        $this->connectToDb();
        return $this->makeSelectQuery("SELECT * from $this->table");
    }

     /**
     * fetches todo with the corresponding id
     * 
     * @param int { id } the id of the todo item to be deleted
     * 
     * @return success or failed message
     */

    public function getTodo(int $id) : object {
        $this->connectToDb();
        return $this->makeSelectQuery("SELECT * from $this->table WHERE id=$id");
    }

     /**
     * searches database for search term
     * 
     * @param string { searchTerm } the id of the todo item to be deleted
     * 
     * @return success or failed message
     */

    public function searchTodos(string $searchTerm) : object {
        $this->connectToDb();

        $sql = "SELECT * from $this->table 
                WHERE task LIKE '%$searchTerm%' 
                OR status LIKE '%$searchTerm%' 
                OR created_at LIKE '%$searchTerm%'";

       return $this->makeSelectQuery($sql);
    }

     /**
     * creates a new todo
     * 
     * @param string { task } the id of the todo item to be deleted
     * 
     * @return success or failed message
     */

    public function createTodo(string $task) : array {

        $this->connectToDb();

        $sql = "INSERT INTO $this->table (task) VALUES(:task)";
		$stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':task', $task);

        if($stmt->execute()) 
            return array('ok' => true, 'message' => 'todo was successfully added');
        else
            return array('ok' => false, 'message' => 'failed to add todo');
    }

     /**
     * this model performs delete queries on the database
     * 
     * @param int {id} the id of the todo item to be deleted
     * 
     * @return success or failed message
     */

    public function deleteTodo(int $id) : array {
        $this->connectToDb();

        // sql to delete a record
        $sql = "DELETE FROM $this->table WHERE id=:id";
        $stmt = $this->conn->prepare($sql);

        //bind data
        $stmt->bindParam(':id', $id);

        if($stmt->execute())
            return array('ok' => true, 'message' => 'todo was successfully deleted');
        else{
            return array('ok' => false, 'message' => 'failed to delete todo');
        }
    }
  
    /**
     * this model performs update queries on the database
     * 
     * @param int {id} the id of the todo item to be updated
     * @param string { task } the new task to replace the current one
     * @param string { status } the new status of the todo
     * 
     * @return success or failed message
     */

    public function updateTodo(int $id, string $task, string $status) : array {

        $this->connectToDb();
      
        $sql = "UPDATE $this->table SET task=:task, status=:status WHERE id=$id";
		$stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':task', $task);
        $stmt->bindParam(':status', $status);

        if($stmt->execute())
            return array('ok' => true, 'message' => 'todo was successfully updated');
        else
            return array('ok' => false, 'message' => 'failed to update todo');
    }

}







?>