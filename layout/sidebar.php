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

<!-- Chief editor Logged IN -->
     <?php }else if(TotalNumberOfRowsWhere($CHIEFEDITOR_DB,"email",$email)>0){ ?>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/dashboard" class="sidebars pt-5"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
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
        <a href="<?php echo $BASE_URL; ?>chiefeditor/feedback" class="sidebars"><i class="fas fa-comments"></i>&nbsp Feedback</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/archive" class="sidebars"><i class="fa fa-table" aria-hidden="true"></i>&nbsp Archive</a>

<!-- Associate Editor Logged In or not -->
<?php }else if(TotalNumberOfRowsWhereTWO_AND($USER_DB,"primaryemail","associateeditor",$email,1)>0){ ?>

    <a href="<?php echo $BASE_URL; ?>chiefeditor/dashboard" class="sidebars pt-5"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/publishedpaper" class="sidebars"><i class="far fa-newspaper"></i>&nbsp Published Paper</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/unpublishedpaper" class="sidebars"><i class="far fa-newspaper"></i>&nbsp Unpublished Paper</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/updateprofile" class="sidebars"><i class="fas fa-user-shield"></i>&nbsp Update Profile</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/changepassword" class="sidebars"><i class="fas fa-unlock-alt"></i>&nbsp Change password</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/changepasswordchief" class="sidebars"><i class="fas fa-unlock-alt"></i>&nbsp Change password(chief)</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/admin" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Admin Pannel</a>
        <!-- <a href="addadmin" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Add Admin</a> -->
        <a href="<?php echo $BASE_URL; ?>chiefeditor/authors" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Author States</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/reviewerdetails" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Reviewer</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/selecteditor" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Select Editor</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/editordetails" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Editor</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/editored" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Editored</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/feedback" class="sidebars"><i class="fas fa-comments"></i>&nbsp Feedback</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/archive" class="sidebars"><i class="fa fa-table" aria-hidden="true"></i>&nbsp Archive</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/archivepaper" class="sidebars"><i class="fa fa-table" aria-hidden="true"></i>&nbsp Archive paper</a>

        <!-- Academic Editor  -->
        <?php }else if(TotalNumberOfRowsWhereTWO_AND($USER_DB,"primaryemail","academiceditor",$email,1)>0){ ?>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/dashboard" class="sidebars pt-5"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/publishedpaper" class="sidebars"><i class="far fa-newspaper"></i>&nbsp Published Paper</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/unpublishedpaper" class="sidebars"><i class="far fa-newspaper"></i>&nbsp Unpublished Paper</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/updateprofile" class="sidebars"><i class="fas fa-user-shield"></i>&nbsp Update Profile</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/changepassword" class="sidebars"><i class="fas fa-unlock-alt"></i>&nbsp Change password</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/changepasswordchief" class="sidebars"><i class="fas fa-unlock-alt"></i>&nbsp Change password(chief)</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/admin" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Admin Pannel</a>
        <!-- <a href="addadmin" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Add Admin</a> -->
        <a href="<?php echo $BASE_URL; ?>chiefeditor/authors" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Author States</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/reviewerdetails" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Reviewer</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/selecteditor" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Select Editor</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/editordetails" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Editor</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/editored" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Editored</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/feedback" class="sidebars"><i class="fas fa-comments"></i>&nbsp Feedback</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/archive" class="sidebars"><i class="fa fa-table" aria-hidden="true"></i>&nbsp Archive</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/archivepaper" class="sidebars"><i class="fa fa-table" aria-hidden="true"></i>&nbsp Archive paper</a>

        <!-- Reviewer -->
        <?php }else if(TotalNumberOfRowsWhereTWO_AND($USER_DB,"primaryemail","reviewerselection",$email,1)>0){ ?>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/dashboard" class="sidebars pt-5"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/publishedpaper" class="sidebars"><i class="far fa-newspaper"></i>&nbsp Published Paper</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/unpublishedpaper" class="sidebars"><i class="far fa-newspaper"></i>&nbsp Unpublished Paper</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/updateprofile" class="sidebars"><i class="fas fa-user-shield"></i>&nbsp Update Profile</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/changepassword" class="sidebars"><i class="fas fa-unlock-alt"></i>&nbsp Change password</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/changepasswordchief" class="sidebars"><i class="fas fa-unlock-alt"></i>&nbsp Change password(chief)</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/admin" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Admin Pannel</a>
        <!-- <a href="addadmin" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Add Admin</a> -->
        <a href="<?php echo $BASE_URL; ?>chiefeditor/authors" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Author States</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/reviewerdetails" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Reviewer</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/selecteditor" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Select Editor</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/editordetails" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Editor</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/editored" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Editored</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/feedback" class="sidebars"><i class="fas fa-comments"></i>&nbsp Feedback</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/archive" class="sidebars"><i class="fa fa-table" aria-hidden="true"></i>&nbsp Archive</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/archivepaper" class="sidebars"><i class="fa fa-table" aria-hidden="true"></i>&nbsp Archive paper</a>

        <?php }else { ?>

        <a href="<?php echo $BASE_URL; ?>author/" class="sidebars pt-5" title="Author Dashboard"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
        <a href="<?php echo $BASE_URL; ?>author/uploadpaper"  class="sidebars" title="Upload paper here"><i class="fas fa-upload"></i>&nbsp Upload Paper</a>
        <a href="<?php echo $BASE_URL; ?>author/paperstatus"  class="sidebars" title="Chech your paper status"><i class="fas fa-exclamation-circle"></i>&nbsp Paper Status</a>
        <a href="<?php echo $BASE_URL; ?>author/updateprofile"  class="sidebars" title="Update your profile"><i class="fas fa-sync"></i>&nbsp Update profile</a>
        <a href="<?php echo $BASE_URL; ?>author/changepassword"  class="sidebars"title="Change your password"><i class="fas fa-unlock-alt"></i>&nbsp Change password</a>
        <a href="<?php echo $BASE_URL; ?>author/reviewerstatus"  class="sidebars" title="See your Reviewed paper"><i class="far fa-newspaper"></i>&nbsp Reviewed paper</a>
<?php } ?>
