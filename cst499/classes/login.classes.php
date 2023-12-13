<?php


class Login extends Dbmgr {

    protected function getUser ($uid, $password) {
        
        $statement = $this->connect()->prepare("SELECT password FROM tbluser WHERE email = ? OR username = ?;");
        //try to execute statement
        if(!$statement->execute(array($uid, $password))) {
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }
        // check for no result
        $hashedpwdresult = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(count($hashedpwdresult) == 0) {
            $statement = null;
            header("location: ../index.php?error=usernotfound1");
            exit();
        }
        // if there are results, grab first instance and select password field, pass into verify function 
        $checkedpw = password_verify($password, $hashedpwdresult[0]["password"]);

        // if true/false
        if($checkedpw == false) {
            $statement = null;
            header("location: ../index.php?error=passwordincorrect");
            exit();
        }
        elseif($checkedpw == true) {
            //start login and allow for either username or email login
            $statement = $this->connect()->prepare("SELECT * FROM tbluser WHERE email = ? OR username = ? AND password = ?;");

            if(!$statement->execute(array($uid, $uid, $password))){
                $statement = null;
                header("location: ../index.php?error=statementfailed");
                exit();
            }

            $user = $statement->fetchAll(PDO::FETCH_ASSOC);

            if(count($user) == 0) {
                $statement = null;
                header("location: ../index.php?error=usernotfound2");
                exit();
            }

            session_start();
            // set session params to be used to verify if user is logged in 
            $_SESSION["userid"] = $user[0]["user_id"];
            $_SESSION["email"] = $user[0]["email"];
            // end connection
            $statement = null;
        }       
    }

    protected function checkUser($uid, $email) {
        //prepared statement
        //$con = $this->connect();
        
        $statement = $this->con->prepare("SELECT email FROM tbluser WHERE username = ? OR email = ?");
        if(!$statement->execute(array($uid, $email))) {
            // delete query statement
            $statement = null;
            header("location: ../index.php?error=statementfailed");
            exit();
        }

        $user = $statement->fetchAll(PDO::FETCH_ASSOC);

        $resultCheck;
        // check to make sure a result is grabbed
        if(count($user) > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}