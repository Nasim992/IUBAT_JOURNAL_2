<?php 
     $TITLE = "Reviewer Status - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAuthorLoggedIn($email,$BASE_URL."layout/login");
     include "../layout/navbar.php";
     $authoremail = $email;
?>

<div id="mySidebar" class="sidebar ">
        <?php  include '../layout/sidebar.php'; ?>
    </div>
    <div id="main">
        <a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
        <a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
        <div class="container">
            <?php display_message(); ?>
            <h6>REVIEWER STATUS</h6>
            <hr class="bg-secondary">
            <div class="table-responsive table-responsive-lg table-responsize-xl table-responsive-sm p-4">
                <table id="dtBasicExample" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th>Paper Id</th>
                            <th>Reviewed</th>
                            <th>Review date</th>
                        </tr>
                    </thead>
                    <tbody id="myTable-admin">
                        <!-- Selecting paper section starts here  -->
                        <?php $sql = "SELECT reviewertable.id,reviewertable.paperid,reviewertable.username,reviewertable.primaryemail,reviewertable.assigndate,reviewertable.action,reviewertable.feedback,reviewertable.feedbackdate,reviewertable.feedbackfile from reviewertable WHERE primaryemail='$authoremail' and feedback IS NOT NULL";
                        $query = $dbh->prepare($sql); 
                        $query->execute(); 
                        $results=$query->fetchAll(PDO::FETCH_OBJ); 
                        $cnt=1; 
                        if($query->rowCount() > 0)  
                        {
                        foreach($results as $result) 
                        {  
                            $paperid = htmlentities($result->paperid);
                            $feedbackfile = htmlentities($result->feedbackfile);
                            ?>
                        <!-- Selecting paper section ends here  -->
                        </td>
                        <td class="text-dark">
                            <?php  echo htmlentities($result->paperid); ?>
                        </td>
                        <td>
                            <?php $feedback = unserialize($result->feedback);
                            for ($x = count($feedback)-1; $x>=0;$x-- ){
                                echo $feedback[$x].'<hr>';
                            } ;?>
                            <?php if(!empty($feedbackfile )){?>
                            <a style="font-size:14px;" class="btn btn-sm btn-info"
                                href="<?php echo '../documents/review/'.$feedbackfile ; ?> " target="_blank"
                                role="button">Feedback file</a>
                            <?php  }  ?>
                        </td>
                        <td class="text-dark">
                            <small>
                                <b>Reviewd On :</b><br>
                                <?php 
                                // Selecting Date section starts here
                                if (!empty(htmlentities($result->feedback)))
                                {
                                    $feedbackdatestring = unserialize($result->feedbackdate);
                                    $maindate = date("d-M-Y",strtotime($feedbackdatestring[count($feedbackdatestring)-1]));
                                    echo $maindate.'<br>';
                                }
                                // Selecting Date section ends here 
                                ?>
                            </small>
                        </td>

                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
            <div class="pb-4"></div>
        </div>
    </div>


<?php
     include "../layout/bottomlayout.php";
?>