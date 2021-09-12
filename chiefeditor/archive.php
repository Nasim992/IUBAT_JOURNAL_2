<?php 
     $TITLE = "Archive- IUBAT Review";
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
            <h6>ARCHIVE PAPER</h6>
            <hr class="bg-secondary">
            <div class="table-responsive table-responsive-lg table-responsize-xl table-responsive-sm p-4">
                <table id="dtBasicExample" class="table table-striped table-bordered table-hover">

                    <thead> 
                        <tr class="bg-secondary text-white">
                            <th>Paper ID</th>
                            <th>Paper Name</th>
                            <th>Author Name</th>
                            <th>Abstract</th>
                        </tr>
                    </thead>
                    <tbody id="myTable-admin">
                        <!-- Selecting paper section starts here  -->
                        <?php 
                            $sql = "SELECT archive.id,archive.paperid,archive.versionissue,archive.papername,archive.authorname,archive.filename,archive.publisheddate,archive.abstract from archive";
                            $query = $dbh->prepare($sql); 
                            $query->execute(); 
                            $results=$query->fetchAll(PDO::FETCH_OBJ); 
                            $cnt=1;  
                            if($query->rowCount() > 0)  
                            {
                            foreach($results as $result) 
                            {    
                                $filename = htmlentities($result->filename);
                                $filepath = '../documents/archivefile/'.$filename;
                        ?>
                        <tr>
                            <td>
                            <?php  echo htmlentities($result->paperid); ?>
                            </td>
                            <td class="text-dark">
                            <a style="font-size:14px;" href="<?php echo $filepath ?> " target="_blank" role="button"> <?php  echo htmlentities($result->papername); ?></a>
                            <p>Published year: <b><?php  echo htmlentities($result->versionissue); ?></b></p>
                            </td>
                            <td>
                                 <?php   echo htmlentities($result->authorname); ?>
                            </td>
                            <td class="text-dark">
                            <?php   echo htmlentities($result->abstract); ?>
                            </td>
                        </tr>
                                  <?php }} ?>
 
                    </tbody>

                </table>

            </div>
            <div class="mb-5"></div>
        </div>
    </div>

<?php
     include "../layout/bottomlayout.php";
?>