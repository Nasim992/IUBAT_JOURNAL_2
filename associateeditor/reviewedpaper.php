<?php 
     $TITLE = "Reviewed Paper - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAssociateEditorLoggedIn($email,$BASE_URL."layout/login");
     include "../layout/navbar.php";
     $authoremail = $email;

         //  --------------------Selecting paper id form Associate Editor ------------------------

         $sql = "SELECT editortable.id,editortable.paperid,editortable.username,editortable.feedback,editortable.associateeditor from editortable Where primaryemail='$email' and feedback IS NOT NULL and associateeditor IS NOT NULL";
         $query = $dbh->prepare($sql); 
         $query->execute(); 
         $results=$query->fetchAll(PDO::FETCH_OBJ); 
         $cnt=1;
         if($query->rowCount() > 0) 
         {
         $arraypaperidreviewer = array();
         foreach($results as $result) 
         { 
             $paperid = htmlentities($result->paperid);
             array_push($arraypaperidreviewer,$paperid);
         }
     }
   
 // --------------------- Selecting paper id form Associate Editor ------------------------

?>

<div id="mySidebar" class="sidebar">
        <?php include '../layout/sidebar.php'; ?>
    </div>

    <div id="main">

<a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
<a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
<div class="container">
    <!-- --------------------------------Reviewed paper -------------------------------- -->

    <h6>REVIEWED PAPER</h6>
    <hr class="bg-secondary">
    <?php display_message(); ?>
    <div class="table-responsive table-responsive-lg table-responsize-xl table-responsive-sm p-4">
        <table id="dtBasicExample" cellspacing="0">

            <thead> 
                <tr> 
                    <th></th>
                </tr>
            </thead>
             <?php if(!empty($arraypaperidreviewer)) {?>
            <tbody id="myTable">
                <?php 
                foreach ($arraypaperidreviewer  as $pid) {
                    $sqlreviewerselection = "SELECT paper.id,paper.paperid,paper.authoremail,paper.papername,paper.abstract,paper.name,paper.type,paper.action,paper.numberofcoauthor,paper.pdate,paper.uploaddate,paper.coauthorname,paper.name1,paper.name2,paper.resubmitpaper from paper WHERE  paperid='$pid'";

                    $resultreviewerselection = mysqli_query($link,$sqlreviewerselection);
                    
                    $filereviewerselection = mysqli_fetch_assoc($resultreviewerselection);

                    $id =  $filereviewerselection['paperid'];
                    $papername = $filereviewerselection['papername'];
                    $numberofcoauthor = $filereviewerselection['numberofcoauthor']; 
                    $abstract = $filereviewerselection['abstract'];
                    $authoremailpaper = $filereviewerselection['authoremail'];
                    $name = $filereviewerselection['name'];
                    $filepathdoc = '../documents/file1/'.$filereviewerselection['name1']; 
                    $filepathpdf = '../documents/file2/'.$filereviewerselection['name2']; 
                    $filepathresubmit = '../documents/resubmit/'.$filereviewerselection['resubmitpaper']; 
                    $type = $filereviewerselection['type'];
                    $action = $filereviewerselection['action']; 

                    $mainuploaddate = $filereviewerselection['uploaddate'];

                    $uploaddate =  date("d-M-Y",strtotime($mainuploaddate));

                    $type = $filereviewerselection['type'];
                    
                    $pdatestring = $filereviewerselection['pdate'];
                    $pdate = date("d-M-Y",strtotime( $pdatestring));

                    ?>

                <?php                   ?>
                <!-- Select user  name section ends here  -->

                <!-- Dashboard section starts  -->
                <tr>
                    <td>
                        <div class="jumbotron">

                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fontSize14px">Paper ID : <?php echo $id;?></p>
                                </div>
                                <div>
                                    <p class="fontSize14px"><b> Status: <?php

                                                                            if ($action!=1) {
                                                                                ?>
                                            <span style="color:goldenrod;">
                                                <?php  echo "Pending";      } else {    ?>
                                            </span>
                                            <span style="color:green;">
                                                <?php
                                                    echo "Published on ".$pdate;    }        ?>
                                            </span></b></p>
                                </div>
                            </div>

                            <h5 class="display-4 fontSize16px"><?php echo $papername;?></h5>
                            <p style="font-size:12px"><b>Uploaded On : </b><?php echo $uploaddate; ?></p>

                        </div>

                        <p class="fontSize14px"><span style="font-weight:bold">Abstract:</span>
                            <?php echo $abstract;?></p>

                        <div class=" d-flex justify-content-between col-sm-12">
                            <div>
                                <a style="font-size:14px;" class="" href="<?php echo $filepathdoc ?> "
                                    target="_blank" role="button">Download as doc</a>
                            </div>
                            <div>
                                <a style="font-size:14px;" class="" href="<?php echo $filepathpdf ?> "
                                    target="_blank" role="button">Download as pdf</a>
                            </div>
                            <?php if(!empty($filereviewerselection['resubmitpaper']))  { ?>
                            <div>
                                <a style="font-size:14px;" class="" href="<?php echo $filepathresubmit ?> "
                                    target="_blank" role="button">Resubmitted paper</a>
                            </div>
                            <?php  } ?>
                            <div>
                                <p><?php echo $type;?></p>
                            </div>
                            <div>
                                <form action='editfeedback' method='post'>
                                    <input type="hidden" name="paperid" value="<?php echo $id;?>">

                                    <input class="text-danger"
                                        style="font-size:15px;border:none;font-weight:600;background-color:white;"
                                        type="submit" name="edit-feedbacks" value="Edit your Feedback">
                                </form>
                            </div>
                        </div>
    </div>
    <hr>
    </td>
</div>
</tr>

<!-- DashBoard Section ends  -->

<?php } ?>
</tbody>
</table>
<?php  } else { 
    echo "No paper reviewed yet";
} ?>
<!-- --------------------------------Reviewed paper ----------------------------------  -->

</div>
</div>

<?php
     include "../layout/bottomlayout.php";
?>