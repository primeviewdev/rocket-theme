<?php
/*
* The Custom functions start here:
*
*/

require_once('db_model.php');

function load_ajax_functions(){
    //data fetching
    add_action('wp_ajax_fetch_data', 'fetch_data');
    add_action('wp_ajax_nopriv_fetch_data', 'fetch_data');

    //data insert
    add_action('wp_ajax_insert_data', 'insert_data');
    add_action('wp_ajax_nopriv_insert_data', 'insert_data');
}

function fetch_data(){
    global $wpdb;

    $db = db_connection();
    $tblEmp = "`" . $wpdb->prefix . "3_employee`";
    
    $sql = "SELECT * FROM $tblEmp ORDER BY `id` DESC";
    $result = $db->query($sql);
    $data = array();
    if($result) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
    }
    else{
        $data = array(
            "status" => "error", 
            "message" => "MYSQL Error : " . mysqli_error($db) . " " . $wpdb->prefix
        );
    }
    echo json_encode($data);
}

function insert_data(){
    global $wpdb;

    $db = db_connection();
    $tblEmp = "`" . $wpdb->prefix . "3_employee`";
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $job = $_POST['job'];

    $sql = "INSERT INTO $tblEmp 
            (`fname`, `lname`, `job_title`) 
            VALUES 
            ('$fname', '$lname', '$job');";
    $result = $db->query($sql);                      
    if($result){
        $data = array(
            "status" => "success", 
            "message" => "Added Successfully"
        );
    }
    else{
        $data = array(
            "status" => "error", 
            "message" => "MYSQL Error : " . mysqli_error($db)
        );
    }
    echo json_encode($data);
}


load_ajax_functions();

?>