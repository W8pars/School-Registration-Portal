<?php

class Dbmgr {

    private $host = '';
    private $user = '';
    private $password = '';
    private $database = '';
    public $con = null;

    //protected not private so other classes can extend and use
    public function connect(){

        $this->host = DBHOST;
        $this->user = DBUSER;
        $this->password = DBPASS;
        $this->database = DBNAME;
        $this->con = null;

        try {
            $this->con = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
            $this->con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Database connection error: ' . $e->getMessage());
        }
        return $this->con;
    }

    public function executeQuery($sql, $params = array()) {
        try {
            if ($this->con === null) {
                // You might want to handle the case where the connection is null
                $this->con = $this->connect();
            }
    
            $stmt = $this->con->prepare($sql);
            // Determine query type, checking if return value needed
            // Write operations
            $queryCheck = preg_match('/^\s*(?:INSERT|UPDATE|DELETE)\s+/i', $sql);
            if ($queryCheck) {
                $stmt->execute($params);
                // Return information that rows affected
                $rowsAffected = $stmt->rowCount();
                return array('rowCount' => $rowsAffected);
            } else {
                // Read operations
                $stmt->execute($params);
                $result = array('data' => $stmt->fetchAll(PDO::FETCH_ASSOC));
                return $result;
            }
        } catch (PDOException $e) {
            error_log("PDO Error: " . $e->getMessage());
            throw $e;
        }
    }

    public function executeAndDisplayQuery ($sql, $params = array()){

        $stmt = $this->con->prepare($sql);
        $stmt->execute($params);

        //loop through results, setting column names dynamically
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            foreach($row as $columnName => $value) {
                echo "$columnName: $value <br>";
            }
            echo "<hr>";
        }

        //check for empty results
        if ($stmt->rowCount() == 0) {
            echo "No results";
        }
        //end database connection
        $this->con = null;
    }
}
?>
