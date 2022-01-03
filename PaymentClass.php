<?php
include_once 'dataAccess.php';
class Payments
{

static public function testCard($creditCard,$month,$year,$cvv){
    if (!empty($creditCard)&&!empty($creditCard)&&!empty($month)&&!empty($year)&&!empty($cvv)) {
        # code...
        $query="select * from card where creditCard='$creditCard' and year='$year' and Month='$month' and cvv='$cvv'";
       $rows= Service::creditCard($query);
       return $rows->rowCount();
    }
    

}
static public function test($creditCard,$month,$year,$cvv){
    if (!(preg_match('/[0-9]{14}/',$creditCard) && preg_match('/[0-9]{2}/',$month)&&preg_match('/[0-9]{4}/',$year)&&preg_match('/[0-9]{3}/',$cvv))) {
        return 0;  
    }else {
        # code...
        return 1;
       
    }
}

    
}