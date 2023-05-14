<?php

class Dbh{
    protected function connect(){
        try{
            $host='localhost';
            $user='root';
            $password='';
            $dbname='estore';
            $dbHandler = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
            return $dbHandler;
        }catch(PDOException $e){
            print 'Error'.$e.'<br>';
            die();
        }
    }

}