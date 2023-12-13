<?php

class RegisterContr extends Register {

    private $firstName;
    private $lastName;
    private $address;
    private $phone;
    private $ssn;
    private $email;
    private $password;
    private $username;

    public function __construct($firstName, $lastName, $address, $phone, $ssn, $email, $password, $username) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->phone = $phone;
        $this->ssn = $ssn;
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
    }
    // register, checking for valid entry first
    public function registerUser(){
        if($this->emptyInput() == false) {
            // echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidUsername() == false) {
            // echo "Invalid Username!";
            header("location: ../index.php?error=username");
            exit();
        }
        if($this->invalidEmail() == false) {
            // echo "Invalid email!!";
            header("location: ../index.php?error=email");
            exit();
        }
        if($this->existingUserCheck() == false) {
            // echo "User already exists";
            header("location:  ../index.php?error=useremailtaken");
            exit();
        }

        $this->setUser($this->firstName, $this->lastName, $this->address, $this->phone, $this->ssn, $this->email, $this->password, $this->username);
    }


    // error handling 
        // if empty checks
    private function emptyInput() {
        $result;
        if(empty($this->firstName) || empty($this->lastName) || empty($this->address) || empty($this->phone) || empty($this->ssn) || empty($this->email) || empty($this->password)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
        // invalid username filter
    private function invalidUsername() {
        $result;

        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
        // invalide email filter
    private function invalidEmail() {
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function existingUserCheck() {
        $result;
        if(!$this->checkUser($this->email)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}

