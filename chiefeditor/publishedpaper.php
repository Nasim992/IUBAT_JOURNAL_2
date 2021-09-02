<?php 
     $TITLE = "Published Paper- IUBAT Review";
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
    <h6>PUBLISHED PAPER</h6>
    <hr class="bg-secondary">
    <table id="heading-table">
        <tbody>
            <?php 
              $sql = "SELECT paper.id,paper.paperid,paper.authoremail,paper.papername,paper.abstract,paper.name,paper.type,paper.action,paper.pdate from paper WHERE action=1 ";
              $query = $dbh->prepare($sql); 
              $query->execute(); 
              $results=$query->fetchAll(PDO::FETCH_OBJ); 
              $cnt=1; 

              if($query->rowCount() > 0) 
              {
              foreach($results as $result) 
              {  
            ?>

            <!-- Select User name section starts here  -->
            <?php  
              $authoremail = htmlentities($result->authoremail);

              $sql1 = "SELECT * FROM author WHERE  primaryemail= '$authoremail' ";

              $result1 = mysqli_query($link,$sql1); 

              $file1 = mysqli_fetch_assoc($result1);

              $title = $file1['title'];
              $fname= $file1['firstname'];
              $middlename= $file1['middlename'];
              $lastname= $file1['lastname'];

              $authorname = $title.' '.$fname.' '.$middlename.' ' .$lastname;
              
            ?>
            <!-- Select user  name section ends here  -->

            <!-- Dashboard section starts  -->

            <tr>
                <td>
                    <div class="jumbotron  mb-0">
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="paperdownload.php?id=<?php echo htmlentities($result->paperid);?>">
                                    <h5 style="font-size:16px;"><?php echo htmlentities($result->papername);?>
                                    </h5>
                                </a>
                            </div>
                            <div class="text-info">
                                Published on:
                                <?php 
                                  $pdatestring = htmlentities($result->pdate);
                                  $pdate= date("d-M-Y",strtotime($pdatestring));
                                  echo $pdate;
                                ?>
                            </div>
                        </div>
                        <h5 class="text-secondary" style="font-size:15px;"><?php echo $authorname;?></h5>
                        <p id="paper-abstract<?php echo htmlentities($result->id);?>"
                            style="font-size:14px;height: 6.0em;overflow: hidden;width:auto;"><span
                                style="font-weight:bold">Abstract:</span>
                            <?php echo htmlentities($result->abstract);?></p>
                        <a style="cursor:pointer;" class="text-secondary float-right"><span
                                id="read-more-abstract<?php echo htmlentities($result->id);?>">Read
                                more...</span></a>
                        <!--Individual Read More section starts here   -->
                        <script>
                        document.querySelector('#read-more-abstract<?php echo htmlentities($result->id);?>')
                            .addEventListener('click', function() {
                                document.querySelector(
                                        '#paper-abstract<?php echo htmlentities($result->id);?>').style
                                    .height = 'auto';
                                this.style.display = 'none';
                            });
                        </script>
                        <!-- Individual Read More section ends here  -->
                        <hr>
                </td>
                    </div>
            </tr>
<!-- DashBoard Section ends  -->

 <?php }  
} else {
    echo "Paper not published yet!";
} ?>
  </tbody>
</table>
<div class="mb-5"></div>
</div>
</div>


<?php
     include "../layout/bottomlayout.php";
?>