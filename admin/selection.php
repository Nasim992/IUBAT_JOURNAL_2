<?php 
     $TITLE = "Select Editor - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAdminLoggedIn($email,$BASE_URL."layout/login");
     $editoremail = $email;
     include "../layout/navbar.php";
     include "../link/selection.php";
?>

<head>
    <style>
            button[type="submit"]:hover {
        background-color: none !important;
    }
    #handleoutsidereviewer {
        display:none;
    }
    </style>
</head>


 <!-- Author showing header sections ends   -->
    <div id="mySidebar" class="sidebar">
        <?php  include '../layout/sidebar.php'; ?>
    </div>

    <div id="main">

<a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
<a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
<div class="container">
<?php echo display_message(); ?>
    <h5>UNPUBLISHED PAPER</h5>
    <hr class="bg-secondary">

    <div class="jumbotron">

        <h5 style="font-size:18px" class="display-4">Name : <?php echo $papername ?></h5>
        <h6 style="font-size:15px;" class="display-5">Paper ID:<span style='color:#122916;'>
                <?php echo $paperid; ?></span></h6>
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
                     if(empty($arrayusernamereviewershowing)) { echo "Not Selected Yet"; }
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
                            if(empty($associateeditorshowing)) { echo "Not Selected Yet"; }
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
                <h6 style="font-size:15px;" class="display-5"> Academic Editor:<span style='color:#122916;'>
                        <small>
                            <!-- Showing Selected editor Section Starts Here  -->
                            <?php
                              if(empty($academiceditorshowing)) { echo "Not Selected Yet"; }
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
        <hr>

        <div class="row" >

            <div class="col-sm-4 col-lg-3 col-md-3 col-xl-3">
                <form method="post">
                    <input type="hidden" name="acceptid" value="<?php echo $paperid; ?>">
                    <button  type="submit" class="bg-light" name="accept-paper"
                        onclick="return confirm('Are you sure you want accept this paper?');"
                        style="border:none;color:green;margin-top:0px;"> Accept <i
                            class="fas fa-check"></i></button>
                </form>
            </div>
            <div class="col-sm-4 col-lg-3 col-md-3 col-xl-3">
                <form method="post">
                    <input type="hidden" name="rejectid" value="<?php echo $paperid; ?>">

                    <button type="submit" class="bg-light" name="reject-paper"
                        onclick="return confirm('Are you sure you want Reject this paper?');"
                        style="border:none;color:red;margin-top:0px;"> Reject <i
                            class="fas fa-ban"></i></button>
                </form>
            </div>

            <div class="col-sm-4 col-lg-3 col-md-3 col-xl-3">
                <form method="post">
                    <input type="hidden" name="paperiddelete" value="<?php echo $paperid; ?>">
                    <input type="hidden" name="filepathtitle" value="<?php echo $filepathtitle; ?>">
                    <input type="hidden" name="filepathsecond" value="<?php echo $filepathsecond; ?>">
                    <input type="hidden" name="filepath" value="<?php echo $filepath; ?>">
                    <input type="hidden" name="filepathresubmit" value="<?php echo $filepathresubmit; ?>">


                    <button type="submit" title="Delete" class="bg-light" name="deletepaperchiefeditor"
                        onclick="return confirm('Are you sure you want Delete this paper?');"
                        style="border:none;color:red;margin-top:0px;"><i class="fas fa-trash-alt"
                            title="Delete"></i></button>
                </form>

            </div>
        </div>
        <!-- File Section starts here  -->
        <hr class="bg-success">
        <h6><small><b>Uploaded Files:</b></small></h6>
        <div class="row">


            <?php  if(!empty($filename1)) {  ?>
            <div class="col-sm-12 col-lg-4 col-md-3 col-xl-4">
                Full Manuscript as doc format: <a style="font-size:13px;" title="Full Manuscript as Doc Format "
                    class="" href="<?php echo $filepathtitle;?> " target="_blank"
                    role="button"><?php echo $filename1;  ?></a>
            </div>
            <?php } ?>
            <?php  if(!empty($filename2)) {  ?>
            <div class="col-sm-12 col-lg-4 col-md-3 col-xl-4">
                Full Manuscript as pdf format: <a style="font-size:13px;" title="Download this paper" class=""
                    href="<?php echo $filepathsecond;?> " target="_blank"
                    role="button"><?php echo $filename2; ?></a>
            </div>
            <?php } ?>
            <?php  if(!empty($filename)) {  ?>
            <div class="col-sm-12 col-lg-4 col-md-3 col-xl-4">
                Necessary Info: <a style="font-size:13px;" title="Download this paper" class=""
                    href="<?php echo $filepath; ?> " target="_blank" role="button"><?php echo $filename;  ?></a>
            </div>
            <?php } ?>

            <?php  if(!empty($filenameresubmit)) {  ?>
            <div class="col-sm-12 col-lg-4 col-md-3 col-xl-4">
                Resubmitted paper: <a style="font-size:13px;" title="Download this paper" class=""
                    href="<?php echo $filepathresubmit; ?> " target="_blank"
                    role="button"><?php echo $filenameresubmit;  ?></a>
            </div>
            <?php } ?>

            <!-- File Section Ends Here  -->

        </div>
        <hr class="bg-success">
        <!-- DashBoard Section ends  -->
        <div class="row">
            <!-- Associate Editor Section starts here  -->
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">

                <h3 style="font-size:17px" class="text-dark btn btn-info btn-block"><b class="text-white"><i>Send Associate Editor Request </i></b></h3>
                <!-- <hr class="bg-success"> -->
        
                <?php
                if(empty($resultassociateeditorshown)) { echo "Already Selected"; }
                $selection = 0;
                foreach($resultassociateeditorshown as $arrname){
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
                            <input type="hidden" id="custId" name="authornameselect"
                                value="<?php echo $arrname ?>">
                            <input type="hidden" name="primaryemail" value="<?php echo $primaryemail; ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                            <button style="font-size:10px;"
                                onclick="return confirm('Send Review Request to this author?');"
                                class="btn btn-sm btn-success form-control mt-0" type="submit"
                                name="select-associate-editor"><b><i class="fas fa-check"></i></b></button>
                        </div>
                    </div>
                    <br>
                </form>
                <?php 
                $selection = $selection +1;   
                }
                        ?>
            </div>
            <!-- Associate Editor Section ends here  -->

            <!-- Associate Editor Section starts here  -->
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <h3 style="font-size:17px" class="text-dark btn btn-info btn-block"><b class="text-white"><i>Send Academic Editor Request </i></b></h3>
                <!-- <hr class="bg-success"> -->

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
                            <input type="hidden" id="custId" name="authornameselect"
                                value="<?php echo $arrname ?>">
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
            <!-- Associate Editor Section ends here -->


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
                                    style="font-size:14px;"><?php echo $selection+1; ?>.<span><?php echo $fullname; ?></b></span></label>
                            <input type="hidden" id="custId" name="authornameselect"
                                value="<?php echo $arrname; ?>">
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
                <?php $selection = $selection +1;   } ?>
            </div>
            <!-- Reviewer Selection section ends here -->
        </div>
        <br>
        <br>
<!-- ------------------------------------------------Feedback------------------------------------------------------------------------- -->
            <?php 
            // Reviewer Selection section starts here 
            $sqlreviewerupdate = "SELECT * from chieffeedback WHERE  paperid='$paperid'";

            $resultreviewerupdate = mysqli_query($link,$sqlreviewerupdate);

            $filereviewerupdate = mysqli_fetch_assoc($resultreviewerupdate);

            $feedbackfile = $filereviewerupdate['file']; 

            $feedbackfilepath = '../documents/review/'.$filereviewerupdate['file'];

            $feedback =  $filereviewerupdate['feedback'];

            $feedbackdate = $filereviewerupdate['date'];

            $status = $filereviewerupdate['status'];

            // Reviewer Selection ends here 
            ?>
        <div style="border:2px solid #e3e3e3;" class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <!-- Review Showing Section starts here  -->
                <?php 
                    $date = date('d-M-Y',strtotime($feedbackdate));
                    ?>
                <div style="border:2px solid #e3e3e3;  padding:10px;margin-top:5px;border-radius:10px;">
                    <b class="text-white bg-success btn-sm"><i>Your Review:</i></b>
                    <hr>
                    <?php if(!empty($feedback )){?>
                    <p><?php echo $feedback; ?></p>
                    <p><b>Reviewed on: </b><small><?php echo $date; ?></small></p>
                    <?php if(!empty($feedbackfile )){?>
                    <a style="font-size:14px;" class="btn btn-sm btn-info"
                        href="<?php echo $feedbackfilepath; ?> " target="_blank" role="button">Your Reviewed
                        file</a>
                        <?php  } ?>
                    <?php  } else { echo "Not Reviewed yet!"; } ?>
                </div>

                <!-- Review Showing Section Ends Here  -->

            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <!-- input file section starts here  -->
                <form method="post" enctype="multipart/form-data">
                    <div class="">
                        <br>
                        <h6 class="text-center">SENT YOUR FEEDBACK</h6>
                        <input type="hidden" id="custId" name="paperid" value="<?php echo  $paperid; ?>">
                        <div class="input-group">
                            <label class="col-sm-2 col-form-label" for="formGroupExampleInput"><b>
                                    Status:</b></label>
                            <div class="col-sm-10">
                            <?php if(empty($status)) {
                                ?>
                                <input type="text" class="form-control" id="exampleFormControlTextarea1"
                                    name="status" placeholder="Status not given yet"></input>
                            <?php 
                            } else {
                                ?>
                                  <input type="text" class="form-control" id="exampleFormControlTextarea1"
                                    name="status" placeholder="<?php echo $status; ?>"></input>
                                <?php 
                            } ?>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <label class="col-sm-2 col-form-label" for="formGroupExampleInput"><b>Write
                                    Feedback:</b></label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                    name="reviewer-review" rows="5" required></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <label class="col-sm-12 col-form-label" for="formGroupExampleInput"><b>Attach
                                    Review(If Required):</b></label><br>
                            <div class="col-sm-12">
                                <input type="file" class="form-control-file" name="reviewerfile"
                                    id="exampleFormControlFile1" accept=".doc, .docx, .pdf">
                            </div>
                            <br>
                            <br>
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <div>

                                </div>
                                <div>
                                    <button class="btn btn-sm btn-info btn-block" name="chief-update"
                                        type="submit">Sent Review</button>
                                </div>
                            </div>
                        </div>
                        <!-- Form Section Ends Here  -->
                </form>
                <!-- Input file section ends here  -->
            </div>
        </div>
    </div>
    <!-- ---------------------------------------------------------------------------------------------------------------------------- -->
    <div class="pb-5"></div>
</div>
</div>

<?php 
     include "../layout/bottomlayout.php";
?>