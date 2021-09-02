<?php 
     $TITLE = "Update Profile - IUBAT Review";
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
        <!-- <a href="#"><span class="resbtn"onclick="openNav()" id="closesign">☰</span></a> -->
        <a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
        <a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
        <div class="container">
            
            <?php display_message(); ?>

            <h6>AUTHOR PROFILE</h6>
            <hr class="bg-success">
            <!-- Update Profile section starts here  -->
            <?php
            $sql = "SELECT author.id,author.username,author.title,author.firstname,author.middlename,author.lastname,author.primaryemail,author.primaryemailcc,author.secondaryemail,author.secondaryemailcc,author.contact,author.address,author.password from author where primaryemail='$authoremail'"; 
            $query = $dbh->prepare($sql); 
            $query->execute(); 
            $resultsauthor=$query->fetchAll(PDO::FETCH_OBJ);
            
            foreach($resultsauthor as $result) {   ?>
            <form class="form-signup marginbtm" action="../link/updateprofile.php" method="post">
                <input type="text" id="txt_username" class="form-control" name="userName" placeholder=" User Name"
                    value="<?php echo htmlentities($result->username);?>" disabled>
                <span><b id="uname_response"></b></span>

                <input type="text" id="user-name" class="form-control" name="title" required="" placeholder="title"
                    value="<?php echo htmlentities($result->title);?>">

                <div class="input-group">

                    <input type="text" id="user-name" class="form-control col-sm-6" name="firstName"
                        placeholder="First Name" required="" value="<?php echo htmlentities($result->firstname);?>">

                    <input type="text" id="user-name" class="form-control col-sm-6 ml-1" name="middleName"
                        placeholder="Middle Name(Optional)" value="<?php echo htmlentities($result->middlename);?>">

                    <input type="text" id="user-name" class="form-control col-sm-6 ml-1" name="lastName"
                        placeholder="Last Name" required="" value="<?php echo htmlentities($result->lastname);?>">

                </div>

                <input type="hidden" id="pemail" class="form-control" name="pemail" placeholder="Primary Email Address"
                    required="" value="<?php echo htmlentities($result->primaryemail);?>">
                <span><b id="pemail-text"></b></span>

                <input type="email" id="user-name" class="form-control" name="pemailcc"
                    placeholder="Primary CC Email Address" required=""
                    value="<?php echo htmlentities($result->primaryemailcc);?>">

                <input type="email" id="user-name" class="form-control" name="semail"
                    placeholder="Secondary Email Address" required=""
                    value="<?php echo htmlentities($result->secondaryemail);?>">

                <input type="email" id="user-name" class="form-control" name="semailcc"
                    placeholder="Secondary CC Email Address" required=""
                    value="<?php echo htmlentities($result->secondaryemailcc);?>">


                <input type="text" id="user-contact" name="user-contact" class="form-control"
                    placeholder="Contact Number" required value="<?php echo htmlentities($result->contact);?>">

                <input type="text" id="user-address" name="user-address" class="form-control" placeholder="Address"
                    required value="<?php echo htmlentities($result->address);?>">

                <button name="updateauthor" class="btn btn-sm btn-primary btn-block" type="submit"><i
                        class="fas fa-user-plus"></i> UPDATE</button>
            </form>
            <?php  } ?>
            <!-- Update profile section ends here  -->


        </div>
    </div>


<?php
     include "../layout/bottomlayout.php";
?>