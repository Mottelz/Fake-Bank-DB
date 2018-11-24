<?php
//This class is used so that all of the files in the models directory can access the database without the need to rewrite the same basic functions repeatedly.
class Model {
    public $connection;
    public $db_host = "udc353.encs.concordia.ca";
    public $db_user = "t_odrigu";
    public $db_pword = "";
    public $db_name = "udc353_2";

     //connect to the server
     private function connectDB() {
         $this->connection = new mysqli($this->db_host, $this->db_user, $this->db_pword, $this->db_host);
         if ($this->connection->connect_errno) {
             printf("Connect failed: %s\n", $this->connection->connect_error);
             return false;
         } else {
             return true;
         }
     }

     //disconnect from the server
     private function disconnectDB() {
         mysqli_close($this->connection);
     }

     //get the data
     public function getData($query) {
         $results = array();
         $this->connectDB();
         if($result = $this->connection->query($query)) {
             while ($row = $result->fetch_object()) {
                 $results[] = $row;
             }
             $result->close();
             $this->disconnectDB();
             return $results;
         };
     }

     //update the data
     public function updateData($query) {
         $this->connectDB();
         if($this->connection->query($query)===true) {
             $this->disconnectDB();
             return true;
         } else {
             $this->disconnectDB();
             return false;
         }
     }
}
?>