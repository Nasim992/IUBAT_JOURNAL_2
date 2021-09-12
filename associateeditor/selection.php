<?php 
     $TITLE = "Selection - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAssociateEditorLoggedIn($email,$BASE_URL."layout/login");
     include "../layout/navbar.php";
     $authoremail = $email;
     include '../link/selection.php';
?>

<div id="mySidebar" class="sidebar">
        <?php include '../layout/sidebar.php'; ?>
</div>

<div id="main">

<a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
<a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
<div class="container">

    <h5>UNPUBLISHED PAPER</h5>
    <?php display_message(); ?>
    <hr class="bg-secondary">

    <div class="jumbotron">

        <h5 style="font-size:18px" class="display-4">Name : <?php echo $papername ?></h5>
        <div class="d-flex justify-content-between">
        <div>
        <h6 style="font-size:15px;" class="display-5">Paper ID:<span style='color:#122916;'> <?php echo $paperid; ?></span></h6>
        </div>
        <div> 
        <b><p>Status: <span class="text-success"><?php if(empty($status)){
            echo "<span class='text-warning'>Not given yet.</span>";
        }else {
            echo $status;
        }
        ?></span></p></b>
        </div>
        </div>
        <h6 style="font-size:15px;" class="display-5">Uploaded on:<span style='color:#122916;'>
                <small><?php echo $maindate; ?></small></span></h6>

        <div class="d-flex justify-content-between">
            <p class="fontSize14px"><b>Author:</b> <?php echo $authorname ?></p>
            <a href="#">
                <p class="fontSize14px">Number of Co-Author:0<?php echo $numberofcoauthor;?></p>
            </a>
        </div>

        <div class="d-flex justify-content-between">
            <p class="fontSize14px"><b>Email:</b> <?php echo $authormail;?></p>
            <p class="fontSize14px"><b>Co-Authors:</b>[<?php 
            //  Showing Co Author Name section starts here 
            foreach($cauname as $cname) {
            if(!empty($cname)) {
                echo $cname.',';
            }
            }
            // Showing Co-Author Name Section ends here 
 ?>]</p>
        </div>
        <div class="d-flex justify-content-between">

            <div>
                <h6 style="font-size:15px;" class="display-5">Reviewer:<span style='color:#122916;'> <small>

                            <!-- Show Reviewer Selection section starts Here  -->
                            <?php
                                foreach( $arrayusernamereviewershowing as $arrpap){
                                    $sqlnameeditorr = "SELECT title,firstname,middlename,lastname FROM author WHERE username='$arrpap'";
                                    $resultnameeditorr = mysqli_query($link,$sqlnameeditorr);
                                    $filenameeditorr = mysqli_fetch_assoc($resultnameeditorr);
                                    $fullname =  $filenameeditorr['title'].$filenameeditorr['firstname'].' '.$filenameeditorr['middlename'].' '.$filenameeditorr['lastname'];
                                    echo $fullname.' '; 
                                }
                                ?>
                            <!-- Show Reviewer Selection Section ends here -->


                        </small></span></h6>
                        </div>
                        <div>
                <h6 style="font-size:15px;" class="display-5"> Associate Editor:<span style='color:#122916;'>
                        <small>
                            <!-- Showing Selected editor Section Starts Here  -->
                            <?php
                            foreach( $associateeditorshowing  as $arrpap){
                            $sqlnameeditorp = "SELECT title,firstname,middlename,lastname FROM author WHERE username='$arrpap'";
                            $resultnameeditorp = mysqli_query($link,$sqlnameeditorp);
                            $filenameeditorp = mysqli_fetch_assoc($resultnameeditorp);
                            $fullname =  $filenameeditorp['title'].$filenameeditorp['firstname'].' '.$filenameeditorp['middlename'].' '.$filenameeditorp['lastname'];
                            echo $fullname.' ';
                            }
                            ?>
                            <!-- Showing Selected editor section ends here -->
                        </small></span></h6>
                         <h6 style="font-size:15px;" class="display-5"> Academic Editor:<span style='color:#122916;'><small>
                            <!-- Showing Selected editor Section Starts Here  -->
                            <?php
                            foreach( $academiceditorshowing  as $arrpap){
                            $sqlnameeditorp = "SELECT title,firstname,middlename,lastname FROM author WHERE username='$arrpap'";
                            $resultnameeditorp = mysqli_query($link,$sqlnameeditorp);
                            $filenameeditorp = mysqli_fetch_assoc($resultnameeditorp);
                            $fullname =  $filenameeditorp['title'].$filenameeditorp['firstname'].' '.$filenameeditorp['middlename'].' '.$filenameeditorp['lastname'];
                            echo $fullname.' ';
                            }
                            ?>
                            <!-- Showing Selected editor section ends here -->
                        </small></span></h6>
            </div>
        </div>
        <p style="font-size:14px"><b>Abstract:&nbsp</b><?php echo $abstract ?></p>

        <!-- --------------------- Select edit paper section starts here--------------------------------  -->
        <?php 

        $sqleditortablef = "SELECT * FROM editortable Where  paperid='$paperid'"; 

        $resulteditortablef= mysqli_query($link,$sqleditortablef); 

        $fileeditortablef = mysqli_fetch_assoc($resulteditortablef); 

        if(empty( $fileeditortablef['feedback'])) {
        ?>

        <div class="float-right">
            <form action='editorfeedback' method='post'>
                <input type="hidden" name="paperid" value="<?php echo $paperid;?>">

                <button class=" btn btn-sm btn-info" type="submit" name="reviewer-feedbacks">Write a
                    feedback</button>
            </form>
        </div>
        <?php  } else  { ?>
        <div class="float-right">
            <form action='reviewedpaper' method='post'>
                <input type="hidden" name="paperid" value="<?php echo $paperid;?>">
                <button class=" btn btn-sm btn-info" type="submit" name="edit-feedbacks">Show reviewed
                    paper</button>
            </form>
        </div> 

        <?php  } ?>

        <!-- ---------------------Select edit paper section ends here ---------------------------------- -->

        <br>
        <div class="row">

                            <!-- <div class="col-sm-4 col-lg-3 col-md-3 col-xl-3">
        <a href="reviewerdetails"  style="font-size:13px;" title="Reviewer Feedback" class="">Reviewer Feedback:0</a>
        </div> -->
                            <!-- <div class="col-sm-4 col-lg-3 col-md-3 col-xl-3">
        <a style="font-size:13px;" title="Reviewer Feedback" class="">Editor Feedback:0</a>
        </div> -->
                            <!-- <div class="col-sm-4 col-lg-3 col-md-3 col-xl-3">
        <a style="font-size:13px;" title="Reviewer Feedback" class="">Status:<span class="text-success">Satisfactory</span></a>
        </div> -->

            <div class="col-sm-4 col-lg-3 col-md-3 col-xl-3">
            </div>
        </div>
        <!-- File Section starts here  -->
        <hr class="bg-success">
        <h6><small><b>Uploaded Files:</b></small></h6>
        <div class="row">

            <?php  if(!empty($filename1)) {  ?>
            <div class="col-sm-4 col-lg-4 col-md-3 col-xl-4">
                Full Manuscript as doc: <a style="font-size:13px;" title="Full Manuscript Doc Format" class=""
                    href="<?php echo $filepathtitle;?> " target="_blank"
                    role="button"><?php echo $filename1;  ?></a>
            </div>
            <?php } ?>
            <?php  if(!empty($filename2)) {  ?>
            <div class="col-sm-4 col-lg-4 col-md-3 col-xl-4">
                Full Manuscript as pdf: <a style="font-size:13px;" title="Download this paper" class=""
                    href="<?php echo $filepathsecond;?> " target="_blank"
                    role="button"><?php echo $filename2; ?></a>
            </div>
            <?php } ?>
            <?php  if(!empty($filename)) {  ?>
            <div class="col-sm-4 col-lg-4 col-md-3 col-xl-4">
                Necessary Info: <a style="font-size:13px;" title="Download this paper" class=""
                    href="<?php echo $filepath; ?> " target="_blank" role="button"><?php echo $filename;  ?></a>
            </div>
            <?php } ?>

            <?php  if(!empty($filenameresubmit)) {  ?>
            <div class="col-sm-4 col-lg-4 col-md-3 col-xl-4">
                Resubmitted paper: <a style="font-size:13px;" title="Download this paper" class=""
                    href="<?php echo $filepathresubmit; ?> " target="_blank"
                    role="button"><?php echo $filenameresubmit;  ?></a>
            </div>
            <?php } ?>

        </div>
        <!-- File Section Ends Here  -->

    </div>
    <hr class="bg-success">
    <!-- DashBoard Section ends  -->
    <div class="row">

        <!-- Academic Editor Section starts here  -->
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
        <h3 style="font-size:17px" class="text-dark btn btn-info btn-block"><b class="text-white"><i>Send Academic Editor Request </i></b></h3>
            <?php
            $sel1 = 0;
            if(empty($resultacademiceditorshown)) { echo "Already Selected"; }
            foreach($resultacademiceditorshown as $arrname){
                $sqlnamenibo = "SELECT title,firstname,middlename,lastname,primaryemail,academiceditor FROM author WHERE username='$arrname'";
                $resultnamenibo = mysqli_query($link,$sqlnamenibo);
                $filenamenibo = mysqli_fetch_assoc($resultnamenibo);
                $fullname =  $filenamenibo['title'].$filenamenibo['firstname'].' '.$filenamenibo['middlename'].' '.$filenamenibo['lastname'];
                $primaryemail = $filenamenibo['primaryemail'];
                ?>
            <form method="post">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-8 col-xl-8">
                        <label for="formGroupExampleInput"><b
                                style="font-size:14px;"><?php echo $sel1+1 ?>.<span><?php echo $fullname ?></b></span></label>
                        <input type="hidden" id="custId" name="authornameselect" value="<?php echo $arrname ?>">
                        <input type="hidden" name="primaryemail" value="<?php echo $primaryemail; ?>">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <button style="font-size:10px;"
                            onclick="return confirm('Send Review Request to this author?');"
                            class="btn btn-sm btn-success form-control mt-0" type="submit"
                            name="select-academic-editor"><b><i class="fas fa-check"></i></b></button>
                    </div>
                </div>
                <br>
            </form>
            <?php 
            $sel1 = $sel1 +1;   
            }
            ?>
        </div>
        <!-- Academic Editor Section ends here -->


        <!-- Reviewer Selection starts Here  -->
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">

        <h3 style="font-size:17px" class="btn btn-info btn-block"><b><i>Send Review Request to this author</i></b></h3>
                 <button onclick="handleOutsideReviewer()" class="btn btn-block  text-info"><i class="fas fa-edit"></i> Write email if not available below</button> <br>
                <!-- -------------------Outside Reviewer selection ------------------------------ -->
                <div id="handleoutsidereviewer">
                <form method = "post" >
                        <div class="input-group">
                        <label class="col-sm-2 col-form-label" for="formGroupExampleInput"><b>Name:</b></label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="exampleFormControlTextarea1" name= "outsideName" required>
                        </div>
                        </div> <br>
                        <div class="input-group">
                        <label class="col-sm-2 col-form-label" for="formGroupExampleInput"><b>Email:</b></label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" id="exampleFormControlTextarea1" name= "email" required>
                        </div>
                        </div> <br>
                        <div>
                        <button class="btn btn-sm btn-info btn-block mr-4" name = "select-reviewer-outside" type="submit" >Sent Review</button>
                        </div>
                        <br>
                </form>
                 </div>
                <!-- -------------------Outside Reviewer Selection ------------------------------ -->
            <?php
            $selection = 0;
            if(empty($resultreviewershown)) { echo "Already Selected"; }
            foreach($resultreviewershown as $arrname){
                $sqlnamenibo = "SELECT title,firstname,middlename,lastname,primaryemail FROM author WHERE username='$arrname'";
                $resultnamenibo = mysqli_query($link,$sqlnamenibo);
                $filenamenibo = mysqli_fetch_assoc($resultnamenibo);
                $fullname =  $filenamenibo['title'].$filenamenibo['firstname'].' '.$filenamenibo['middlename'].' '.$filenamenibo['lastname'];
                $primaryemail = $filenamenibo['primaryemail'];

                ?>
            <form method="post">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-8 col-xl-8">
                        <label for="formGroupExampleInput"><b
                                style="font-size:14px;"><?php echo $selection+1 ?>.<span><?php echo $fullname ?></b></span></label>
                        <input type="hidden" id="custId" name="authornameselect" value="<?php echo $arrname ?>">
                        <input type="hidden" name="primaryemail" value="<?php echo $primaryemail; ?>">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <button style="font-size:10px;"
                            onclick="return confirm('Send Review Request to this author?');"
                            class="btn btn-sm btn-success form-control mt-0" type="submit"
                            name="select-reviewer"><b><i class="fas fa-check"></i></b></button>
                    </div>
                </div>
            </form>
            <?php 
            $selection = $selection +1;   
            }
                ?>
        </div>
        <!-- Reviewer Selection section ends here -->

    </div>


    <div class="pb-5"></div>

</div>
</div>


<?php
     include "../layout/bottomlayout.php";
?>