<?php 
     $TITLE = "Dashboard - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsReviewerLoggedIn($email,$BASE_URL."layout/login");
     include "../layout/navbar.php";
     $authoremail = $email;
     
?>
      
          <!-- Author showing header sections ends   -->
    <div id="mySidebar" class="sidebar">
        <?php  include '../layout/sidebar.php'; ?>
    </div>

    <div id="main">

<a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
<a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
<div class="container">

    <!-- Progress bar section starts here  -->
    <div class="row">

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="reviewedpaper">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Reviewed</h4>
                        </div>
                        <div class="card-body">
                            <?php  echo total_reviewed($authoremail); ?>
                        </div>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="reviewerpaper">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Reviewing</h4>
                        </div>
                        <div class="card-body">
                            <?php echo total_reviewing($authoremail); ?>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-secondary">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Feedback</h4>
                    </div>
                    <div class="card-body">
                        <?php  echo feedbackr($authoremail); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Progress bar section ends here  -->
    </div>
</div>


<?php
     include "../layout/bottomlayout.php";
?>