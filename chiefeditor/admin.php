<?php 
     $TITLE = "Admin Information - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsChiefEditorLoggedIn($email,$BASE_URL."layout/login");
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
            <h4>ADMIN</h4>
            <hr class="bg-secondary">
            <div class="table-responsive table-responsive-lg table-responsize-xl table-responsive-sm p-4">
                <table id="dtBasicExample" class="table table-striped table-bordered table-hover">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>id</th>
                            <th>Admin Name</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Contact Address</th>
                        </tr>
                    </thead>

                    <tbody id="myTable-admin">
                        <?php $sql = "SELECT admin.id,admin.username,admin.fullname,admin.email,admin.contact  from admin";
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
                            <td class="result-color1"><?php echo htmlentities($result->id);?></td>
                            <td><?php echo htmlentities($result->username);?></td>
                            <td><a href="#"><?php echo htmlentities($result->fullname);?></a></td>
                            <td><?php echo htmlentities($result->email);?></td>
                            <td><?php echo htmlentities($result->contact);?></td>
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