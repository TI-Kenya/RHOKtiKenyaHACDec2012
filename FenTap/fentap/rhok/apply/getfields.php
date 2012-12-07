 <?php

    // Connect Database
    mysql_connect("127.0.0.1","josemutie","jessie**2012");     
    mysql_select_db("mutie");
    
    // Execute Query in the right order 
    //(value,text)
    $query = "SELECT 
                   id_tender,
                  tender_name 
              FROM 
                  tenders_types";
    $result = mysql_query($query);
    $items = array();
    if($result && 
       mysql_num_rows($result)>0) {
        while($row = mysql_fetch_array($result)) {
            $items[] = array( $row[0], $row[1] );
        }        
    }
    mysql_close();
    // convert into JSON format and print
    echo json_encode($items); 
?> 

