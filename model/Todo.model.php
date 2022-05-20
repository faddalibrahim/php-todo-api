<?php

require_once(__DIR__."/../config/database.config.php");

/**
 * The Todo Model
 * 
 * @author Faddal Ibrahim
 * 
 */
class Todo extends Database {
    private $table = "todo";

    function todoTest(){
        if(!$this->connect()) return $this->connection_error;
        return array('todo'=>'welcome to the todo api');
    }

    private function checkDbConnection(){
        if(!$this->connect()) exit(json_encode($this->connection_error));
    }

    public function getAllTodos(){

        $this->checkDbConnection();

        $sql = "SELECT * from $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function getTodo($id){
        $this->checkDbConnection();

        $sql = "SELECT * from $this->table WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function createTodo($task){

        $this->checkDbConnection();

        $sql = "INSERT INTO $this->table (task) VALUES(:task)";
		$stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':task', $task);

        if($stmt->execute()) 
            return json_encode(array('ok' => true, 'message' => 'todo was successfully added'));
        else
            return json_encode(array('ok' => false, 'message' => 'failed to add todo'));
    }

    public function deleteTodo($id){
        $this->checkDbConnection();

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
  
    /**
     * this model performs update queries on the database
     * 
     * @param string {id} the id of the todo item to be updated
     * @param string { task } the new task to replace the current one
     * @param string { status } the new status of the todo
     * 
     * @return success or failed message
     */
    public function updateTodo($id, $task, $status){

        $this->checkDbConnection();
      
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