<?php
ob_start();
include_once('dataAccess.php');
include_once 'service.php';
class pagination{
//this function calcule count of data from databse
// example :
// select count(*) from reservation;
    static function countOfNumberbooks(){
        $query="select count(*) from books;";
        $rows=dataAccess::desplaydata($query);
        return $rows;
    
    } 
//this function calcul *CEIL* of 11/3
// example :
// ceil(11/10) = 2 of pages
    static function indecOfPage($countNum){
    $indc=ceil($countNum/5);
     return $indc;
    }
//this function
// example :
//
    static function indicInTable($indiceOfPage){
    $indc=5*($indiceOfPage-1);
     return $indc;
    }
//this function display data usin limit query
// example :
//select count(*) from reservation limit($i,3);
static function displaybooks($i){
    $query="SELECT id_Book, name_Book, img_path, price, desc_book FROM books  order by id_Book desc  limit $i,5 ;";
    $rows=dataAccess::desplaydata($query);
    return $rows;

}
}
ob_end_flush();
?>