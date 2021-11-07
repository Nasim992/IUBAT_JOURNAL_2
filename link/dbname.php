<?php 
// DB credentials. 
define('DB_HOST','localhost');
define('DB_USER','root'); 
define('DB_PASS','');
define('DB_NAME','iubat');
// Establish database connection.


// URL
$BASE_URL = 'http://localhost/IUBAT_JOURNAL_2/';
$BASE_URL_2='http://localhost/IUBAT_JOURNAL_2';
// $BASE_URL = 'https://journal.iubat.edu/';
//$BASE_URL_2='http://localhost/IUBAT_JOURNAL_2';


// Form Email Name 
$FORM_EMAIL = "journal.iubat@gmail.com";
$FORM_EMAIL_PASS = "iubat123";
// $FORM_EMAIL_HOST = "ssl://smtp.gmail.com";
$FORM_EMAIL_HOST = "localhost";


// Folder Directory Path
$IMAGE_DIR = $BASE_URL."images/";
$CSS_DIR = $BASE_URL."css/";
$JS_DIR = $BASE_URL."js/";
$DOCUMENTS_DIR = $BASE_URL."documents/";
$USER_DIR = $BASE_URL."user/";
$LAYOUT_DIR = $BASE_URL."layout/";
$INDEX_DIR = $BASE_URL."index/";
$LINK_DIR = $BASE_URL."link/";


// Database Table Name 
$USER_DB = 'author';
$ADMIN_DB = 'admin';
$ARCHIVE_DB = 'archive';
$CHIEFEDITOR_DB = 'chiefeditor';
$CHIEFFEEDBACK_DB = 'chieffeedback';
$EDITORTABLE_DB = 'editortable';
$PAPER_DB = 'paper';
$REVIEWERTABLE_DB = 'reviewer';

