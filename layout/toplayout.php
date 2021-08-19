<?php 
session_start();
error_reporting(E_ALL);
include 'link/config.php';
include 'link/functions.php';
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- <base href="<?php  echo $BASE_URL;?>"> -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="The IUBAT Review is a multidisciplinary academic journal that the editors intend to publish annually. The office of the journal is located at the International University of Business Agriculture and Technology, the first non-government university in Bangladesh.">
        <link rel="shortcut icon" href="<?php echo $IMAGE_DIR; ?>iubat-logo.png">
        <link rel="stylesheet" href="<?php echo $CSS_DIR; ?>index.css">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="<?php echo $CSS_DIR; ?>bootstrap.4.5.3.min.css">
        <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8f W90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="<?php echo $CSS_DIR; ?>particle.css">
    <link rel="stylesheet" href="<?php echo $CSS_DIR; ?>minimal_matrix.css">
      <title><?php echo empty($TITLE)?"IUBAT Review":$TITLE; ?></title>
    </head>
    <body>
