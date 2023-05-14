<?php
if(isset($_POST['submit'])){
    $uid =$_POST['uid'];
    $email =$_POST['email'];
    $pwd = $_POST['pwd'];
    $confPwd=$_POST['confPwd'];

    include '../classes/dbh.class.php';
    include '../classes/register.class.php';
    include '../classes/register-ctrl.class.php';

    $register = new RegisterCtrl($uid,$email,$pwd,$confPwd);

    $register->registerUser();
    header('location:../register.php?error=none');
}
else{
    header('location: ../index.php');
}
?>