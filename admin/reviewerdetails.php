<?php 
     $TITLE = "Admin Information - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAdminLoggedIn($email,$BASE_URL."layout/login");
     $editoremail = $email;
     include "../layout/navbar.php";
     $results = all_by_SPECIFIC_ID($CHIEFEDITOR_DB,"email",$editoremail);
?>

<div id="mySidebar" class="sidebar">
        <?php  include '../layout/sidebar.php'; ?>
</div>

<div id="main">
        <a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
        <a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
        <div class="container">
        <?php echo display_message(); ?>
            <h5>REVIEWER DETAILS</h5>
            <hr class="bg-secondary">
            <div class="table-responsive table-responsive-lg table-responsize-xl table-responsive-sm p-4">
                <table id="dtBasicExample" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Paper id</th>
                            <th>Reviewer Name</th>
                            <th>Email</th>
                            <th>Assign Date</th>
                            <th>Ending Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody id="myTable-admin">
                        <?php $sql = "SELECT reviewertable.id,reviewertable.paperid,reviewertable.username,reviewertable.primaryemail,reviewertable.assigndate,reviewertable.endingdate,reviewertable.action from reviewertable where action IS NULL";
                                $query = $dbh->prepare($sql); 
                                $query->execute(); 
                                $results=$query->fetchAll(PDO::FETCH_OBJ); 
                                $cnt=1;
                                if($query->rowCount() > 0) 
                                {
                                foreach($results as $result) 
                                {   ?>
                        <tr>
                            <td><?php echo htmlentities($cnt);?></td>
                            <td class="result-color1"><?php echo htmlentities($result->paperid);?></td>

                            <?php 
                                $primaryemail = htmlentities($result->primaryemail);
                                include '../link/linklocal.php';
                                $sql1 = "SELECT * FROM author WHERE  primaryemail='$primaryemail' ";

                                $result1 = mysqli_query($link,$sql1); 

                                $file1 = mysqli_fetch_assoc($result1);
                                
                                $title = $file1['title'];
                                $fname= $file1['firstname'];
                                $middlename= $file1['middlename'];
                                $lastname= $file1['lastname'];

                                $authorname = $title.' '.$fname.' '.$middlename.' ' .$lastname;

                                $assigndate = htmlentities($result->assigndate);
                                $endingdatestring = htmlentities($result->endingdate);
                                $date = date("d-M-Y",strtotime($assigndate));
                                $endingdate = date("d-M-Y",strtotime($endingdatestring));
                                    ?>
                            <td><?php echo $authorname;?></td>
                            <td><?php echo htmlentities($result->primaryemail);?></td>
                            <td><?php echo $date?></td>
                            <td><?php echo $endingdate?></td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="paperid"
                                        value="<?php echo htmlentities($result->paperid);?>">
                                    <input type="hidden" name="primaryemail" value="<?php echo $primaryemail?>">
                                    <input class="text-danger"
                                        onclick="return confirm('Are you sure you want to remove reviewer for this paper?');"
                                        style="font-size:18px;border:none;font-weight:600;background-color:transparent;"
                                        type="submit" name="reviewer-remove" value="x">
                                </form>

                            </td>
                        </tr>
                        <?php $cnt=$cnt+1;}} ?>
                    </tbody>
                </table>
            </div>
            <div class="mb-5"></div>
        </div>
    </div>
    <!-- Authors showing section ends here  -->
    </div>

<?php
     include "../layout/bottomlayout.php";
?>