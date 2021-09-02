<?php 
     $TITLE = "Paper Details - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAuthorLoggedIn($email,$BASE_URL."layout/login");
     include "../layout/navbar.php";
     $authoremail = $email;
     include "../link/paperdetails.php";
?>
<head>
<style>
    button[type="submit"]:hover {
        background-color: none !important;
    }

    #edittitleandabstractsection {
        display: none;
    }

    .indexform button {
        padding: 0 !important;
        margin: 0 !important;
    }

    .indexform button:hover {
        color: #0b4953 !important;
    }
    </style>
</head>


<div id="mySidebar" class="sidebar">
        <?php include '../layout/sidebar.php'; ?>
    </div>

    <div id="main">
        <a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
        <a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
        <div class="container">

            <h6>PAPER DETAILS</h6>
            <hr class="bg-secondary">

            <div class="jumbotron">
                <h5 style="font-size:18px" class="display-4">Name : <?php echo $papername ?></h5>
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 style="font-size:15px;" class="display-5">Paper ID:<span style='color:#122916;'>
                                <?php echo $id; ?></span></h6>
                    </div>
                    <div>
                        <b>
                            <p>Status: <span class="text-success"><?php echo $status; ?></span></p>
                        </b>
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
                    <div>
                        <h6 style="font-size:15px;" class="display-5">Reviewer:<span style='color:#122916;'> <small>

                                    <!-- Show Reviewer Selection section starts Here  -->
                                    <?php
                                     if(empty($arrayusernamereviewershowing)) { echo "Not Selected Yet!";}
                                    foreach($arrayusernamereviewershowing  as $arrpap){
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

                <p style="font-size:14px"><b>Abstract: </b><?php echo $abstract ?></p>
                <hr>
                <!-- --------------Edit paper title and abstarct section  starts here-------------------------  -->
                <div id="edittitleandabstractsection"
                    style="border:2px solid #e3e3e3;  padding:10px;margin-top:5px;border-radius:10px;">
                    <br>

                    <form method="post">

                        <input type="hidden" id="custId" name="paperid" value="<?php echo  $id ?>">

                        <div class="input-group">
                            <label class="col-sm-2 col-form-label" for="formGroupExampleInput"><b>paper
                                    name:</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="exampleFormControlTextarea1"
                                    name="papername-update" value="<?php echo  $papername; ?>" required>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <label class="col-sm-2 col-form-label" for="formGroupExampleInput"><b>Abstract:</b></label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="abstract-update"
                                    rows="5" required><?php echo  $abstract; ?></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-between">
                            <div>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-info btn-block mr-4" name="paper-update"
                                    type="submit">Update</button>
                            </div>
                        </div>

                    </form>
                    <br>
                </div>
                <!-- --------------Edit paper title and abstract section ends here  -------------------------- -->
                <br>
                <div class="row">
                    <div class="col-sm-4 col-lg-3 col-md-3 col-xl-3">
                        <?php  if($action!=1)  { ?>
                        <button title="Edit" onclick="handleeditsection()" class="btn btn-sm btn-info"><i class="fas fa-edit" title="Edit paper"></i></button>
                        <?php  }?>
                        <script>
                        function handleeditsection() {
                            document.getElementById("edittitleandabstractsection").style.display = "block";
                        }
                        </script>
                    </div>


                    <div class="col-sm-4 col-lg-3 col-md-3 col-xl-3">
                        <form method="post">
                            <input type="hidden" name="paperiddelete" value="<?php echo $id; ?>">
                            <input type="hidden" name="filepathtitle" value="<?php echo $filepathtitle; ?>">
                            <input type="hidden" name="filepathsecond" value="<?php echo $filepathsecond; ?>">
                            <input type="hidden" name="filepath" value="<?php echo $filepath; ?>">
                            <input type="hidden" name="filepathresubmit" value="<?php echo $filepathresubmit; ?>">

                            <button type="submit" title="Delete" class="btn btn-sm btn-danger" name="deletepaper"
                                onclick="return confirm('Are you sure you want Delete this paper?');"><i
                                    class="fas fa-trash-alt" title="Delete"></i></button>
                        </form>
                    </div>

                </div>
                <!-- File Section starts here  -->
                <hr>
                <!-- Resubmit paper section starts here  -->
                <?php if($action==1) { ?>
                <form class="author-form" method="post" enctype="multipart/form-data">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="input-group">
                            <label class="col-sm-6 col-form-label" for="formGroupExampleInput"><b>Resubmit paper
                                    :</b></label>
                            <div class="col-sm-6">
                                <input type="hidden" name="resubmit-paperid" value="<?php echo $id;?>">
                                <input type="file" class="form-control-file" name="fileresubmit"
                                    id="exampleFormControlFile1" accept="application/pdf" required disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-xl-6">
                            </div>
                            <?php if(empty($fileresubmitdate )) { ?>
                            <div class="col-sm-2 col-lg-2 col-xl-2">
                                <button class="btn btn-sm btn-info" name="resubmit" type="submit"
                                    disabled>Submit</button>
                            </div>
                            <?php } else {?>
                            <div class="col-sm-2 col-lg-2 col-xl-2">
                                <button class="btn btn-sm btn-info" name="resubmit" type="submit"
                                    disabled>Submit</button>
                            </div>
                            <?php } ?>
                        </div>
                </form>
                <?php } else { ?>
                <form class="author-form" method="post" enctype="multipart/form-data">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="input-group">
                            <label class="col-sm-6 col-form-label" for="formGroupExampleInput"><b>Resubmit paper
                                    :</b></label>
                            <div class="col-sm-6">
                                <input type="hidden" name="resubmit-paperid" value="<?php echo $id;?>">
                                <input type="file" class="form-control-file" name="fileresubmit"
                                    id="exampleFormControlFile1" accept="application/pdf" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 col-xl-6">
                            </div>

                            <div class="col-sm-2 col-lg-2 col-xl-2">
                                <button class="btn btn-sm btn-info" name="resubmit" type="submit">Submit</button>
                            </div>

                        </div>
                </form>
                <?php  } ?>
                <!-- Resubmit paper section ends here  -->

                <hr class="bg-success">
                <h6><small><b>Uploaded Files:</b></small></h6>
                <div class="row">
                    <?php if(!empty($filename1)) { ?>
                    <div class="col-sm-12 col-lg-3 col-md-3 col-xl-3">
                        Full Manuscript as doc: <a style="font-size:13px;" title="Title and Abstract" class=""
                            href="<?php echo $filepathtitle;?> " target="_blank"
                            role="button"><?php echo $filename1;  ?></a>
                    </div>
                    <?php } ?>

                    <?php if(!empty($filename2)) { ?>
                    <div class="col-sm-12 col-lg-4 col-md-6 col-xl-4">
                        Full Manuscript as pdf: <a style="font-size:13px;" title="Download this paper" class=""
                            href="<?php echo $filepathsecond;?> " target="_blank"
                            role="button"><?php echo $filename2; ?></a>
                    </div>
                    <?php } ?>

                    <?php if(!empty($filename)) { ?>
                    <div class="col-sm-12 col-lg-4 col-md-6 col-xl-4">
                        Necessary Info: <a style="font-size:13px;" title="Download this paper" class=""
                            href="<?php echo $filepath ?> " target="_blank" role="button"><?php echo $filename;  ?></a>
                    </div>
                    <?php } ?>

                    <?php if(!empty($filepathresubmitname)) { ?>
                    <div class="col-sm-12 col-lg-4 col-md-6 col-xl-4">
                        Resubmitted paper: <a style="font-size:13px;" title="Download this paper" class=""
                            href="<?php echo $filepathresubmit ?> " target="_blank"
                            role="button"><?php echo $filepathresubmitname;  ?></a>
                    </div>
                    <?php } ?>

                </div>
                <!-- File Section Ends Here  -->
            </div>
            <hr class="bg-success">

            <!-- ------------------------------------------Feedback Timeline------------------------------------------------------------ -->
            <p><b class="text-info">Feedback timeline:</b></p>
            <?php 
              // Selet chiefeditor feedback 
              $sqlchief= "SELECT * from chieffeedback WHERE  paperid='$id'";
              $resultchief = mysqli_query($link,$sqlchief );
              $filechief = mysqli_fetch_assoc($resultchief);
              $feedbackchief = $filechief['feedback']; 
              $feedbackchieffile = $filechief['file']; 
              $feedbackchiefdatestring = $filechief['date']; 
              $feedbackchiefdate = date('d-M-Y',strtotime($feedbackchiefdatestring));
              $feedbackfilechiefpath = '../documents/review/'.$feedbackchieffile;
              // Select Chiefeditor feedback 
            ?>
            <?php if(!empty($feedbackchief)) {?>
            <!-- ChiefEditor Feedback Showing  -->
            <div style="border:2px solid #e3e3e3;  padding:10px;margin-top:5px;border-radius:10px;">
                <p><?php echo $feedbackchief; ?></p>
                <div class="d-flex justify-content-between">
                    <div>
                        <p><b>Reviewed on: </b><small><?php echo $feedbackchiefdate; ?></small></p>
                    </div>
                    <div>
                        <p>- <small>Prof.Dr.Monjurul Islam</small></p>
                    </div>
                </div>
                <?php if(!empty($feedbackchieffile)){?>
                <a style="font-size:14px;" class="btn btn-sm btn-info" href="<?php echo $feedbackfilechiefpath; ?> "
                    target="_blank" role="button">Feedback file</a>
                <?php  }  ?>
            </div>
            <!-- Chief Editor Feedback Showing -->
            <?php  }  ?>

            <?php
              // Select Reviewer  feedback 
              $primaryemailreviewertable = array();
              $sqlreviewer = "SELECT primaryemail FROM reviewertable WHERE paperid = '$id'";
              $resultreviewer = mysqli_query($link, $sqlreviewer);
              $filereviewer = mysqli_fetch_assoc($resultreviewer);
              foreach( $resultreviewer as $filerev) {
              array_push($primaryemailreviewertable,$filerev['primaryemail']);
              }
              for ($i = 0; $i <count($primaryemailreviewertable); $i++) {
              $sqlreviewerfeedbacks = "SELECT * from reviewertable WHERE  paperid='$id' and primaryemail='$primaryemailreviewertable[$i]' and permits=1 ";
          
              $resultreviewerupdates = mysqli_query($link, $sqlreviewerfeedbacks);
              $filereviewerupdates = mysqli_fetch_assoc($resultreviewerupdates);
              $feedbackfilereviewer = $filereviewerupdates['feedbackfile']; 
              $feedbackfilepathreviewer = '../documents/review/'.$fileeditorupdate['feedbackfile'];
              $feedbackreviewer =  unserialize($filereviewerupdates['feedback']); 
              $feedbackdatereviewer = unserialize($filereviewerupdates['feedbackdate']);
              $authoremail = $filereviewerupdates['primaryemail'];  
              // Select Reviewer Feedback 

              // Select authorname 
              $sqlauthorernam = "SELECT * FROM author WHERE  primaryemail= '$primaryemailreviewertable[$i]' ";
              $resultauthorernam = mysqli_query($link,$sqlauthorernam);  
              $fileauthorername = mysqli_fetch_assoc($resultauthorernam);
              $title = $fileauthorername['title'];
              $fname= $fileauthorername['firstname'];
              $middlename= $fileauthorername['middlename'];
              $lastname= $fileauthorername['lastname'];
              $authorname = $title.' '.$fname.' '.$middlename.' ' .$lastname;
              // Select Author name 
              for ($x = count($feedbackreviewer)-1; $x >=0 ; $x--) {
                $datereviewer = date('d-M-Y',strtotime($feedbackdatereviewer[$x]));
                ?>
                      <div style="border:2px solid #e3e3e3;  padding:10px;margin-top:5px;border-radius:10px;">
                          <p><?php echo $feedbackreviewer[$x]; ?></p>
                          <div class="d-flex justify-content-between">
                              <div>
                                  <p><b>Reviewed on: </b><small><?php echo $datereviewer ;?></small></p>
                              </div>
                              <div>
                                  <p>- <small><?php  echo $authorname;?></small></p>
                              </div>
                          </div>

                          <?php if(!empty($feedbackreviewer )){?>
                          <a style="font-size:14px;" class="btn btn-sm btn-info" href="<?php echo $feedbackfilepathreviewer ; ?> "
                              target="_blank" role="button">Feedback file</a>
                          <?php  }  ?>
                      </div>
                      <?php
                  }
                  }
                ?>
            <?php
                // Select editor feedback 
                $primaryemaileditortable = array();
                $sqlassociateeditor = "SELECT primaryemail FROM editortable WHERE paperid = '$id'";
                $resultassociateeditor = mysqli_query($link,$sqlassociateeditor);
                $fileassociateeditor = mysqli_fetch_assoc($resultassociateeditor);
                foreach($resultassociateeditor as $filerev) {
                array_push($primaryemaileditortable,$filerev['primaryemail']);
                }
                for ($i = 0; $i <count($primaryemaileditortable); $i++) {
                $sqlreditorfeedback = "SELECT * from editortable WHERE  paperid='$id' and primaryemail='$primaryemaileditortable[$i]'";
                $resulteditorupdate = mysqli_query($link, $sqlreditorfeedback);
                $fileeditorupdate = mysqli_fetch_assoc($resulteditorupdate);
                $feedbackfileeditor = $fileeditorupdate['feedbackfile']; 
                $feedbackfilepatheditor = '../documents/review/'.$fileeditorupdate['feedbackfile']; 
                $feedbackeditor =  unserialize($fileeditorupdate['feedback']); 
                $feedbackdateeditor = unserialize($fileeditorupdate['feedbackdate']);
                $authoremail = $fileeditorupdate['primaryemail'];  
                // select Authorname
                $sqlauthorernam = "SELECT * FROM author WHERE  primaryemail= '$primaryemaileditortable[$i]' ";
                  $resultauthorernam = mysqli_query($link,$sqlauthorernam);  
                  $fileauthorername = mysqli_fetch_assoc($resultauthorernam);
                  $title = $fileauthorername['title'];
                  $fname= $fileauthorername['firstname'];
                  $middlename= $fileauthorername['middlename'];
                  $lastname= $fileauthorername['lastname'];
                  $authorname = $title.' '.$fname.' '.$middlename.' ' .$lastname;
                // Select Authorname
                $revauthorname = $authorname;
                for ($x = count($feedbackeditor)-1; $x >=0 ; $x--) {
                  $dateeditor = date('d-M-Y',strtotime($feedbackdateeditor[$x]));
                  ?>
                        <div style="border:2px solid #e3e3e3;  padding:10px;margin-top:5px;border-radius:10px;">
                            <p><?php echo $feedbackeditor[$x]; ?></p>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p><b>Reviewed on: </b><small><?php echo $dateeditor;?></small></p>
                                </div>
                                <div>
                                    <p>- <small><?php echo $revauthorname; ?></small></p>
                                </div>
                            </div>

                            <?php if(!empty($feedbackfileeditor )){?>
                            <a style="font-size:14px;" class="btn btn-sm btn-info" href="<?php echo $feedbackfilepatheditor; ?> "
                                target="_blank" role="button">Feedback file</a>
                            <?php  }  ?>
                        </div>
                        <?php
                }
                }

              ?>
            <!-- Review Showing Section starts here  -->

            <br>

            <!-- ------------------------------------------Feedback Timeline------------------------------------------------------------ -->
            <div class="pb-5"></div>

        </div>
    </div>


<?php
     include "../layout/bottomlayout.php";
?>