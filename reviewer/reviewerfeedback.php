<?php 
     $TITLE = "Feedback - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsReviewerLoggedIn($email,$BASE_URL."layout/login");
     include "../layout/navbar.php";
     $authoremail = $email;
     include "../link/reviewerfeedback.php";
?>
      
          <!-- Author showing header sections ends   -->
    <div id="mySidebar" class="sidebar">
        <?php  include '../layout/sidebar.php'; ?>
    </div>

    <div id="main">
        <a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
        <a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
        <div class="container">

            <!-- ---------------------------------------Reviewer Feedback -------------------------------------------------------- -->
            <h5>REVIEWER FEEDBACK</h5>
            <?php display_message(); ?>
            <hr>
            <!-- Paper SHowing Section Starts Here  -->

            <?php
 
            // Selecting Paper section starts Here
            $sqlreviewerselection = "SELECT paper.id,paper.paperid,paper.authoremail,paper.papername,paper.abstract,paper.name,paper.type,paper.action,paper.numberofcoauthor,paper.pdate,paper.uploaddate,paper.coauthorname,paper.name1,paper.name2 from paper WHERE  paperid='$paperid'";

            $resultreviewerselection = mysqli_query($link,$sqlreviewerselection);

            $filereviewerselection = mysqli_fetch_assoc($resultreviewerselection);

            $id =  $filereviewerselection['paperid'];
            $papername = $filereviewerselection['papername']; 
            $numberofcoauthor = $filereviewerselection['numberofcoauthor'];
            $abstract = $filereviewerselection['abstract'];
            $authoremailpaper = $filereviewerselection['authoremail'];
            $name = $filereviewerselection['name'];
            $filepath1 = '../documents/file1/'.$filereviewerselection['name1']; 
            $filepath2 = '../documents/file2/'.$filereviewerselection['name2']; 
            $type = $filereviewerselection['type'];
            $action = $filereviewerselection['action'];
            $uploaddatestring = $filereviewerselection['uploaddate'];
            $uploaddate =date("d-M-Y",strtotime($uploaddatestring));

            $type = $filereviewerselection['type'];
            $pdate = $filereviewerselection['pdate'];
            $cauname = $filereviewerselection['coauthorname'];

            // Selecting Paper Section Ends Here 
                    
            ?>
            <div class="jumbotron mt-0">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="fontSize14px">Paper ID : <?php echo $id;?></p>
                    </div>
                    <div>
                        <p class="fontSize14px"><b> Status: <?php if ($action!=1) {  ?>
                                <span style="color:goldenrod;">
                                    <?php  echo "Pending";     } else { ?>
                                </span>
                                <span style="color:green;">
                                    <?php   echo "Published on ".$pdate; } ?>
                                </span></b></p>
                    </div>
                </div>

                <h5 class="display-4 fontSize16px"><?php echo $papername;?></h5>
                <p style="font-size:12px"><b>Uploaded On : </b><?php echo $uploaddate; ?></p>

                <p class="fontSize14px"><span style="font-weight:bold">Abstract:</span> <?php echo $abstract;?></p>

                <div class=" d-flex justify-content-between ">
                    <div>
                        <a style="font-size:14px;" class="" href="<?php echo $filepath1 ?> " target="_blank"
                            role="button">Download as doc</a>
                    </div>
                    <div>
                        <a style="font-size:14px;" class="" href="<?php echo $filepath2 ?> " target="_blank" role="button">Download as pdf</a>
                    </div>
                    <div>
                        <p><?php echo $type;?></p>
                    </div>
                </div>
            </div>
            <!-- Paper Showing Section Ends Here  -->

            <hr class="bg-success"> 

            <div class="row">

                <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                    <!-- input file section starts here  -->
                    <form class="author-form" method="post" enctype="multipart/form-data">
                        <div class="">
                            <h1 class="text-center" style="font-size:18px;"><b>Give Review</b></h1>
                            <br>

                            <input type="hidden" id="custId" name="authoremail" value="<?php echo $email ?>">
                            <input type="hidden" id="custId" name="paperid" value="<?php echo  $paperid ?>">

                            <div class="input-group">
                                <label class="col-sm-2 col-form-label" for="formGroupExampleInput"><b>Write Review:</b></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                        name="reviewer-review" rows="5" placeholder="Write a review of this paper"
                                        required></textarea>
                                </div>
                            </div>

                            <div class="input-group">
                                <label class="col-sm-12 col-form-label" for="formGroupExampleInput"><b>Attach Review(If Required):</b></label><br>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control-file" name="reviewerfile"
                                        id="exampleFormControlFile1" accept=".doc, .docx, .pdf">
                                </div>

                                <br>

                                <br>
                                <br>

                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <!-- <a href="upload-paper1.php" role="button"><i class="fa fa-backward" aria-hidden="true"></i>Go back</a> -->
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-success " name="reviewer-submit"
                                            type="submit">Submit</button>
                                    </div>
                                </div>

                            </div>

                            <!-- Form Section Ends Here  -->
                    </form>
                    <!-- Input file section ends here  -->
                </div>

            </div>
            <!-- ---------------------------------------Reviewer Feedback --------------------------------------------------------- -->
        </div> <!-- Container div -->
    </div>


<?php
     include "../layout/bottomlayout.php";
?>