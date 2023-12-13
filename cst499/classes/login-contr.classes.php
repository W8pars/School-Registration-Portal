<?php

class LoginContr extends Login {

    private $uid;
    private $password;

    public function __construct($uid, $password) {
        $this->uid = $uid;
        $this->password = $password;
    }
    
    // register, checking for valid entry first
    public function loginUser(){
        if($this->emptyInput() == false) {
            // echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        $this->getUser($this->uid, $this->password);
    }

    // error handling 
        // if empty checks
    private function emptyInput() {
        $result;
        if(empty($this->uid) || empty($this->password)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}

