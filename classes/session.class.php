<?php
class Session extends Dbh{

    protected function setSession($id,$uid,$email,$pfp){
        session_start();
        $_SESSION['id']=$id;
        $_SESSION['uid']=$uid;
        $_SESSION['email']=$email;
        $_SESSION['pfp']=$pfp;

        $stmt = $this->connect()->prepare('SELECT * FROM sellers WHERE `user_id`=?');
        if(!$stmt->execute(array($id,))){
            $stmt = null;
            header('location: ../index.php?error=stmt_failed');
            exit();
        }
        $sellerAccount = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($sellerAccount)>0){
            $_SESSION['sellerId'] = $sellerAccount[0]['seller_id'];
            $_SESSION['sellerEarnings'] = $sellerAccount[0]['seller_earnings'];
            $stmt=null;
        }
        $stmt = $this->connect()->prepare('SELECT * FROM cardholders WHERE `user_id`=?');
        if(!$stmt->execute(array($id,))){
            $stmt=null;
            header("location: ../index.php?error=stmt_failed");
            exit();
        }
        $cardAccount = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($cardAccount)>0){
            $_SESSION['cardId'] = $cardAccount[0]['card_id'];
            $_SESSION['cardBalance'] = $cardAccount[0]['card_balance'];
            $_SESSION['cardState'] = $cardAccount[0]['card_state'];
        }
        $stmt=null;
        header('location: ../index.php');
        
       
    } 
}