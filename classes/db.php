<?php 


class Database {

    static function connection($db){

        try{

            return new PDO('mysql:host='.$db['hname'].';dbname='.$db['dbname'],$db['uname'],$db['pword'],$db['options']);

        }catch(PDOException $e){

            die($e);


        }

    }

}