<?php

require_once(__DIR__."/../config/database.config.php");

/**
 * 
 * Comments
 * 
 */
class Todo extends Database {
    private $table = "todo";

    function todoTest(){
        if(!$this->connect()) return $this->connection_error;
        return array('todo'=>'welcome to the todo api');
    }

    public function getAllTodos(){
        if(!$this->connect()) return;

        $sql = "SELECT * from $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function getTodo($id){
        if(!$this->connect()) return;

        $sql = "SELECT * from $this->table WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function createTodo($task){

        if(!$this->connect()) return;

        $sql = "INSERT INTO $this->table (task) VALUES(:task)";
		$stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':task', $task);

        if($stmt->execute()) 
            return json_encode(array('ok' => true, 'message' => 'todo was successfully added'));
        else
            return json_encode(array('ok' => false, 'message' => 'failed to add todo'));
    }

    public function deleteTodo($id){
        if(!$this->connect()) return;

        // sql to delete a record
        $sql = "DELETE FROM $this->table WHERE id=:id";
        $stmt = $this->conn->prepare($sql);

        //bind data
        $stmt->bindParam(':id', $id);

        if($stmt->execute())
            return json_encode(array('ok' => true, 'message' => 'todo was successfully deleted'));
        else{
            return json_encode(array('ok' => false, 'message' => 'failed to delete todo'));
        }
    }
  

    public function updateTodo($id, $task, $status){

        if(!$this->connect()) return;
      
        $sql = "UPDATE $this->table SET task=:task, status=:status WHERE id=$id";
		$stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':task', $task);
        $stmt->bindParam(':status', $status);

        if($stmt->execute())
            return json_encode(array('ok' => true, 'message' => 'todo was successfully updated'));
        else
            return json_encode(array('ok' => false, 'message' => 'failed to update todo'));
    }

}







?>