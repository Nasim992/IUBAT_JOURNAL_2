<?php
session_start();
error_reporting(0);
include 'config.php';
include 'functions.php';
include '../mail_functions.php';
// Author Login Form - Login
if(isset($_POST['submit'])) {

      // Generate paper id section starts here 
    //  Maximum paper id section starts here
    $query = "SELECT MAX(id) as total_rows FROM paper";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $maximumpaperid = $row['total_rows'];
  // Maximum paper id section ends here 
      $maximumpaperid = $maximumpaperid + 1; 
      $year = date('Y');
      $paperid = 'I'.$year.$maximumpaperid;
      if(strlen($maximumpaperid)===2){
        $paperid = 'I'.$year.'0'.$maximumpaperid;
      }
      else if(strlen($maximumpaperid)===1){
        $paperid = 'I'.$year.'00'.$maximumpaperid;
      }
      else if(strlen($maximumpaperid)===0){
        $paperid = 'I'.$year.'000'.$maximumpaperid;
      }
      else {
        $paperid = 'I'.$year.$maximumpaperid;
      }
  // Generate paper id section ends here 

  $authoremailmain = $_POST['author-email'];
  $papername = $_POST['paper-title'];
  $abstract = $_POST['summary'];
  $numberOfCoAuthorp = $_POST['number-of-coauthors'];
  // title and abstract file section starts here 
  $file1 = $_FILES['file1'];
  $name1 = $_FILES['file1']['name'];
  $filetmp1 = $_FILES['file1']['tmp_name'];
  $type1 = $_FILES['file1']['type'];
  // title and abstract file section ends here

  // pdf only description part section starts Here
  $file2 = $_FILES['file2'];
  $name2 = $_FILES['file2']['name'];
  $filetmp2 = $_FILES['file2']['tmp_name'];
  $type2 = $_FILES['file2']['type'];
  // pdf only description part section ends here 

  // Full pdf if necessary info file section starts Here 
  $file = $_FILES['file'];
  $name = $_FILES['file']['name'];
  $filetmp = $_FILES['file']['tmp_name'];
  $type = $_FILES['file']['type'];
   // Full pdf if necessary info  File section ends here
   $uploaddate = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 0, date('Y')));
    $action = 0 ;
// Co-author name section starts here
  $cauname1 = $_POST['caufullname1'];
  $cauname2 = $_POST['caufullname2'];
  $cauname3 = $_POST['caufullname3'];
  $cauname4 = $_POST['caufullname4'];
  $cauname5 = $_POST['caufullname5'];
  $cauname6 = $_POST['caufullname6'];
  $cauname7 = $_POST['caufullname7'];
  $cauname8 = $_POST['caufullname8'];
  $cauname9 = $_POST['caufullname9'];
  $cauname10 = $_POST['caufullname10'];
  $cauname11= $_POST['caufullname11'];
  $cauname12= $_POST['caufullname12'];
  $cauname13= $_POST['caufullname13'];
  $cauname14= $_POST['caufullname14'];
  $cauname15= $_POST['caufullname15'];
  $cauname16= $_POST['caufullname16'];
  $cauname17= $_POST['caufullname17'];
  $cauname18 = $_POST['caufullname18'];
  $cauname19 = $_POST['caufullname19'];
  $cauname20 = $_POST['caufullname20'];
  $cauname21 = $_POST['caufullname21'];
  $cauname22= $_POST['caufullname22'];
  $cauname23= $_POST['caufullname23'];
  $cauname24= $_POST['caufullname24'];
  $cauname25 = $_POST['caufullname25'];
  $cauname26 = $_POST['caufullname26'];
  $cauname27= $_POST['caufullname27'];
  $cauname28= $_POST['caufullname28'];
  $cauname29 = $_POST['caufullname29'];
  $cauname30= $_POST['caufullname30'];
  $coauthorname = serialize(array($cauname1,$cauname2,$cauname3,$cauname4,$cauname5,$cauname6,$cauname7,$cauname8,$cauname9,$cauname10,$cauname11,$cauname12,$cauname13,$cauname14,$cauname15,$cauname16,$cauname17,$cauname18,$cauname19,$cauname20,$cauname21,$cauname22,$cauname23,$cauname24,$cauname25,$cauname26,$cauname27,$cauname28,$cauname29,$cauname30));
// Co-Author name section ends here

// Co-Author email section starts here 

    $cauemail1 = $_POST['cauemail1'];
    $cauemail2 = $_POST['cauemail2'];
    $cauemail3 = $_POST['cauemail3'];
    $cauemail4 = $_POST['cauemail4'];
    $cauemail5 = $_POST['cauemail5'];
    $cauemail6 = $_POST['cauemail6'];
    $cauemail7 = $_POST['cauemail7'];
    $cauemail8 = $_POST['cauemail8'];
    $cauemail9 = $_POST['cauemail9'];
    $cauemail10 = $_POST['cauemail10'];
    $cauemail11= $_POST['cauemail11'];
    $cauemail12= $_POST['cauemail12'];
    $cauemail13= $_POST['cauemail13'];
    $cauemail14= $_POST['cauemail14'];
    $cauemail15= $_POST['cauemail15'];
    $cauemail16= $_POST['cauemail16'];
    $cauemail17= $_POST['cauemail17'];
    $cauemail18 = $_POST['cauemail18'];
    $cauemail19 = $_POST['cauemail19'];
    $cauemail20 = $_POST['cauemail20'];
    $cauemail21 = $_POST['cauemail21'];
    $cauemail22= $_POST['cauemail22'];
    $cauemail23= $_POST['cauemail23'];
    $cauemail24= $_POST['cauemail24'];
    $cauemail25 = $_POST['cauemail25'];
    $cauemail26 = $_POST['cauemail26'];
    $cauemail27= $_POST['cauemail27'];
    $cauemail28= $_POST['cauemail28'];
    $cauemail29 = $_POST['cauemail29'];
    $cauemail30= $_POST['cauemail30'];
$coauthoremail = serialize(array($cauemail1,$cauemail2,$cauemail3,$cauemail4,$cauemail5,$cauemail6,$cauemail7,$cauemail8,$cauemail9,$cauemail10,$cauemail11,$cauemail12,$cauemail13,$cauemail14,$cauemail15,$cauemail16,$cauemail17,$cauemail18,$cauemail19,$cauemail20,$cauemail21,$cauemail22,$cauemail23,$cauemail24,$cauemail25,$cauemail26,$cauemail27,$cauemail28,$cauemail29,$cauemail30));
// Co-Author Email section ends here 
    // Co-author department section starts here
    $caudept1 = $_POST['caudept1'];
    $caudept2 = $_POST['caudept2'];
    $caudept3 = $_POST['caudept3'];
    $caudept4 = $_POST['caudept4'];
    $caudept5 = $_POST['caudept5']; 
    $caudept6 = $_POST['caudept6'];
    $caudept7 = $_POST['caudept7'];
    $caudept8 = $_POST['caudept8'];
    $caudept9 = $_POST['caudept9'];
    $caudept10 = $_POST['caudept10'];
    $caudept11= $_POST['caudept11'];
    $caudept12= $_POST['caudept12'];
    $caudept13= $_POST['caudept13'];
    $caudept14= $_POST['caudept14'];
    $caudept15= $_POST['caudept15'];
    $caudept16= $_POST['caudept16'];
    $caudept17= $_POST['caudept17'];
    $caudept18 = $_POST['caudept18'];
    $caudept19 = $_POST['caudept19'];
    $caudept20 = $_POST['caudept20'];
    $caudept21 = $_POST['caudept21'];
    $caudept22= $_POST['caudept22'];
    $caudept23= $_POST['caudept23'];
    $caudept24= $_POST['caudept24'];
    $caudept25 = $_POST['caudept25'];
    $caudept26 = $_POST['caudept26'];
    $caudept27= $_POST['caudept27'];
    $caudept28= $_POST['caudept28'];
    $caudept29 = $_POST['caudept29'];
    $caudept30= $_POST['caudept30'];

$coauthordept = serialize(array($caudept1,$caudept2,$caudept3,$caudept4,$caudept5,$caudept6,$caudept7,$caudept8,$caudept9,$caudept10,$caudept11,$caudept12,$caudept13,$caudept14,$caudept15,$caudept16,$caudept17,$caudept18,$caudept19,$caudept20,$caudept21,$caudept22,$caudept23,$caudept24,$caudept25,$caudept26,$caudept27,$caudept28,$caudept29,$caudept30));

// Co-Author department section ends here

    // Co-author institute section starts here
    $cauinstitute1 = $_POST['cauinstitute1'];
    $cauinstitute2 = $_POST['cauinstitute2'];
    $cauinstitute3 = $_POST['cauinstitute3'];
    $cauinstitute4 = $_POST['cauinstitute4'];
    $cauinstitute5 = $_POST['cauinstitute5'];
    $cauinstitute6 = $_POST['cauinstitute6'];
    $cauinstitute7 = $_POST['cauinstitute7'];
    $cauinstitute8 = $_POST['cauinstitute8'];
    $cauinstitute9 = $_POST['cauinstitute9'];
    $cauinstitute10 = $_POST['cauinstitute10'];
    $cauinstitute11= $_POST['cauinstitute11'];
    $cauinstitute12= $_POST['cauinstitute12'];
    $cauinstitute13= $_POST['cauinstitute13'];
    $cauinstitute14= $_POST['cauinstitute14'];
    $cauinstitute15= $_POST['cauinstitute15'];
    $cauinstitute16= $_POST['cauinstitute16'];
    $cauinstitute17= $_POST['cauinstitute17'];
    $cauinstitute18 = $_POST['cauinstitute18'];
    $cauinstitute19 = $_POST['cauinstitute19'];
    $cauinstitute20 = $_POST['cauinstitute20'];
    $cauinstitute21 = $_POST['cauinstitute21'];
    $cauinstitute22= $_POST['cauinstitute22'];
    $cauinstitute23= $_POST['cauinstitute23'];
    $cauinstitute24= $_POST['cauinstitute24'];
    $cauinstitute25 = $_POST['cauinstitute25'];
    $cauinstitute26 = $_POST['cauinstitute26'];
    $cauinstitute27= $_POST['cauinstitute27'];
    $cauinstitute28= $_POST['cauinstitute28'];
    $cauinstitute29 = $_POST['cauinstitute29'];
    $cauinstitute30= $_POST['cauinstitute30'];

$coauthorinstitute = serialize(array($cauinstitute1,$cauinstitute2,$cauinstitute3,$cauinstitute4,$cauinstitute5,$cauinstitute6,$cauinstitute7,$cauinstitute8,$cauinstitute9,$cauinstitute10,$cauinstitute11,$cauinstitute12,$cauinstitute13,$cauinstitute14,$cauinstitute15,$cauinstitute16,$cauinstitute17,$cauinstitute18,$cauinstitute19,$cauinstitute20,$cauinstitute21,$cauinstitute22,$cauinstitute23,$cauinstitute24,$cauinstitute25,$cauinstitute26,$cauinstitute27,$cauinstitute28,$cauinstitute29,$cauinstitute30));

// Co-Author institute section ends here

    // Co-author address section starts here
    $cauaddress1 = $_POST['cauaddress1'];
    $cauaddress2 = $_POST['cauaddress2'];
    $cauaddress3 = $_POST['cauaddress3'];
    $cauaddress4 = $_POST['cauaddress4'];
    $cauaddress5 = $_POST['cauaddress5'];
    $cauaddress6 = $_POST['cauaddress6'];
    $cauaddress7 = $_POST['cauaddress7'];
    $cauaddress8 = $_POST['cauaddress8'];
    $cauaddress9 = $_POST['cauaddress9'];
    $cauaddress10 = $_POST['cauaddress10'];
    $cauaddress11= $_POST['cauaddress11'];
    $cauaddress12= $_POST['cauaddress12'];
    $cauaddress13= $_POST['cauaddress13'];
    $cauaddress14= $_POST['cauaddress14'];
    $cauaddress15= $_POST['cauaddress15'];
    $cauaddress16= $_POST['cauaddress16'];
    $cauaddress17= $_POST['cauaddress17'];
    $cauaddress18 = $_POST['cauaddress18'];
    $cauaddress19 = $_POST['cauaddress19'];
    $cauaddress20 = $_POST['cauaddress20'];
    $cauaddress21 = $_POST['cauaddress21'];
    $cauaddress22= $_POST['cauaddress22'];
    $cauaddress23= $_POST['cauaddress23'];
    $cauaddress24= $_POST['cauaddress24'];
    $cauaddress25 = $_POST['cauaddress25']; 
    $cauaddress26 = $_POST['cauaddress26'];
    $cauaddress27= $_POST['cauaddress27'];
    $cauaddress28= $_POST['cauaddress28'];
    $cauaddress29 = $_POST['cauaddress29'];
    $cauaddress30= $_POST['cauaddress30'];


$coauthoraddress = serialize(array($cauaddress1,$cauaddress2,$cauaddress3,$cauaddress4,$cauaddress5,$cauaddress6,$cauaddress7,$cauaddress8,$cauaddress9,$cauaddress10,$cauaddress11,$cauaddress12,$cauaddress13,$cauaddress14,$cauaddress15,$cauaddress16,$cauaddress17,$cauaddress18,$cauaddress19,$cauaddress20,$cauaddress21,$cauaddress22,$cauaddress23,$cauaddress24,$cauaddress25,$cauaddress26,$cauaddress27,$cauaddress28,$cauaddress29,$cauaddress30));
 
// Co-Author Address section ends here

  $sql="INSERT INTO  paper(paperid,authoremail,papername,numberofcoauthor,abstract,name,name1,name2,type,type1,type2,action,uploaddate,coauthorname,coauthoremail,coauthordept,coauthorinstitute,coauthoraddress) VALUES(:paperid,:authoremailmain,:papername,:numberOfCoAuthorp,:abstract,:name,:name1,:name2,:type,:type1,:type2,:action,:uploaddate,:coauthorname,:coauthoremail,:coauthordept,:coauthorinstitute,:coauthoraddress)";
    $query = $dbh->prepare($sql); 
    $query->bindParam(':paperid',$paperid,PDO::PARAM_STR);
    $query->bindParam(':authoremailmain',$authoremailmain,PDO::PARAM_STR);
    $query->bindParam(':papername',$papername,PDO::PARAM_STR);
    $query->bindParam(':abstract',$abstract,PDO::PARAM_STR);
    $query->bindParam(':name',$name,PDO::PARAM_STR);
    $query->bindParam(':name1',$name1,PDO::PARAM_STR);
    $query->bindParam(':name2',$name2,PDO::PARAM_STR);
    $query->bindParam(':numberOfCoAuthorp',$numberOfCoAuthorp,PDO::PARAM_STR);
    $query->bindParam(':type',$type,PDO::PARAM_STR);
    $query->bindParam(':type1',$type1,PDO::PARAM_STR);
    $query->bindParam(':type2',$type2,PDO::PARAM_STR);
    $query->bindParam(':action',$action,PDO::PARAM_STR);
    $query->bindParam(':uploaddate',$uploaddate,PDO::PARAM_STR); 
    $query->bindParam(':coauthorname',$coauthorname,PDO::PARAM_STR);
    $query->bindParam(':coauthoremail',$coauthoremail,PDO::PARAM_STR);
    $query->bindParam(':coauthordept',$coauthordept,PDO::PARAM_STR);
    $query->bindParam(':coauthorinstitute',$coauthorinstitute,PDO::PARAM_STR);
    $query->bindParam(':coauthoraddress',$coauthoraddress,PDO::PARAM_STR);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  { 
    // Insert PaperID To the feedbacktable table
    $sqlfeedbackpaperid = "INSERT INTO chieffeedback(paperid) VALUES('$paperid')";
    mysqli_query($link,$sqlfeedbackpaperid);
    // Insert PAperID to the feedbacktable
    // Sending messages to the chief editor section 
    $sqlchiefeditoremail = "SELECT * FROM chiefeditor";
    $resultchiefeditoremail= mysqli_query($link,$sqlchiefeditoremail);  
    $filechiefeditoremail = mysqli_fetch_assoc($resultchiefeditoremail);
    $pemail = $filechiefeditoremail['email'];
          include '../mailmessage/sendingchiefeditormessages.php'; 
          send_mail($pemail, $subject, $msg, $FORM_EMAIL,$FORM_EMAIL_PASS);
    // Sending message to the chief editor section 
    move_uploaded_file($filetmp,"../documents/".$name);
    move_uploaded_file($filetmp1,"../documents/file1/".$name1);
    move_uploaded_file($filetmp2,"../documents/file2/".$name2);
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-success alert-dismissible" id="message">Paper Uploaded Successfully</p>
              </div>
        </div>
    ');
    echo "<script type='text/javascript'> document.location = '../author/paperstatus'; </script>";
  //  redirect($BASE_URL."author/paperstatus");
  } else{
      
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">Invalid Details.The Paper Has Already been Uploaded</p>
                  </div>
            </div>
        ');
        echo "<script type='text/javascript'> document.location = '../author/uploadpaper'; </script>";
    //    redirect($BASE_URL."author/uploadpaper");

  }   
}