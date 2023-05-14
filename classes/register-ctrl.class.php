
<?php

class RegisterCtrl extends Register{
    private $uid;
    private $pwd;
    private $confPwd;
    private $email;

    private $pfp="default.png";

    public function __construct($uid,$email,$pwd,$confPwd){
        $this->uid=$uid;
        $this->email=$email; 
        $this->pwd=$pwd;
        $this->confPwd=$confPwd;
        
    }

    public function registerUser(){
        if($this->emptyInput()){
            header('location: ../register.php?error=empty_input');
        }
        if($this->invalidUid()){
            header('location: ../register.php?error=invalid_uid');
        }
        if($this->invalidEmail()){
            header('location: ../register.php?error=invalid_email');
        }
        if($this->passDontMatch()){
            header('location: ../register.php?error=pwd_not_match');
        }
        if($this->userExists($this->uid,$this->email)){
            header('location: ../register.php?error=uid_email_taken');
        }
        $this->setUser($this->uid,$this->email,$this->pwd,$this->pfp);
    }
    public function emptyInput(){
        $result=false;

        if(empty($this->uid)||empty($this->pwd)||empty($this->confPwd)||empty($this->email)){
            $result=true;
        }
        return $result;
    }

    public function invalidUid(){
        $result=false;

        if(!preg_match("/^[a-zA-Z0-9]*$/",$this->uid)){
            $result=true;
        }

        return $result;
    
    }

    public function invalidEmail(){
        $result=false;

        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $result=true;
        }

        return $result;
    
    }

    public function passDontMatch(){
        $result=false;

        if($this->pwd !== $this->confPwd){
            $result=true;
        }

        return $result;
    
    }
}