<?php 
     $TITLE = "Profile - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAdminLoggedIn($email,$BASE_URL."layout/login");
     $editoremail = $email;
     include "../layout/navbar.php";
     $authoremail= $_GET['email'];
?>
 <!-- Author showing header sections ends   -->
    <div id="mySidebar" class="sidebar">
        <?php  include '../layout/sidebar.php'; ?>
    </div>

    <div id="main">

<a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
<a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
<div class="container">

    <h5>PROFILE</h5>
    <hr class="bg-secondary">
    <div class="table-responsive p-4">
        <table id="dtBasicExample" class="table table-striped table-bordered table-hover" cellspacing="0">

            <tbody id="myTable-admin">
                <?php $sql = "SELECT author.id,author.username,author.title,author.firstname,author.middlename,author.lastname,author.primaryemail,author.primaryemailcc,author.secondaryemail,author.secondaryemailcc,author.contact,author.address,author.registrationtime,author.reviewerselection,author.associateeditor,author.academiceditor from author WHERE primaryemail='$authoremail'"; 
                        $query = $dbh->prepare($sql); 
                        $query->execute(); 
                        $results=$query->fetchAll(PDO::FETCH_OBJ);  
                        $cnt=1;
                        if($query->rowCount() > 0) 
                        {
                        foreach($results as $result) 
                        { 
                        ?>

                <form class="form-signup marginbtm" method="post">
                    <input type="text" id="txt_username" class="form-control" name="userName"
                        placeholder=" User Name" value="<?php echo htmlentities($result->username);?>" disabled>

                    <input type="text" id="user-name" class="form-control" name="title" required=""
                        placeholder="title" value="<?php echo htmlentities($result->title);?>" disabled>

                    <div class="input-group">

                        <input type="text" id="user-name" class="form-control col-sm-6" name="firstName"
                            placeholder="First Name" required=""
                            value="<?php echo htmlentities($result->firstname);?>" disabled>

                        <input type="text" id="user-name" class="form-control col-sm-6 ml-1" name="middleName"
                            placeholder="Middle Name(Optional)"
                            value="<?php echo htmlentities($result->middlename);?>" disabled>

                        <input type="text" id="user-name" class="form-control col-sm-6 ml-1" name="lastName"
                            placeholder="Last Name" required=""
                            value="<?php echo htmlentities($result->lastname);?>" disabled>

                    </div>

                    <input type="hidden" id="pemail" class="form-control" name="pemail"
                        placeholder="Primary Email Address" required=""
                        value="<?php echo htmlentities($result->primaryemail);?>" disabled>
                    <span><b id="pemail-text"></b></span>

                    <input type="email" id="user-name" class="form-control" name="pemailcc"
                        placeholder="Primary CC Email Address" required=""
                        value="<?php echo htmlentities($result->primaryemailcc);?>" disabled>

                    <input type="email" id="user-name" class="form-control" name="semail"
                        placeholder="Secondary Email Address" required=""
                        value="<?php echo htmlentities($result->secondaryemail);?>" disabled>

                    <input type="email" id="user-name" class="form-control" name="semailcc"
                        placeholder="Secondary CC Email Address" required=""
                        value="<?php echo htmlentities($result->secondaryemailcc);?>" disabled>

                    <input type="text" id="user-contact" name="user-contact" class="form-control"
                        placeholder="Contact Number" required
                        value="<?php echo htmlentities($result->contact);?>" disabled>

                    <input type="text" id="user-address" name="user-address" class="form-control"
                        placeholder="Address" required value="<?php echo htmlentities($result->address);?>"
                        disabled>

                    <input type="text" id="user-contact" name="user-contact" class="form-control"
                        placeholder="Contact Number" required
                        value="<?php echo htmlentities($result->registrationtime);?>" disabled>

                </form>

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