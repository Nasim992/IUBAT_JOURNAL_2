<?php 
     $TITLE = "Editor Feedback - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAssociateEditorLoggedIn($email,$BASE_URL."layout/login");
     include "../layout/navbar.php";
     $authoremail = $email;
     include '../link/efeedback.php'; 
?>

<div id="mySidebar" class="sidebar">
    <?php include '../layout/sidebar.php'; ?>
</div>

<div id="main">

<a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
<a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
<div class="container">

    <!-- --------------------------------------Reviewer Feedback Section -------------------------------------------------- -->
    <h6>EDITOR FEEDBACK</h6>
    <hr class="bg-secondary">
    <div class="table-responsive table-responsive-lg table-responsize-xl table-responsive-sm">
        <table id="dtBasicExample" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Paper id</th>
                    <th>Editor Name</th>
                    <th>Feedback</th>
                    <th>Date</th>
                    <!-- <th >Actions</th> -->
                </tr>
            </thead>

            <tbody id="myTable-admin">
                <?php $sql = "SELECT editortable.id,editortable.paperid,editortable.username,editortable.primaryemail,editortable.assigndate,editortable.action,editortable.feedback,editortable.feedbackfile,editortable.feedbackdate from editortable where action IS NULL";
                    $query = $dbh->prepare($sql); 
                    $query->execute(); 
                    $results=$query->fetchAll(PDO::FETCH_OBJ); 
                    $cnt=1;
                    if($query->rowCount() > 0) 
                    {
                    foreach($results as $result)  
                    {  
                    
                    $feedbackfilename = htmlentities($result->feedbackfile);

                    $feedbackfilepath = '../documents/review/'.$feedbackfilename;

                    $paperid = htmlentities($result->paperid);
                    
                    $feedbackdate = htmlentities($result->feedbackdate);
                    $reviewertablemail = htmlentities($result->primaryemail);
                    ?>
                <tr>
                    <td><?php echo htmlentities($cnt);?></td>
                    <td class="result-color1"><?php echo htmlentities($result->paperid);?></td>

                    <?php 
                        $username = htmlentities($result->username);
                        $sql1 = "SELECT * FROM author WHERE  username='$username' ";

                        $result1 = mysqli_query($link,$sql1); 

                        $file1 = mysqli_fetch_assoc($result1);
                        
                        $title = $file1['title'];
                        $fname= $file1['firstname'];
                        $middlename= $file1['middlename']; 
                        $lastname= $file1['lastname'];

                        $authorname = $title.' '.$fname.' '.$middlename.' ' .$lastname;

                        $fdate = htmlentities($result->feedbackdate);

                        $fddate = date("d-M-Y",strtotime($fdate ));

                        
                        // Selecting paperauthor email section starts here 
                        $sqlpaper = "SELECT * FROM paper WHERE  paperid='$paperid' ";

                        $resultpaper = mysqli_query($link,$sqlpaper ); 

                        $filepaper = mysqli_fetch_assoc($resultpaper );

                        $primaryemailauthor = $filepaper['authoremail'];

                        // Selecting paperauthor email section ends here 
                    ?>

                    <td><?php echo $authorname;?></td>
                    <td><?php
    
                        // Reviewer Selection section starts here 
                        $sqlreviewerupdate = "SELECT * from editortable WHERE  paperid='$paperid' and primaryemail='$reviewertablemail '";

                        $resultreviewerupdate = mysqli_query($link,$sqlreviewerupdate);

                        $filereviewerupdate = mysqli_fetch_assoc($resultreviewerupdate);

                        $feedbackfile = $filereviewerupdate['feedbackfile']; 

                        $feedbackfilepath = '../documents/review/'.$filereviewerupdate['feedbackfile'];

                        $feedback =  unserialize($filereviewerupdate['feedback']);
                        $feedbackdate = unserialize($filereviewerupdate['feedbackdate']);

                        foreach ($feedback as $fd) {
                            echo $fd.'<hr>';
                        }


                        // Reviewer Selection ends here 
                                ?>
                        <br>
                        <a style="font-size:13px;" title="Reviewer Feedback File" class=""
                            href="<?php echo $feedbackfilepath; ?> " target="_blank"
                            role="button"><?php echo $feedbackfilename;  ?></a>
                    </td>
                    <td>
                        <?php 
                            if (!empty($feedbackdate)) {
                            echo date('d-M-Y',strtotime($feedbackdate[0]));
                            }
                            
                            ?>
                    </td>
                </tr>
                <?php $cnt=$cnt+1;}} ?>
            </tbody>
        </table>

    </div>
    <!-- --------------------------------------Reviewer Feedback Section -------------------------------------------------- -->

    <div class="mb-5"></div>
</div>
</div>
<!-- Authors showing section ends here  -->
</div>
 

<?php
     include "../layout/bottomlayout.php";
?>