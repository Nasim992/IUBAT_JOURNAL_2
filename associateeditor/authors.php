<?php 
     $TITLE = "Author Details - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAssociateEditorLoggedIn($email,$BASE_URL."layout/login");
     include "../layout/navbar.php";
     $authoremail = $email;
     include "../link/paperdetails.php";
?>

<div id="mySidebar" class="sidebar">
        <?php include '../layout/sidebar.php'; ?>
    </div>

    <div id="main">

<a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
<a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
<div class="container">

    <h6>AUTHOR</h6>
    <hr class="bg-secondary">
    <div class="table-responsive p-4">

        <table id="dtBasicExample" class="table table-striped table-bordered table-hover" cellspacing="0">

            <thead>
                <tr>
                    <th>UserName</th>
                    <th>FullName</th>
                    <th>Primary Email</th>
                    <th>Registration Time</th>
                </tr>
            </thead>

            <tbody id="myTable-admin">
                <?php $sql = "SELECT author.id,author.username,author.title,author.firstname,author.middlename,author.lastname,author.primaryemail,author.primaryemailcc,author.secondaryemail,author.secondaryemailcc,author.contact,author.address,author.registrationtime,author.reviewerselection,author.associateeditor,author.academiceditor from author WHERE associateeditor IS NULL and academiceditor IS NULL";
                        $query = $dbh->prepare($sql); 
                        $query->execute(); 
                        $results=$query->fetchAll(PDO::FETCH_OBJ);  
                        $cnt=1;
                        if($query->rowCount() > 0) 
                        {
                        foreach($results as $result) 
                        {   ?>
                <tr>
                    <td><?php echo htmlentities($result->username);?></td>
                    <td><?php echo htmlentities($result->title).' '.htmlentities($result->firstname).' '.htmlentities($result->middlename).' '.htmlentities($result->lastname);?>
                    </td>
                    <td><?php echo htmlentities($result->primaryemail);?></td>

                    <td><?php echo htmlentities($result->registrationtime);?></td>

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