<?php 
     $TITLE = "Upload Paper details- IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAuthorLoggedIn($email,$BASE_URL."layout/login");
     
     include "../layout/navbar.php";
     // Co Authors Selection Section Starts Here 
    if(isset($_POST['submit-firsto']))
    { 
    $numberOfCoAuthor = $_POST['co-authors-number'];
    $papername = $_POST['paper-title'];
    }
    empty($numberOfCoAuthor)?$numberOfCoAuthor=0: $numberOfCoAuthor= $_POST['co-authors-number'];
    // Co- Authors Selection Section Ends Here 

    $authoremail = $email;
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
    .co-author-form {
        font-size: 11px;
    }
    .co-author-form input {
        font-size: 11px;
    }
    </style>
</head>

    <!-- Author showing header sections ends   -->
    <div id="mySidebar" class="sidebar">
         <?php  include '../layout/sidebar.php';?>
    </div>
    <div id="main">
        <a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
        <a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
        <div class="container">
            <div>
                <!-- input file section starts here  -->
                <form class="author-form" method="post" action="../link/upload_paper_details.php" enctype="multipart/form-data">
                    <div class="">
                        <h1 class="text-center" style="font-size:18px;"><b>UPLOAD PAPER</b></h1>
                        <br>
                        <input type="hidden" id="custId" name="author-email" value="<?php echo $authoremail ?>">
                        <input type="hidden" id="custId" name="number-of-coauthors"
                            value="<?php echo $numberOfCoAuthor ?>">
                        <input type="hidden" id="custId" name="paper-title" value="<?php echo $papername ?>">

                        <div class="input-group">
                            <label class="col-sm-2 col-form-label" for="formGroupExampleInput"><b>Abstract:</b></label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="summary" rows="10"
                                    placeholder="Write the Abstract of this paper(length should be minimum 255 characters and maximum 1000 characters" minlength="255" maxlength="1000" required></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <div class="input-group">
                                    <label class="col-sm-8 col-form-label" for="formGroupExampleInput"><b>1.Upload full
                                            manuscript as doc format:</b></label>
                                    <div class="col-sm-4">
                                        <input type="file" class="form-control-file" name="file1"
                                            id="exampleFormControlFile1" accept=".doc, .docx" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <div class="input-group">
                                    <label class="col-sm-8 col-form-label" for="formGroupExampleInput"><b>2.Upload full
                                            manuscript as pdf format:</b></label>
                                    <div class="col-sm-4">
                                        <input type="file" class="form-control-file" name="file2"
                                            id="exampleFormControlFile1" accept="application/pdf" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-12 col-md-12">
                                <div class="input-group">
                                    <label class="col-sm-8 col-form-label" for="formGroupExampleInput"><b>3.Upload
                                            Necessary information as Pdf format:(If Necessary)</b></label>
                                    <div class="col-sm-4">
                                        <input type="file" class="form-control-file" name="file"
                                            id="exampleFormControlFile1" accept="application/pdf">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr class="bg-success">

                        <div class="row co-author-form">
                            <?php for ( $x=0;$x<$numberOfCoAuthor;$x++){ ?>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <h6 style="font-size:14px;"><b>Co-Author:<?php echo $x+1;?></b></h6>
                                <div class="input-group">
                                    <label class="col-sm-3 col-form-label" for="formGroupExampleInput">Name:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            name="caufullname<?php echo $x+1;?>" placeholder="FullName " required>
                                    </div>
                                </div>
                                <br>
                                <div class="input-group">
                                    <label class="col-sm-3 col-form-label" for="formGroupExampleInput">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="formGroupExampleInput"
                                            name="cauemail<?php echo $x+1;?>" placeholder="email " required>
                                    </div>
                                </div>
                                <br>
                                <div class="input-group">
                                    <label class="col-sm-3 col-form-label" for="formGroupExampleInput">Dept.:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            name="caudept<?php echo $x+1;?>" placeholder="Department " required>
                                    </div>
                                </div>
                                <br>
                                <div class="input-group">
                                    <label class="col-sm-3 col-form-label"
                                        for="formGroupExampleInput">Institute:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            name="cauinstitute<?php echo $x+1;?>" placeholder="Institute" required>
                                    </div>
                                </div>
                                <br>
                                <div class="input-group">
                                    <label class="col-sm-3 col-form-label" for="formGroupExampleInput">Address:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            name="cauaddress<?php echo $x+1;?>" placeholder="address" required>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <br>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <div>
                                <!-- <a href="upload-paper1.php" role="button"><i class="fa fa-backward" aria-hidden="true"></i>Go back</a> -->
                            </div>
                            <div>
                                <button class="btn btn-sm btn-success " name="submit" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                    <!-- Form Section Ends Here  -->
                </form>
            </div>
            <!-- Input file section ends here  -->
        </div> <!-- Container div -->
    </div>


<?php
     include "../layout/bottomlayout.php";
?>