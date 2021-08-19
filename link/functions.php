<?php 
//  Set Message Function starts Here 
function set_message($message) {
    if(!empty($message)){ 
    $_SESSION['message']= $message;  
    }else {  
    $message = "";
    }
}
// Display Function Starts Here
function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

//  Set Message Function starts Here 
function set_message_MODAL($message) {
    if(!empty($message)){ 
    $_SESSION['message']= $message;  
    }else {  
    $message = "";
    }
}
// Display Function Starts Here
function display_message_MODAL(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}
// Redirect Function section starts Here 
function redirect($location){
    return header("Location: {$location}");
}
//  Functions that logged in or not 
function checkLoggedInOrNot() {
    if(strlen($_SESSION['alogin'])=="")  
    {     
    echo "<script type='text/javascript'> document.location = '../login'; </script>";  
    }   
}

// Author is Available or not
function is_author_available($authoremail) {
    global $dbh;
    $query = "SELECT COUNT(*) as total_rows FROM user where email='$authoremail'";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $reviewered = $row['total_rows'];
    return $reviewered;
}

// Function Remaining By ID DESC

 function remainingBYID_DESC($TABLE_NAME,$FIELD_NAME,$id){
     global $dbh;
     $stmt = $dbh->prepare("SELECT ".$FIELD_NAME." FROM ".$TABLE_NAME." WHERE ".$id."=? ORDER BY id DESC");
     $stmt->execute([$id]); 
     $rcourse = $stmt->fetch();
     return $rcourse["$FIELD_NAME"];
 }
 
// Function returns number (total number of rows where comparison)
function returnSingleValue($TABLE_NAME,$SELECTED_FIELD,$COMPARE_FIELD,$id){
    global $dbh;
    $stmt = $dbh->prepare("SELECT * FROM ".$TABLE_NAME." WHERE ".$COMPARE_FIELD."=?");
    $stmt->execute([$id]); 
    $rcourse = $stmt->fetch();
    return $rcourse["$SELECTED_FIELD"];
}

// Function returns number (total number of rows where comparison)
function returnSingleValueTWO_COMPARISON($TABLE_NAME,$SELECTED_FIELD,$COMPARE_FIELD1,$id1,$COMPARE_FIELD2,$id2){
    global $dbh;
    $stmt = $dbh->prepare("SELECT * FROM ".$TABLE_NAME." WHERE ".$COMPARE_FIELD1."=? AND ".$COMPARE_FIELD2."=?");
    $stmt->execute([$id1,$id2]); 
    $rcourse = $stmt->fetch();
    return $rcourse["$SELECTED_FIELD"];
}


// Function all users is equal to the userid 

function all_by_userID($table_name,$user_id){
global $dbh;
return $dbh->query("SELECT * FROM ".$table_name." WHERE user_id='$user_id'")->fetchAll();
}

// Function return all inside the table 
function all($table_name){
    global $dbh;
    return $dbh->query("SELECT * FROM ".$table_name."")->fetchAll();
}

// Function all Randomly data limited
function all_RANDOM_LIMIT($table_name,$LIMIT){
    global $dbh;
    return $dbh->query("SELECT * FROM ".$table_name." ORDER BY RAND() LIMIT $LIMIT")->fetchAll();
}

// Function all Randomly data of id
function all_RANDOM_ID($table_name,$COMPARE_FIELD,$id){
    global $dbh;
    return $dbh->query("SELECT * FROM ".$table_name." WHERE $COMPARE_FIELD='$id' ORDER BY RAND()")->fetchAll();
}


// Function return all inside the table LIMIT 
function allLIMIT($table_name,$start_from, $per_page_record){
    global $dbh;
    return $dbh->query("SELECT * FROM ".$table_name." LIMIT $start_from, $per_page_record")->fetchAll();
}

// Function return all inside the table LIMITWHERE 
function allLIMIT_WHERE($table_name,$start_from, $per_page_record,$COMPARE_FIELD,$id){
    global $dbh;
    return $dbh->query("SELECT * FROM ".$table_name." LIMIT $start_from, $per_page_record WHERE $COMPARE_FIELD='$id'")->fetchAll();
}

// Functions returns all value comparing some field 
function all_by_SPECIFIC_ID($TABLE_NAME,$COMPARE_FIELD,$ID){
    global $dbh;
    return $dbh->query("SELECT * FROM ".$TABLE_NAME." WHERE ".$COMPARE_FIELD."='$ID'")->fetchAll();
}
// Functions returns all value comparing some field 
function all_by_SPECIFIC_ID_TWO($TABLE_NAME,$COMPARE_FIELD1,$ID1,$COMPARE_FIELD2,$ID2){
    global $dbh;
    return $dbh->query("SELECT * FROM ".$TABLE_NAME." WHERE $COMPARE_FIELD1='$ID1' AND $COMPARE_FIELD2='$ID2'")->fetchAll();
}

// Functions returns all value comparing some field 
function all_by_SPECIFIC_ID_TWO_NOT($TABLE_NAME,$COMPARE_FIELD1,$ID1,$COMPARE_FIELD2,$ID2){
    global $dbh;
    return $dbh->query("SELECT * FROM ".$TABLE_NAME." WHERE $COMPARE_FIELD1='$ID1' AND $COMPARE_FIELD2!='$ID2'")->fetchAll();
}



// Functions Join Two Tables Full Join
function twoTablesFULLJOIN($TABLE1,$TABLE1_ID,$TABLE2,$TABLE2_ID){
    global $dbh;
    return $dbh->query("SELECT * FROM ".$TABLE1."  JOIN ".$TABLE2." ON $TABLE1.$TABLE1_ID=$TABLE2.$TABLE2_ID")->fetchAll();
}

// Functions Join Two Tables Full Join
function twoTablesFULLJOIN_WHERE($TABLE1,$TABLE1_ID,$TABLE2,$TABLE2_ID,$COMPARE_FIELD,$id){
    global $dbh;
    return $dbh->query("SELECT * FROM ".$TABLE1."  JOIN ".$TABLE2." ON $TABLE1.$TABLE1_ID=$TABLE2.$TABLE2_ID  WHERE $TABLE1.$COMPARE_FIELD='$id'")->fetchAll();
}


// Function returns number (total number of rows where comparison)
function TotalNumberOfRowsWhere($TABLE_NAME,$COMPARE_FIELD,$id){
    global $dbh;
    $sql = "SELECT * FROM ".$TABLE_NAME." WHERE ".$COMPARE_FIELD."=?";
    $query = $dbh->prepare($sql);
    $query->execute([$id]);
    return $query->rowCount();
}

// Function returns number (total number of rows where comparison two fiedls)
function TotalNumberOfRowsWhereTWO_AND($TABLE_NAME,$COMPARE_FIELD1,$COMPARE_FIELD2,$id1,$id2){
    global $dbh;
    $sql = "SELECT * FROM ".$TABLE_NAME." WHERE $COMPARE_FIELD1=? AND $COMPARE_FIELD2=?";
    $query = $dbh->prepare($sql);
    $query->execute([$id1,$id2]);
    return $query->rowCount();
}

// Function returns total rows in a table 
function TotalNumberOfRows($TABLE_NAME){
    global $dbh;
    $sql = "SELECT * FROM ".$TABLE_NAME."";
    $query = $dbh->prepare($sql);
    $query->execute();
    return $query->rowCount();
}

// Update One Column in Table 
function updateOne($table_name,$id,$update_variable,$text) {
 global $dbh;
 $sql = "UPDATE ".$table_name." SET $update_variable=? WHERE id=?";
$query = $dbh->prepare($sql);
$query->execute([$text,$id]);
if($query->rowCount() > 0) {
    return true;
}else {
    return false;
}
}

// Delete Transactions 
function Delete_Table($TABLE_NAME,$FIELD_NAME,$id) {
    global $dbh;
    $sql = "DELETE FROM ".$TABLE_NAME." WHERE $FIELD_NAME=?";
   $query = $dbh->prepare($sql);
   $query->execute([$id]);
   if($query->rowCount() > 0) {
       return true;
   }else {
       return false;
   }
   }
// Update One Column in Table 
function updateOne_FIELDNAME($table_name,$id,$update_variable,$text,$FIELD_NAME) {
    global $dbh;
    $sql = "UPDATE ".$table_name." SET $update_variable=? WHERE $FIELD_NAME=?";
   $query = $dbh->prepare($sql);
   $query->execute([$text,$id]);
   if($query->rowCount() > 0) {
       return true;
   }else {
       return false;
   }
}
// Update One Column in Table 
function updateOne_FIELDNAME_TWO($table_name,$id,$update_variable,$text,$FIELD_NAME1,$FIELD_NAME2,$id2) {
    global $dbh;
    $sql = "UPDATE ".$table_name." SET $update_variable=? WHERE $FIELD_NAME1=? AND $FIELD_NAME2=?";
   $query = $dbh->prepare($sql);
   $query->execute([$text,$id,$id2]);
   if($query->rowCount() > 0) {
       return true;
   }else {
       return false;
   }
}

// Convert English to bangla 
function englishToBangla($number){
    $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    return str_replace($en,$bn,$number);
}
function banglaToEnglish($number){
    $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    return str_replace($bn,$en,$number);
}
// String to Date Time Format
function stringToDate($date){
    $date = strtotime($date);
    return date('d-M-Y', $date);
}

function stringToTime($date){
    $date = strtotime($date);
    return date('h:i a', $date);
}

// Differerence of date
function dateTimeDifference_TWO_DATES($start_date,$currentDate){
// convertion string to date update_variable
$timeAdded = 4*60*60;
$t = strtotime($currentDate)+$timeAdded;
return strtotime($start_date)-$t;
}

// Return id compare maximum number

function all_by_SPECIFIC_ID_DESC($TABLE_NAME,$COMPARE_FIELD,$ID){
    global $dbh;
    return $dbh->query("SELECT * FROM ".$TABLE_NAME." WHERE ".$COMPARE_FIELD."='$ID' ORDER BY total_mark DESC")->fetchAll();
}


// Functions Return maximum value of a table 
function returnMaxValue($TABLE_NAME,$FIELD_NAME){
    global $dbh;
    $query = "SELECT MAX($FIELD_NAME) as total_rows FROM $TABLE_NAME";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $maximumyear = $row['total_rows'];
    return $maximumyear;
}