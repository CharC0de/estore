
<?php 

class Login extends Dbh{

   protected function getUser($uid,$email,$pwd){
    $stmt = $this->connect()->prepare("SELECT user_pwd FROM users WHERE user_uid=? OR user_email=?");
    if(!$stmt->execute(array($uid,$email))){
        $stmt=null;
        header('location: ../login.php?error=stmt_failed');
        exit();
    }
    $hashedPass=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($hashedPass)===0){
        $stmt=null;
        header('location: ../login.php?error=invalid_input');
        exit();
    }

    if(!password_verify($pwd,$hashedPass[0]['user_pwd'])){
        $stmt=null;
        header('location: ../login.php?error=invalid_input');
        exit();
    }
    else{
       $stmt = $this->connect()->prepare("SELECT * FROM users WHERE user_uid=? OR user_email=? AND user_pwd=?");
       if(!$stmt->execute(array($uid,$email,$hashedPass[0]['user_pwd']))){
        $stmt = null;
        header('location: ../login.php?error=stmt_failed');
        exit();
       }
       
       $userAccount = $stmt->fetchAll(PDO::FETCH_ASSOC);
       if(count($userAccount)===0){
        $stmt=null;
        header('location: ../login.php?error=');
        exit();
    }
       $id=$userAccount[0]['user_id'];
       $uid=$userAccount[0]['user_uid'];
       $email=$userAccount[0]['user_email'];
       $pfp=$userAccount[0]['user_pfp'];
       $session = new SessionCtrl($id,$uid,$email,$pfp);
       $session->startSession();       
    }
   }
}