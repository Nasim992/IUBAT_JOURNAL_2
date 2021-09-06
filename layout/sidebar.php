   <!-- Admin logged in or not -->
<?php if(TotalNumberOfRowsWhere($ADMIN_DB,"email",$email)>0){ ?>
        <a href="<?php echo $BASE_URL; ?>admin/dashboard" class="sidebars pt-5"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
        <a href="<?php echo $BASE_URL; ?>admin/publishedpaper" class="sidebars"><i class="far fa-newspaper"></i>&nbsp Published Paper</a>
        <a href="<?php echo $BASE_URL; ?>admin/unpublishedpaper" class="sidebars"><i class="far fa-newspaper"></i>&nbsp Unpublished Paper</a>
        <a href="<?php echo $BASE_URL; ?>admin/updateprofile" class="sidebars"><i class="fas fa-user-shield"></i>&nbsp Update Profile</a>
        <a href="<?php echo $BASE_URL; ?>admin/changepassword" class="sidebars"><i class="fas fa-unlock-alt"></i>&nbsp Change password</a>
        <a href="<?php echo $BASE_URL; ?>admin/changepasswordchief" class="sidebars"><i class="fas fa-unlock-alt"></i>&nbsp Change password(chief)</a>
        <a href="<?php echo $BASE_URL; ?>admin/admin" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Admin Pannel</a>
        <!-- <a href="addadmin" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Add Admin</a> -->
        <a href="<?php echo $BASE_URL; ?>admin/authors" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Author States</a>
        <a href="<?php echo $BASE_URL; ?>admin/reviewerdetails" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Reviewer</a>
        <a href="<?php echo $BASE_URL; ?>admin/selecteditor" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Select Editor</a>
        <a href="<?php echo $BASE_URL; ?>admin/editordetails" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Editor</a>
        <a href="<?php echo $BASE_URL; ?>admin/editored" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Editored</a>
        <a href="<?php echo $BASE_URL; ?>admin/feedback" class="sidebars"><i class="fas fa-comments"></i>&nbsp Feedback</a>
        <a href="<?php echo $BASE_URL; ?>admin/archive" class="sidebars"><i class="fa fa-table" aria-hidden="true"></i>&nbsp Archive</a>
        <a href="<?php echo $BASE_URL; ?>admin/archivepaper" class="sidebars"><i class="fa fa-table" aria-hidden="true"></i>&nbsp Archive paper</a>
         <a href="#" class="sidebars"></a>

         <a href="#"  class="pt-5"><h4>Welcome, Back</h6><br><h6 class="text-danger"><i><b><?php echo returnSingleValue($ADMIN_DB,"fullname","email",$email); ?></b></i></h6></a>
         

<!-- Chief editor Logged IN -->
     <?php }else if(TotalNumberOfRowsWhere($CHIEFEDITOR_DB,"email",$email)>0){ ?>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/" class="sidebars pt-5"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/publishedpaper" class="sidebars"><i class="far fa-newspaper"></i>&nbsp Published Paper</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/unpublishedpaper" class="sidebars"><i class="far fa-newspaper"></i>&nbsp Unpublished Paper</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/updateprofile" class="sidebars"><i class="fas fa-user-shield"></i>&nbsp Update Profile</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/changepassword" class="sidebars"><i class="fas fa-unlock-alt"></i>&nbsp Change password</a>

        <a href="<?php echo $BASE_URL; ?>chiefeditor/admin" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Admin Pannel</a>
        <!-- <a href="addadmin" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Add Admin</a> -->
        <a href="<?php echo $BASE_URL; ?>chiefeditor/authors" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Author States</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/reviewerdetails" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Reviewer</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/selecteditor" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Select Editor</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/editordetails" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Editor</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/editored" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Editored</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/rfeedback" class="sidebars"><i class="fas fa-comments"></i>&nbsp Reviewer Feedback</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/archive" class="sidebars"><i class="fa fa-table" aria-hidden="true"></i>&nbsp Archive</a>

        <a href="#"  class="pt-5"><h4>Welcome, Back</h6><br><h6 class="text-danger"><i><b><?php echo returnSingleValue($CHIEFEDITOR_DB,"fullname","email",$email); ?></b></i></h6></a>

<!-- Associate Editor Logged In or not -->
<?php }else if(TotalNumberOfRowsWhereTWO_AND($USER_DB,"primaryemail","associateeditor",$email,1)>0){ ?>

        <a href="<?php echo $BASE_URL; ?>associateeditor/" class="sidebars pt-5" title=" Dashboard"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
        <a href="<?php echo $BASE_URL; ?>author/uploadpaper"  class="sidebars" title="Upload paper here"><i class="far fa-newspaper"></i>&nbsp Upload Paper</a>
        <a href="<?php echo $BASE_URL; ?>author/paperstatus"  class="sidebars" title="Chech your paper status"><i class="far fa-newspaper"></i>&nbsp Your Paper Status</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/paperstatus"  class="sidebars" title="Assigned paper status"><i class="far fa-newspaper"></i>&nbsp Assigned Paper Status</a>
        <a href="<?php echo $BASE_URL; ?>author/updateprofile"  class="sidebars" title="Update your profile"><i class="fas fa-user-shield"></i>&nbsp Update profile</a>
        <a href="<?php echo $BASE_URL; ?>author/changepassword"  class="sidebars"title="Change your password"><i class="fas fa-unlock-alt"></i>&nbsp Change password</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/authors"  class="sidebars" title="Author Details"><i class="fas fa-users-cog"></i>&nbsp Author Details</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/editors"  class="sidebars" title="Editors"><i class="fas fa-users-cog"></i>&nbsp Editor States</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/editordetails"  class="sidebars" title="Editor Details"><i class="fas fa-users-cog"></i>&nbsp Academic Editors</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/reviewerdetails"  class="sidebars" title="Reviewer Details"><i class="fas fa-users-cog"></i>&nbsp Reviewer</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/reviewedpaper"  class="sidebars" title="See your Reviewed paper"><i class="far fa-newspaper"></i>&nbsp Reviewed paper</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/authors"  class="sidebars" title="See your Reviewed paper"><i class="fas fa-users-cog"></i>&nbsp Author Details</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/rfeedback"  class="sidebars" title="Reviewer Feedback"><i class="fas fa-comments"></i>&nbsp Reviewer Feeedback</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/efeedback"  class="sidebars" title="Editor Feedback"><i class="fas fa-comments"></i>&nbsp Editor Feeedback</a>

        <a href="#"  class="pt-5"><h4>Welcome, Back</h6><br><h6 class="text-danger"><i><b><?php echo returnSingleValue($USER_DB,"title","primaryemail",$email).returnSingleValue($USER_DB,"firstname","primaryemail",$email).returnSingleValue($USER_DB,"middlename","primaryemail",$email).returnSingleValue($USER_DB,"lastname","primaryemail",$email); ?></b></i></h6></a>



        <!-- Academic Editor  -->
        <?php }else if(TotalNumberOfRowsWhereTWO_AND($USER_DB,"primaryemail","academiceditor",$email,1)>0){ ?>
        <a href="<?php echo $BASE_URL; ?>academiceditor/" class="sidebars pt-5" title="Author Dashboard"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
        <a href="<?php echo $BASE_URL; ?>author/uploadpaper"  class="sidebars" title="Upload paper here"><i class="far fa-newspaper"></i>&nbsp Upload Paper</a>
        <a href="<?php echo $BASE_URL; ?>author/paperstatus"  class="sidebars" title="Chech your paper status"><i class="far fa-newspaper"></i>&nbsp Your Paper Status</a>
        <a href="<?php echo $BASE_URL; ?>academiceditor/paperstatus" class="sidebars"><i class="far fa-newspaper"></i>&nbsp Assigned Paper Status</a>
        <a href="<?php echo $BASE_URL; ?>author/updateprofile" class="sidebars"><i class="fas fa-user-shield"></i>&nbsp Update Profile</a>
        <a href="<?php echo $BASE_URL; ?>author/changepassword" class="sidebars"><i class="fas fa-unlock-alt"></i>&nbsp Change password</a>
        <a href="<?php echo $BASE_URL; ?>academiceditor/authors" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Author States</a>
        <a href="<?php echo $BASE_URL; ?>academiceditor/reviewerdetails" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Reviewer</a>
        <a href="<?php echo $BASE_URL; ?>academiceditor/reviewedpaper" class="sidebars"><i class="far fa-newspaper"></i>&nbsp Reviewed paper</a>
        <a href="<?php echo $BASE_URL; ?>academiceditor/feedback" class="sidebars"><i class="fas fa-comments"></i>&nbsp Feedback</a>

      <a href="#"  class="pt-5"><h4>Welcome, Back</h6><br><h6 class="text-danger"><i><b><?php echo returnSingleValue($USER_DB,"title","primaryemail",$email).returnSingleValue($USER_DB,"firstname","primaryemail",$email).returnSingleValue($USER_DB,"middlename","primaryemail",$email).returnSingleValue($USER_DB,"lastname","primaryemail",$email); ?></b></i></h6></a>


        <!-- Reviewer -->
        <?php }else if(TotalNumberOfRowsWhereTWO_AND($USER_DB,"primaryemail","reviewerselection",$email,1)>0){ ?>
        <a href="<?php echo $BASE_URL; ?>author/" class="sidebars pt-5" title="Author Dashboard"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
        <a href="<?php echo $BASE_URL; ?>reviewer/reviewedpaper" class="sidebars"> <i class="far fa-newspaper" class="sidebars"></i>&nbsp Reviewed paper</a>
       <a href="<?php echo $BASE_URL; ?>reviewer/reviewerpaper" class="sidebars"><i class="far fa-newspaper"></i>&nbsp As Reviewer</a>
       
       <a href="#"  class="pt-5"><h4>Welcome, Back</h6><br><h6 class="text-danger"><i><b><?php echo returnSingleValue($USER_DB,"title","primaryemail",$email).returnSingleValue($USER_DB,"firstname","primaryemail",$email).returnSingleValue($USER_DB,"middlename","primaryemail",$email).returnSingleValue($USER_DB,"lastname","primaryemail",$email); ?></b></i></h6></a>


        <?php }else { ?>

        <a href="<?php echo $BASE_URL; ?>author/" class="sidebars pt-5" title="Author Dashboard"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
        <a href="<?php echo $BASE_URL; ?>author/uploadpaper"  class="sidebars" title="Upload paper here"><i class="fas fa-upload"></i>&nbsp Upload Paper</a>
        <a href="<?php echo $BASE_URL; ?>author/paperstatus"  class="sidebars" title="Chech your paper status"><i class="fas fa-exclamation-circle"></i>&nbsp Paper Status</a>
        <a href="<?php echo $BASE_URL; ?>author/updateprofile"  class="sidebars" title="Update your profile"><i class="fas fa-sync"></i>&nbsp Update profile</a>
        <a href="<?php echo $BASE_URL; ?>author/changepassword"  class="sidebars"title="Change your password"><i class="fas fa-unlock-alt"></i>&nbsp Change password</a>
        <a href="<?php echo $BASE_URL; ?>author/reviewerstatus"  class="sidebars" title="See your Reviewed paper"><i class="far fa-newspaper"></i>&nbsp Reviewed paper</a>
<?php } ?>
