<?php
 include 'Dataaccess.php';


class Traitements {


public static function GetAllItems(){
   
    
    $req="SELECT * FROM books";
    
    $cur= Dataaccess::sel($req);
    
    return $cur;
    
    
}
  
}