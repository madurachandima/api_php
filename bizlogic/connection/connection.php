<?php
class Connection{
   public static function getConnection()
    {
        $dbhost = "localhost:3306";
        $dbuser = "root";
        $dbpass = "roots";
        $db = "covid_ts";
        
        $con = mysqli_connect($dbhost, $dbuser, $dbpass, $db) or die($con);
        print($con->error);
        return $con;
    }
}

