<?php
include_once ('dataAccess.php');
class service{
// functions add
    // function add new book 
    static public function addNewBook($name,$desc,$price,$categorie,$imagPath,$filePath){
        $query="INSERT INTO books (`name_Book`,`desc_book`,`img_path`,`file_path`,`price`,`id_cat`) VALUES ('$name','$desc','$imagPath','$filePath','$price','$categorie')";
        $row= dataAccess::update($query);
        return $row;
    }

        // function add new book 
        static public function addtoPanier($id_book,$email_Client){
            $query="INSERT INTO `panier` (`email_Client`, `id_Book`) VALUES ('$email_Client', '$id_book');";
            $row= dataAccess::update($query);
            return $row;
        }



// functions delete 
static function deleteBook($id_book){
    $query = " DELETE FROM books WHERE  id_Book = '$id_book';";
    $row= dataAccess::update($query);
    return $row;
}
static function deleteFromPanier($id_book,$email_client){
    $query = " DELETE FROM panier WHERE email_Client = '$email_client' and id_Book='$id_book'";
    $row= dataAccess::update($query);
    return $row;

}
// function update
static function updateBook($name_Book,$price,$desc_book,$id_Book){
    $query = "update books set `name_Book`='$name_Book',`price`='$price',`desc_book`='$desc_book' where `id_Book`='$id_Book'";
    $row= dataAccess::update($query);
    return $row;

}


// functions display  

// ====================
// this function select  book for update
static function getAllBooksForUpdate() {
    $query = " SELECT id_Book, name_Book, img_path, price, desc_book FROM books ;";
    $rows = dataAccess::desplaydata($query);
    return $rows;
} 
static function get_All_books(){
        # code...
        $query = " SELECT * from books";
        $rows = dataAccess::desplaydata($query);
        return $rows;

}
// function get * books by categorie  programming
static public function getbookCATprogramming(){
    # code...
    $query = " SELECT * from books WHERE id_cat='1' ORDER BY `id_Book` desc LIMIT 3";
    $rows = dataAccess::desplaydata($query);
    return $rows;
}
// function get * creditCard 
static public function creditCard($query){
    # code...
    $rows = dataAccess::desplaydata($query);
    return $rows;
}
// function get * books by categorie  Religious limit 
static public function getbookCATReligious(){
    # code...
    $query = " SELECT * from books WHERE id_cat='2' ORDER BY `id_Book` desc LIMIT 3";
    $rows = dataAccess::desplaydata($query);
    return $rows;
}
// function get * books by categorie  Cookbooks limit
static public function getbookCATCookbooks(){
    # code...
    $query = " SELECT * from books WHERE id_cat='3' ORDER BY `id_Book` desc LIMIT 3 ";
    $rows = dataAccess::desplaydata($query);
    return $rows;
}
static public function getAllBooks($limit){
    # code...
    $query = " SELECT * from books WHERE `name_Book` LIKE '$limit%' ";
    $rows = dataAccess::desplaydata($query);
    return $rows;
}
//
static public function getBooks($idbook){
    # code...
    $query = " SELECT * from books WHERE `id_Book`='$idbook' ";
    $rows = dataAccess::desplaydata($query);
    return $rows;
}
// function get * books by categorie  Cookbooks
static public function bookByCategorie($id_cat){
    # code...
    $query = " SELECT DISTINCT b.*, c.name_cat from books b , categorie c WHERE b.id_cat = c.id_cat and b.id_cat = '$id_cat' ORDER BY `id_Book` desc ";
    $rows = dataAccess::desplaydata($query);
    return $rows;
}
// function get * books by categorie  Cookbooks
static public function bookByprice($id_cat){
    # code...
    $query = " SELECT * from books WHERE price <='$id_cat' ";
    $rows = dataAccess::desplaydata($query);
    return $rows;
}


// function ad new client 
static function addClient($Name_Client,$lastName_Client,$email_Client,$password_Client){
    //INSERT INTO `clients` ( `Name_Client`, `lastName_Client`, `email_Client`, `password_Client`) VALUES ('$Name_Client', '$lastName_Client', '$email_Client', '$password_Client');
    $query="INSERT INTO `clients` ( `Name_Client`, `lastName_Client`, `email_Client`, `password_Client`) VALUES ('$Name_Client', '$lastName_Client', '$email_Client', '$password_Client');";
    $result=dataAccess::update( $query);
    return $result;
}

//functien select * books where id in table panier
//SELECT * FROM books WHERE id_Book IN (SELECT id_Book FROM panier WHERE email_Client = 'yahya@123'  )
static function AllBookFromPanierByEmailClient($email_client){
    $query = "SELECT `id_Book`,`img_path`,`name_Book`,`price` FROM books WHERE id_Book IN (SELECT id_Book FROM panier WHERE email_Client = '$email_client')";
    $rows = dataAccess::desplaydata($query);
    return $rows;
    
}

//SELECT SUM(`price`) as total FROM books WHERE id_Book IN (SELECT id_Book FROM panier WHERE email_Client = 'yahya@123')
static function getTotalBookFromPanierByEmailClient($email_client){
    $query = "SELECT SUM(`price`) as total FROM books WHERE id_Book IN (SELECT id_Book FROM panier WHERE email_Client = '$email_client')";
    $rows = dataAccess::desplaydata($query);
    return $rows;

}
// test log in client is existe
static function loginClients($email,$password){
    $rows = dataAccess::ClientLogin($email,$password);
    return $rows;  
}

// test log in admin is existe
static function loginAdmins($email,$password){
    $rows = dataAccess::responsableLogin($email,$password);
    return $rows;  
}

}
?>