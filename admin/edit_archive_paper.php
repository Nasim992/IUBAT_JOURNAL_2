<?php 
     $TITLE = "Published Paper- IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAdminLoggedIn($email,$BASE_URL."layout/login");
     $adminemail = $email;
     include "../layout/navbar.php";
     include "../link/edit_archive_paper.php";
?>
<head>

 <!-- Author showing header sections ends   -->
    <div id="mySidebar" class="sidebar">
        <?php  include '../layout/sidebar.php'; ?>
    </div>

    <div id="main">
        <a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
        <a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
        <div class="container">
            <h6>ARCHIVE PAPER</h6>
            <hr class="bg-secondary">
            <div class="table-responsive table-responsive-lg table-responsize-xl table-responsive-sm p-4">
                <table id="dtBasicExample" class="table table-striped table-bordered table-hover">
                    <tbody id="myTable-admin">
                        <!-- Selecting paper section starts here  -->
                        <?php 
                            $sql = "SELECT archive.id,archive.paperid,archive.versionissue,archive.papername,archive.authorname,archive.filename,archive.publisheddate,archive.abstract from archive WHERE paperid='$paperid'";
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
                                <b>Paper ID: </b><?php  echo htmlentities($result->paperid); ?>
                                <br>
                               <b>Paper Name: </b> <a style="font-size:14px;" href="<?php echo $filepath ?> " target="_blank" 
                                    role="button" title="Download this paper"> <?php  echo htmlentities($result->papername); ?></a>
                                <form method="post">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name= "papername-update" rows="2"  required><?php  echo htmlentities($result->papername); ?></textarea>
                                <button name="update_papername" class="btn btn-sm btn-info">Update</button>
                                </form>

                                <p>Published year: <b><?php  echo htmlentities($result->versionissue); ?></b></p>
                                <form method="post">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name= "versionissue-update" rows="2"  required><?php  echo htmlentities($result->versionissue); ?></textarea>
                                <button name="update_versionissue" class="btn btn-sm btn-info">Update</button>
                                </form>
                                
                                <b>Author Name: </b><?php   echo htmlentities($result->authorname); ?>
                                <form method="post">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name= "authorname-update" rows="2"  required><?php  echo htmlentities($result->authorname); ?></textarea>
                                <button name="update_authorname" class="btn btn-sm btn-info">Update</button>
                               </form>

                              <b>Abstract: </b><?php  echo htmlentities($result->abstract); ?>
                              <form method="post">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name= "abstract-update" rows="10"  required><?php  echo htmlentities($result->abstract); ?></textarea>
                                <button name="update_abstract" class="btn btn-sm btn-info">Update</button>
                              </form>
                                <br>
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