<?php 
     $TITLE = "Author Details - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAssociateEditorLoggedIn($email,$BASE_URL."layout/login");
     include "../layout/navbar.php";
     $authoremail = $email;
     include '../link/editordetails.php'; 
?>

<div id="mySidebar" class="sidebar">
        <?php include '../layout/sidebar.php'; ?>
    </div>
    <div id="main">

<a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
<a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
<div class="container">


    <!-- Academic Editor Showing Section starts here  -->
    <h6>ACADEMIC EDITOR PAPER DETAILS</h6>
    <hr class="bg-secondary">
    <div class="table-responsive table-responsive-lg table-responsize-xl table-responsive-sm p-4">
        <table id="dtBasicExample1" class="table table-striped table-bordered table-hover">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Paper id</th>
                    <th>Editor Name</th>
                    <th>Email</th>
                    <th>Assign Date</th>
                    <th>Ending date</th>

                </tr>
            </thead>
            <tbody id="myTable-admin1">
                <?php $sql = "SELECT editortable.id,editortable.paperid,editortable.username,editortable.primaryemail,editortable.assigndate,editortable.endingdate,editortable.action,editortable.associateeditor,editortable.academiceditor from editortable where action IS NULL and academiceditor IS NOT NULL"; 
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
                    <td><?php echo $date;?></td>
                    <td><?php echo $edate;?></td>
                </tr>
                <?php $cnt=$cnt+1;}} ?>
            </tbody>
        </table>
    </div>
    <!-- Academic Editor Showing Section Ends Here  -->

    <div class="mb-5"></div>
</div>
</div>
 

<?php
     include "../layout/bottomlayout.php";
?>