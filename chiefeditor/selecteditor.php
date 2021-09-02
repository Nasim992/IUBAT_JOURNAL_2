<?php 
     $TITLE = "Select Editor - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsChiefEditorLoggedIn($email,$BASE_URL."layout/login");
     $editoremail = $email;
     include "../layout/navbar.php";
?>
 <!-- Author showing header sections ends   -->
    <div id="mySidebar" class="sidebar">
        <?php  include '../layout/sidebar.php'; ?>
    </div>

    <div id="main">
        <a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
        <a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
        <div class="container">
        <?php echo display_message(); ?>
            <h6>SELECT ASSOCIATE AND ACADEMIC EDITOR</h6>
            <hr class="bg-secondary">
            <div class="table-responsive table-responsive-lg table-responsize-xl table-responsive-sm">

                <table id="dtBasicExample" class="table table-striped table-bordered table-hover" cellspacing="0">
                    <thead>
                        <tr>
                            <th>UserName</th>
                            <th>Full Name</th>
                            <th>Primary Email</th>
                            <th>Associate Editor</th>
                            <th>Academic Editor</th>
                            <th>Author</th>
                        </tr>
                    </thead>

                    <tbody id="myTable-admin">
                        <?php $sql = "SELECT author.id,author.username,author.title,author.firstname,author.middlename,author.lastname,author.primaryemail,author.primaryemailcc,author.secondaryemail,author.secondaryemailcc,author.contact,author.address,author.registrationtime,author.reviewerselection,author.associateeditor,author.academiceditor from author ";
                            $query = $dbh->prepare($sql); 
                            $query->execute(); 
                            $results=$query->fetchAll(PDO::FETCH_OBJ);  
                            $cnt=1;
                            if($query->rowCount() > 0)  
                            {
                            foreach($results as $result) 
                            { 
                            $title = htmlentities($result->title);
                            $firstname = htmlentities($result->firstname);
                            $middlename = htmlentities($result->middlename);
                            $lastname = htmlentities($result->lastname);
                            $fullname = $title.' '.$firstname.' '.$middlename.' '.$lastname;
                            $associateeditor = htmlentities($result->associateeditor);
                            $academiceditor = htmlentities($result->academiceditor);
                            ?>
                        <tr> 
                            <td class="result-color1"><?php echo htmlentities($result->username);?></td>
                            <td><?php echo $fullname ;?></td>
                            <td><?php echo htmlentities($result->primaryemail);?></td>
                            <td>
                                <?php if ($associateeditor==1) {
                                echo "<b class='btn btn-sm btn-success text-white'>Selected</b>";
                                } else { ?>
                                <form method="post" action="../link/selecteditor.php">
                                    <input type="hidden" name="pemail"
                                        value="<?php echo htmlentities($result->primaryemail);?>">
                                    <button type="submit" name="select-associateeditor"
                                        class="btn btn-info btn-sm">Select</button>
                                </form>
                                <?php  } ?>
                            </td>
                            <td>
                                <?php if ($academiceditor==1) {
                                    echo "<b class='btn btn-sm btn-success text-white'>Selected</b>";
                                    } else { ?>
                                <form method="post" action="../link/selecteditor.php">
                                    <input type="hidden" name="pemail"
                                        value="<?php echo htmlentities($result->primaryemail);?>">
                                    <button type="submit" name="select-academiceditor"
                                        class="btn btn-info btn-sm">Select</button>
                                </form>
                                <?php  } ?>
                            </td>
                            <td>
                                <?php if (($academiceditor==0 OR $academiceditor==NULL) and ($associateeditor==0 OR $associateeditor==NULL)) {
                                    echo "<b class='btn btn-sm btn-success text-white'>Selected</b>";
                                    } else { ?>
                                <form method="post" action="../link/selecteditor.php">
                                    <input type="hidden" name="pemail"
                                        value="<?php echo htmlentities($result->primaryemail);?>">
                                    <button type="submit" name="select-author"
                                        class="btn btn-info btn-sm">Select</button>
                                </form>
                                <?php  } ?>
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