<?php 
class SessionCtrl extends Session{
    private $id;
    private $uid;
    private $email;
    private $pfp;
    public function __construct($id,$uid,$email,$pfp){
        $this->id=$id;
        $this->uid=$uid;
        $this->email=$email;
        $this->pfp=$pfp;
    }
    public function startSession(){
        $this->setSession($this->id,$this->uid,$this->email,$this->pfp);
       
    }

    public function endSession(){
        session_start();
        session_unset();
        session_destroy();
    }




}