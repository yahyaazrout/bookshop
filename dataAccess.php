<?php 

class dataAccess{
   // this function open Connection with database 
    static function Connection(){

        try {
            //code...
    // $path = "mysql:host=localhost;dbname=bookshop";
    // $user = "root";
    // $passwd = "";
    $path = "mysql:host=sql311.epizy.com;dbname=epiz_28883698_bookshop";
    $user = "epiz_28883698";
    $passwd = "dchyPwrJfqo";
    $con = new PDO($path, $user, $passwd);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $con;
    
        } catch (EXCEPTION $e) {
            print("error : ".$e->getMessage());
        }
   
            
}
    
    // this function updates database data ;
    static function update($query){

        try {
            //code...
            $con = self::Connection();
            $update= $con->exec($query);
            return $update;
        } catch (EXCEPTION $e) {
            print("error : ".$e->getMessage());
        }
        $con = null;

}


    // this function display data from database
    static function desplaydata($query){
        try {
            //code...
            $con = self::Connection();
            $select= $con->query($query);
            return $select;
        } catch (EXCEPTION $e) {
            print("error : ".$e->getMessage());
        }
        $con = null;

        
        
    }


    // this function test client  is exist or not
    static function ClientLogin($login,$password){

        try {
            $query = "select * from clients where email_Client = '$login' and password_Client ='$password';";
            $desplaydata= self::desplaydata($query);
            $row =$desplaydata->rowCount(); 
            return $row;
        } catch (EXCEPTION $e) {
            print("error : ".$e->getMessage());
        }
        
  
    }

      // this function test responsable is exist or not
      static function responsableLogin($login,$password){


        try {
            $query = "select login,pass from  responsable where login='$login' and pass='$password'";
            $desplaydata= self::desplaydata($query);
            $row =$desplaydata->rowCount(); 
            return  $row;
        } catch (EXCEPTION $e) {
            print("error : ".$e->getMessage());
        }
           
    }

   
}