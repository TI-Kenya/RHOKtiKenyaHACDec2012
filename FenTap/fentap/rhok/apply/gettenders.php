 <?php

    // Connect Database
    mysql_connect("127.0.0.1","josemutie","jessie**2012");     
    mysql_select_db("mutie");
    
    // Get parameters from Array
    $cityid = !empty($_GET['id_category'])
              ?intval($_GET['id_category']):0;
    
    // if there is no city selected by GET, fetch all rows    
    $query = "SELECT id_category,category_name FROM tender_categories";
    
    //  else concatenate query with city id in order to filter.
    if($cityid>0) $query.=" WHERE id_tender = '$cityid'"; 
    else $query.=" LIMIT 10";
    
    //  fetch the results
    $result = mysql_query($query);
    $items = array();
    if($result && mysql_num_rows($result)>0) {
        while($row = mysql_fetch_array($result)) {
            $items[] = array( $row[0], $row[1] );
        }        
    }
    mysql_close();
    echo json_encode($items); 
?> 