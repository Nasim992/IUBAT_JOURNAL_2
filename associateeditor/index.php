<?php 
     $TITLE = "Associate Editor - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAssociateEditorLoggedIn($email,$BASE_URL."layout/login");
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
            <?php display_message(); ?>
            <!-- Progress bar section starts here  -->
            <div class="row">

            <?php if(TotalNumberOfRowsWhereTWO_AND($USER_DB,"primaryemail","associateeditor",$email,1)>0){ ?>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="authors">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Author</h4>
                                </div>
                                <div class="card-body">
                                    <?php echo total_authors();  ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="editors">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Academic Editors</h4>
                                </div>
                                <div class="card-body">
                                    <?php  echo total_academiceditors(); ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>



                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="reviewerdetails">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Reviewer</h4>
                                </div>
                                <div class="card-body">
                                    <?php  echo total_reviewered(); ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="rfeedback">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="far fa-newspaper"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Feedback</h4>
                                </div>
                                <div class="card-body">
                                    <?php echo  total_feedback(); ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
             <a href="publishedpaper">
             <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Published</h4>
                  </div>
                  <div class="card-body">
                    <?php
                    echo total_published();
                    ?>
                  </div>
                </div>
              </div>
             </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="paperstatus">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Assigned paper</h4>
                                </div>
                                <div class="card-body">
                                    <?php  echo total_assopaper($email);  ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                


            <?php } ?>



                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="<?php echo $BASE_URL; ?>author/paperstatus">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Accepted</h4>
                                </div>
                                <div class="card-body">
                                    <?php echo total_published_author($email); ?>
                                </div>
                            </div>
                        </div> 
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="<?php echo $BASE_URL; ?>author/paperstatus">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Under Review</h4>
                                </div>
                                <div class="card-body">
                                    <?php echo total_unpublished_author($email); ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="<?php echo $BASE_URL; ?>author/paperstatus">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Rejected</h4>
                                </div>
                                <div class="card-body">
                                    <?php echo total_reject($email) ;?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="paperstatus">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total</h4>
                                </div>
                                <div class="card-body">
                                    <?php echo total_paper($email); ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="reviewedpaper">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-secondary">
                                <i class="far fa-newspaper"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Reviewed paper</h4>
                                </div>
                                <div class="card-body">
                                    <?php echo feedbackr($email); ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Progress bar section ends here  -->
            </div>
        </div>


<?php
     include "../layout/bottomlayout.php";
?>