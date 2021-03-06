<?php 
     $TITLE = "Upload Paper- IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAuthorLoggedIn($email,$BASE_URL."layout/login");
     include "../layout/navbar.php";
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
        margin-left: 150px;
        margin-right: 150px;
        border: 2px solid #e3e3e3;
        font-size: 14px;
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
          <?php echo display_message(); ?>
            <!-- input file section starts here  -->
            <form class="author-form" action="uploadpaperdetails" method="post">
                <h1 class="text-center" style="font-size:18px;"><b>UPLOAD PAPER</b></h1>
                <br>
                <div class="input-group">
                    <label class="col-sm-12 col-form-label" for="formGroupExampleInput"><b>Paper Title:</b></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="formGroupExampleInput" name="paper-title"  placeholder="Write the title of the paper" required>
                    </div>
                </div>
                <br>
                <div class="input-group">
                    <label class="col-sm-12 col-form-label" for="formGroupExampleInput"><b>Select the number of co-author of this paper:</b></label>
                    <div class="col-sm-6 col-form-label">
                        <select class="form-control" id="formGroupExampleInput" name="co-authors-number" required>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                <br>
                <hr>
                <div class="form-group">
                    <button class="btn btn-success  " name="submit-firsto" type="submit">Next</button>
                </div>
                <!-- Form Section Ends Here  -->
            </form>
            <!-- Input file section ends here  -->
        </div> <!-- Container div -->
    </div>


<?php
     include "../layout/bottomlayout.php";
?>