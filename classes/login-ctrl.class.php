<?php 
class LoginCtrl extends Login {

    private $uid;
    private $pwd;

    public function __construct($uid,$pwd){
        
        $this->uid=$uid;
        $this->pwd=$pwd;
        echo $uid;
    }

    public function loginUser(){ 
        if($this->emptyInput()){
            header('location: ../login.php?error=empty_input');
            exit();
    }
    $this->getUser($this->uid,$this->uid,$this->pwd);
   
}
       

    public function emptyInput(){
        $result = false;

        if(empty($this->uid)||empty($this->pwd)){
            $result = true;
        }
        return $result;
    }
}