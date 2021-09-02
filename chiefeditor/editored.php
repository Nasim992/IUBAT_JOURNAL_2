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
    <!-- Associate Editor showing section starts here  -->
    <h6>ASSOCIATE EDITORED PAPER</h6>
    <hr class="bg-secondary">
    <div class="table-responsive table-responsive-lg table-responsize-xl table-responsive-sm p-4">
        <table id="dtBasicExample" class="table table-striped table-bordered table-hover">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Paper id</th>
                    <th>Editor Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody id="myTable-admin">
                <?php $sql = "SELECT editortable.id,editortable.paperid,editortable.username,editortable.primaryemail,editortable.assigndate,editortable.endingdate,editortable.action,editortable.associateeditor from editortable where  associateeditor IS NOT NULL";
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
                        $username = htmlentities($result->username);
                        $sql1 = "SELECT * FROM author WHERE  username='$username' ";

                        $result1 = mysqli_query($link,$sql1); 

                        $file1 = mysqli_fetch_assoc($result1);
                        
                        $title = $file1['title'];
                        $fname= $file1['firstname'];
                        $middlename= $file1['middlename'];
                        $lastname= $file1['lastname'];

                        $authorname = $title.' '.$fname.' '.$middlename.' ' .$lastname;

                            ?>

                    <td><?php echo $authorname;?></td>
                    <td><?php echo htmlentities($result->primaryemail);?></td>
                </tr>
                <?php $cnt=$cnt+1;}} ?>
            </tbody>
        </table>
    </div>
    <!-- Associate Editor Showing section ends here  -->

    <!-- Academic Editor Showing Section starts here  -->
    <h6>ACADEMIC EDITORED PAPER</h6>
    <hr class="bg-secondary">
    <div class="table-responsive table-responsive-lg table-responsize-xl table-responsive-sm p-4">
        <table id="dtBasicExample1" class="table table-striped table-bordered table-hover">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Paper id</th>
                    <th>Editor Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody id="myTable-admin1">
                <?php $sql = "SELECT editortable.id,editortable.paperid,editortable.username,editortable.primaryemail,editortable.assigndate,editortable.endingdate,editortable.action,editortable.associateeditor,editortable.academiceditor from editortable where academiceditor IS NOT NULL"; 
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
                        $username = htmlentities($result->username);
                        $sql1 = "SELECT * FROM author WHERE  username='$username' ";

                        $result1 = mysqli_query($link,$sql1); 

                        $file1 = mysqli_fetch_assoc($result1);
                        
                        $title = $file1['title'];
                        $fname= $file1['firstname'];
                        $middlename= $file1['middlename'];
                        $lastname= $file1['lastname'];

                        $authorname = $title.' '.$fname.' '.$middlename.' ' .$lastname;

                        $datedatabase = htmlentities($result->assigndate);
                        $date = date("d-M-Y",strtotime($datedatabase)); 
                        $endingdate = htmlentities($result->endingdate);
                        $edate = date("d-M-Y",strtotime($endingdate)); 
                            ?>

                    <td><?php echo $authorname;?></td>
                    <td><?php echo htmlentities($result->primaryemail);?></td>

                </tr>
                <?php $cnt=$cnt+1;}} ?>
            </tbody>
        </table>
    </div>
    <!-- Academic Editor Showing Section Ends Here  -->

    <div class="mb-5"></div>
</div>
</div>

<!-- Authors showing section ends here  -->


</div>


<?php
     include "../layout/bottomlayout.php";
?>