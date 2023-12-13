<?php


class Register extends Dbmgr {

    protected function setUser ($firstName, $lastName, $address, $phone, $ssn, $email, $password, $username) {
        $statement = $this->connect()->prepare("INSERT INTO tbluser (firstName, lastName, address, phone, ssn, email, password, username) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");

        // protect the user password so remember to check against it properly in login functionality
        $hashedpass = password_hash($password, PASSWORD_DEFAULT);


        if(!$statement->execute(array($firstName, $lastName, $address, $phone, $ssn, $email, $hashedpass, $username))) {
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }
        // end connection
        $statement = null;
    }

    protected function checkUser($email) {
        //prepared statement
        //$con = $this->connect();
        
        $statement = $this->connect()->prepare("SELECT email FROM tbluser WHERE email = ?");
        if(!$statement->execute(array($email))) {
            // delete query statement
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }
        $user_check = $statement->fetchAll(PDO::FETCH_ASSOC);

        $resultCheck;
        // check to make sure a result is grabbed
        if(count($user_check) > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}