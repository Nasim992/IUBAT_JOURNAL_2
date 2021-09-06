<?php 
     $TITLE = "Dashboard - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsReviewerLoggedIn($email,$BASE_URL."layout/login");
     include "../layout/navbar.php";
     $authoremail = $email;
     
        // Select paper id from reviewertable section starts here
        $sql = "SELECT reviewertable.id,reviewertable.paperid,reviewertable.username,reviewertable.feedback from reviewertable Where primaryemail='$authoremail' and feedback IS NULL and accepted IS NOT NULL";
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
        // Select Paper id From reviewertable section ends here
?>
      
          <!-- Author showing header sections ends   -->
    <div id="mySidebar" class="sidebar">
        <?php  include '../layout/sidebar.php'; ?>
    </div>


    <div id="main">

        <a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
        <a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
        <div class="container">

            <h5>ASSIGNED PAPER</h5>
            <hr class="bg-secondary">

            <div class="table-responsive">
                <table id="dtBasicExample" cellspacing="0">

                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                    <!-- Author paper showing section starts (Jumbotron section) -->
                    <tbody id="myTable">
                        <?php 
                        foreach ($arraypaperidreviewer  as $pid) {
                            $sqlreviewerselection = "SELECT paper.id,paper.paperid,paper.authoremail,paper.papername,paper.abstract,paper.name,paper.type,paper.action,paper.numberofcoauthor,paper.pdate,paper.uploaddate,paper.coauthorname,paper.name2,paper.name1,paper.resubmitpaper from paper WHERE  action=0 and paperid='$pid'"; 
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
                            $action = $filereviewerselection['action'];
                            $uploaddatestring = $filereviewerselection['uploaddate'];
                            $uploaddate = date("d-M-Y",strtotime($uploaddatestring));
                            $type = $filereviewerselection['type'];
                            $pdatestring = $filereviewerselection['pdate'];
                            $pdate = date("d-M-Y",strtotime($pdatestring));
                            $cauname = $filereviewerselection['coauthorname'];
                            ?>
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
                                            <p class="fontSize14px"><b> Status: <?php if ($action!=1) { ?>
                                                    <span style="color:goldenrod;">
                                                        <?php  echo "Pending"; } else { ?>
                                                    </span>
                                                    <span style="color:green;">
                                                        <?php echo "Published on ".$pdate; }?>
                                                    </span></b></p>
                                        </div>
                                    </div>

                                    <h5 class="display-4 fontSize16px"><?php echo $papername;?></h5>
                                    <p style="font-size:12px"><b>Uploaded On : </b><?php echo $uploaddate; ?></p>


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
                                        <?php }?>
                                        <div>
                                            <form action='reviewerfeedback' method='post'>
                                                <input type="hidden" name="paperid" value="<?php echo $id;?>">

                                                <input class="text-danger"
                                                    style="font-size:15px;border:none;font-weight:600;background-color:white;"
                                                    type="submit" name="reviewer-feedbacks" value="Write a Feedback">
                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                            </td>
            </div>
            </tr>
            <!-- DashBoard Section ends  -->
            <?php  }?>
            </tbody>
            </table>
            <!-- Authors paper showing section ends (jumbotron section) -->
            <div class="pb-4"></div>
        </div>
    </div>
    </div>

<?php
     include "../layout/bottomlayout.php";
?>