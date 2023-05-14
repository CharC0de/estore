
<?php 

class Register extends Dbh{

    public function userExists($uid,$email){
        $stmt=$this->connect()->prepare("SELECT * FROM users WHERE user_uid=? OR user_email=?");
        $result = false;
        if(!$stmt->execute(array($uid,$email))){
            $stmt=null;
            header('location: ../register.php?error=stmt_failed');
            exit();
        }
        $userCnt=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($userCnt)>0){
            $result=true; 
        }
        return $result;
    }

    public function setUser($uid,$email,$pwd,$pfp){
        $stmt = $this->connect()->prepare("INSERT INTO users (`user_id`,user_uid,user_email,user_pwd,user_pfp) VALUES(NULL,?,?,?,?)");
        $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
        if(!$stmt->execute(array($uid,$email,$hashedPwd,$pfp))){
            $stmt = null;
            header('location: ../register.php?error=stmt_failed');
            exit();
        }
        $stmt=null;
    }
}