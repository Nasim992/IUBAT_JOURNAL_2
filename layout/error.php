<?php 
     $TITLE = "Paper Details - IUBAT Review";
     include "../layout/toplayout_user.php";
     include "../layout/navbar.php";
?>
 <?php display_message(); ?>
 <div style="margin-top:100px;" class="container p-5">

<div style="border:2px solid red;border-radius:10px;">
    <div class="row p-2">
        <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
            <img src="https://iubat.edu/wp-content/themes/eduma/images/image-404.jpg">
        </div>
        <div class="col-sm-12 col-lg-6 col-xl-6 col-md-6">
            <b>
                <h1 style="font-size:50px;font-weight:700">404 <span style="color:red;">ERROR!</span></h1>
            </b>
            <p>Sorry, we can't find the page you are looking for. Please go to back<button onclick="goBack()" class="btn btn-info btn-sm">Go back</button></p>
            <script>
            function goBack() {
            window.history.back(); 
            }
            </script>
        </div>
    </div>

</div>

</div>
<div class="p-5"></div>
<?php
     include "../layout/footer.php";
     include "../layout/bottomlayout.php";
?>