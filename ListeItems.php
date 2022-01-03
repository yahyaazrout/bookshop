 <?php
    include 'Traitements.php';
    // get all Items from Items table
    $Items = Traitements::GetAllItems();

    $n = $Items->rowCount();
    // check for empty result
    if ($n > 0) {
        // looping through all results
        $response["items"] = array();

        while ($row = $Items->fetch()) {
            // temp user array
            $Item = array();
            $Item["name_Book"] = $row[1];
            $Item["desc_book"] = $row[2];
            $Item["img_path"] = $row[3];
            $Item["price"] = $row[5];


            // push single row into final response array
            array_push($response["items"], $Item);
        }
        // success
        $response["success"] = 1;

        // echoing JSON response
         print json_encode($response);
            // print_r($response);
    } else {
        // no schools found
        $response["success"] = 0;
        $response["message"] = "No data found";

        // echo no users JSON
        // echo json_encode($response);
            print_r($response);
    }






    ?>
  
