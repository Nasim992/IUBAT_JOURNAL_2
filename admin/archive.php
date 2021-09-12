<?php 
     $TITLE = "Archive - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAdminLoggedIn($email,$BASE_URL."layout/login");
     $adminemail = $email;
     include "../layout/navbar.php";
     include "../link/archive.php";
?>
<head>
<style>
    @media only screen and (max-width: 992px) {
        form {
            margin-left: 0px !important;
            margin-right: 0px !important;
        }
    }

    form {
        padding: 20px;
        margin-left: 120px;
        margin-right: 120px;
        border: 2px solid #e3e3e3;
        font-size: 14px;
    }
    </style>
</head>
 <!-- Author showing header sections ends   -->
    <div id="mySidebar" class="sidebar">
        <?php  include '../layout/sidebar.php'; ?>
    </div>

    <div id="main">
        <a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
        <a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
        <div class="container">

            <!-- Progress bar section starts here  -->
            <div>
                <!-- input file section starts here  -->
                <form class="author-form" method="post" enctype="multipart/form-data">
                 <?php display_message(); ?>
                    <div class="">
                        <h1 class="text-center" style="font-size:18px;"><b>ADD PAPER TO THE ARCHIVE</b></h1>
                        <br>

                        <br>
                        <div class="input-group">
                            <label class="col-sm-2 col-form-label" for="formGroupExampleInput"><b>Paper ID:</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="exampleFormControlTextarea1" name="paperid"
                                    placeholder="Enter the Unique paper id" required>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <label class="col-sm-2 col-form-label" for="formGroupExampleInput"><b>Paper
                                    Name:</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="exampleFormControlTextarea1"
                                    name="papername" placeholder="Enter the Paper Name of this paper " required>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <label class="col-sm-2 col-form-label" for="formGroupExampleInput"><b>Author
                                    Name:</b></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="exampleFormControlTextarea1"
                                    name="authorname" placeholder="Enter the Authorname of this paper" required>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <label class="col-sm-2 col-form-label" for="formGroupExampleInput"><b>Abstract:</b></label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="abstract"
                                    rows="10" placeholder="Write the Abstract of this paper" required></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="input-group">
                            <label class="col-sm-2 col-form-label" for="formGroupExampleInput"><b>Published Date
                                    :</b></label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="exampleFormControlTextarea1"
                                    name="publisheddate" required>
                            </div>
                        </div>
                        <br>
                    </div>
                    <br>
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="input-group">
                            <label class="col-sm-8 col-form-label" for="formGroupExampleInput"><b>Upload the paper
                                </b></label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1"
                                    accept="application/pdf">
                            </div>
                        </div>
                    </div>

            <div class="form-group">
                <div class="d-flex justify-content-between">
                    <div>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-success " name="submit" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Form Section Ends Here  -->
    </form>
    </div>

    </div>


   
<?php
     include "../layout/bottomlayout.php";
?>