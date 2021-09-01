<?php 
     $TITLE = "Author dashboard - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAuthorLoggedIn($email,$BASE_URL."layout/login");
     include "../layout/navbar.php";
?>
      
          <!-- Author showing header sections ends   -->
    <div id="mySidebar" class="sidebar">
        <?php  include '../layout/sidebar.php'; ?>
    </div>

    <div id="main">
        <!-- <a href="#"><span class="resbtn"onclick="openNav()" id="closesign">☰</span></a> -->
        <a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
        <a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
        <div class="container">
                <?php echo display_message(); ?>
            <!-- Progress bar section starts here  -->
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="paperstatus">
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
                    <a href="paperstatus">
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
                    <a href="paperstatus">
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
                    <a href="reviewerstatus">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Reviewer</h4>
                                </div>
                                <div class="">
                                    <?php 
                                     if( reviewed($email) == 0) {?> 
                                    <p style="font-size:16px;" class="text-danger"><i class="fas fa-times-circle"></i>
                                        <?php  echo "Not Selected"; ?></p>
                                    <?php } else { ?>
                                    <p style="font-size:16px;" class="text-success"><i class="fas fa-check-circle"></i>
                                        <?php  echo "Selected"; ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="reviewerstatus">
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