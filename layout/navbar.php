<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-color">
  <a class="navbar-brand" href="<?php echo $BASE_URL; ?>"><img src="<?php echo $IMAGE_DIR; ?>iubat-logo.png" style="height: 50px; width: 70px" alt="navbar-brand"/></a>
  <a style="font-size:17px;text-decoration:none;"  href="<?php echo $BASE_URL; ?>">
  <span class="header_heading"><b><span style="color:#e90f2c;">IUBAT Review</span><br><small style="color:#fff63c;">A Multidisciplinary Academic Journal</small></b></span>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></a>
    <span class="navbar-toggler-icon"></span>
  </button> 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">

    <?php if(!empty($email)) {?>
      <li class="nav-item dropdown active mydropdowncss">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAbout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dashboard
        </a>

        <!-- Admin Logged In or Not -->
        <?php if(TotalNumberOfRowsWhere($ADMIN_DB,"email",$email)>0){ ?>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownAbout">
        <a href="<?php echo $BASE_URL; ?>admin/" class="dropdown-item"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
        <a href="<?php echo $BASE_URL; ?>admin/publishedpaper" class="dropdown-item"><i class="far fa-newspaper"></i>&nbsp Published Paper</a>
        <a href="<?php echo $BASE_URL; ?>admin/unpublishedpaper" class="dropdown-item"><i class="far fa-newspaper"></i>&nbsp Unpublished Paper</a>
        <a href="<?php echo $BASE_URL; ?>admin/updateprofile" class="dropdown-item"><i class="fas fa-user-shield"></i>&nbsp Update Profile</a>
        <a href="<?php echo $BASE_URL; ?>admin/changepassword" class="dropdown-item"><i class="fas fa-unlock-alt"></i>&nbsp Change password</a>
        <a href="<?php echo $BASE_URL; ?>admin/admin" class="dropdown-item"><i class="fas fa-users-cog"></i>&nbsp Admin Pannel</a>
        <!-- <a href="addadmin" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Add Admin</a> -->
        <a href="<?php echo $BASE_URL; ?>admin/authors" class="dropdown-item"><i class="fas fa-users-cog"></i>&nbsp Author States</a>
        <a href="<?php echo $BASE_URL; ?>admin/reviewerdetails" class="dropdown-item"><i class="fas fa-users-cog"></i>&nbsp Reviewer</a>
        <a href="<?php echo $BASE_URL; ?>admin/selecteditor" class="dropdown-item"><i class="fas fa-users-cog"></i>&nbsp Select Editor</a>
        <a href="<?php echo $BASE_URL; ?>admin/editordetails" class="dropdown-item"><i class="fas fa-users-cog"></i>&nbsp Editor</a>
        <a href="<?php echo $BASE_URL; ?>admin/editored" class="dropdown-item"><i class="fas fa-users-cog"></i>&nbsp Editored</a>
        <a href="<?php echo $BASE_URL; ?>admin/rfeedback" class="dropdown-item"><i class="fas fa-comments"></i>&nbsp Reviewer Feedback</a>
        <a href="<?php echo $BASE_URL; ?>admin/archive" class="dropdown-item"><i class="fa fa-table" aria-hidden="true"></i>&nbsp Archive</a>
        <a href="<?php echo $BASE_URL; ?>admin/archivepaper" class="dropdown-item"><i class="fa fa-table" aria-hidden="true"></i>&nbsp Archive Paper</a>
        </div>
        
        <!-- Chiefeditor Logged in or not -->
        <?php }else if(TotalNumberOfRowsWhere($CHIEFEDITOR_DB,"email",$email)>0){ ?>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownAbout">
        <a href="<?php echo $BASE_URL; ?>chiefeditor/" class="dropdown-item"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/publishedpaper" class="dropdown-item"><i class="far fa-newspaper"></i>&nbsp Published Paper</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/unpublishedpaper" class="dropdown-item"><i class="far fa-newspaper"></i>&nbsp Unpublished Paper</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/updateprofile" class="dropdown-item"><i class="fas fa-user-shield"></i>&nbsp Update Profile</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/changepassword" class="dropdown-item"><i class="fas fa-unlock-alt"></i>&nbsp Change password</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/admin" class="dropdown-item"><i class="fas fa-users-cog"></i>&nbsp Admin Pannel</a>
        <!-- <a href="addadmin" class="sidebars"><i class="fas fa-users-cog"></i>&nbsp Add Admin</a> -->
        <a href="<?php echo $BASE_URL; ?>chiefeditor/authors" class="dropdown-item"><i class="fas fa-users-cog"></i>&nbsp Author States</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/reviewerdetails" class="dropdown-item"><i class="fas fa-users-cog"></i>&nbsp Reviewer</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/selecteditor" class="dropdown-item"><i class="fas fa-users-cog"></i>&nbsp Select Editor</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/editordetails" class="dropdown-item"><i class="fas fa-users-cog"></i>&nbsp Editor</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/editored" class="dropdown-item"><i class="fas fa-users-cog"></i>&nbsp Editored</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/rfeedback" class="dropdown-item"><i class="fas fa-comments"></i>&nbsp Reviewer Feedback</a>
        <a href="<?php echo $BASE_URL; ?>chiefeditor/archive" class="dropdown-item"><i class="fa fa-table" aria-hidden="true"></i>&nbsp Archive</a>
        </div>

        <!-- Associate Editor  -->
        <?php }else if(TotalNumberOfRowsWhereTWO_AND($USER_DB,"primaryemail","associateeditor",$email,1)>0){ ?>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownAbout">

        <a href="<?php echo $BASE_URL; ?>associateeditor/" class="dropdown-item" title=" Dashboard"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
        <a href="<?php echo $BASE_URL; ?>author/uploadpaper"  class="dropdown-item" title="Upload paper here"><i class="far fa-newspaper"></i>&nbsp Upload Paper</a>
        <a href="<?php echo $BASE_URL; ?>author/paperstatus"  class="dropdown-item" title="Chech your paper status"><i class="far fa-newspaper"></i>&nbsp Your Paper Status</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/paperstatus"  class="dropdown-item" title="Assigned paper status"><i class="far fa-newspaper"></i>&nbsp Assigned Paper Status</a>
        <a href="<?php echo $BASE_URL; ?>author/updateprofile"  class="dropdown-item" title="Update your profile"><i class="fas fa-user-shield"></i>&nbsp Update profile</a>
        <a href="<?php echo $BASE_URL; ?>author/changepassword"  class="dropdown-item"title="Change your password"><i class="fas fa-unlock-alt"></i>&nbsp Change password</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/authors"  class="dropdown-item" title="Author Details"><i class="fas fa-users-cog"></i>&nbsp Author Details</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/editors"  class="dropdown-item" title="Editors"><i class="fas fa-users-cog"></i>&nbsp Editor States</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/editordetails"  class="dropdown-item" title="Editor Details"><i class="fas fa-users-cog"></i>&nbsp Academic Editors</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/reviewerdetails"  class="dropdown-item" title="Reviewer Details"><i class="fas fa-users-cog"></i>&nbsp Reviewer</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/reviewedpaper"  class="dropdown-item" title="See your Reviewed paper"><i class="far fa-newspaper"></i>&nbsp Reviewed paper</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/authors"  class="dropdown-item" title="See your Reviewed paper"><i class="fas fa-users-cog"></i>&nbsp Author Details</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/rfeedback"  class="dropdown-item" title="Reviewer Feedback"><i class="fas fa-comments"></i>&nbsp Reviewer Feeedback</a>
        <a href="<?php echo $BASE_URL; ?>associateeditor/efeedback"  class="dropdown-item" title="Editor Feedback"><i class="fas fa-comments"></i>&nbsp Editor Feeedback</a>

        </div>

<!-- Academic Editor  -->
        <?php }else if(TotalNumberOfRowsWhereTWO_AND($USER_DB,"primaryemail","academiceditor",$email,1)>0){ ?>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownAbout">

        <a href="<?php echo $BASE_URL; ?>academiceditor/" class="dropdown-items pt-5" title="Author Dashboard"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
        <a href="<?php echo $BASE_URL; ?>author/uploadpaper"  class="dropdown-item" title="Upload paper here"><i class="far fa-newspaper"></i>&nbsp Upload Paper</a>
        <a href="<?php echo $BASE_URL; ?>author/paperstatus"  class="dropdown-item" title="Chech your paper status"><i class="far fa-newspaper"></i>&nbsp Your Paper Status</a>
        <a href="<?php echo $BASE_URL; ?>academiceditor/paperstatus" class="dropdown-item"><i class="far fa-newspaper"></i>&nbsp Assigned Paper Status</a>
        <a href="<?php echo $BASE_URL; ?>author/updateprofile" class="dropdown-item"><i class="fas fa-user-shield"></i>&nbsp Update Profile</a>
        <a href="<?php echo $BASE_URL; ?>author/changepassword" class="dropdown-item"><i class="fas fa-unlock-alt"></i>&nbsp Change password</a>
        <a href="<?php echo $BASE_URL; ?>academiceditor/authors" class="dropdown-item"><i class="fas fa-users-cog"></i>&nbsp Author States</a>
        <a href="<?php echo $BASE_URL; ?>academiceditor/reviewerdetails" class="dropdown-item"><i class="fas fa-users-cog"></i>&nbsp Reviewer</a>
        <a href="<?php echo $BASE_URL; ?>academiceditor/reviewedpaper" class="dropdown-item"><i class="far fa-newspaper"></i>&nbsp Reviewed paper</a>
        <a href="<?php echo $BASE_URL; ?>academiceditor/feedback" class="dropdown-item"><i class="fas fa-comments"></i>&nbsp Feedback</a>
        
        </div>

        <?php }else if(TotalNumberOfRowsWhereTWO_AND($USER_DB,"primaryemail","reviewerselection",$email,1)>0){   ?>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownAbout">

        <a href="<?php echo $BASE_URL; ?>reviewer/" class="dropdown-item" title="Author Dashboard"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>

        <a href="<?php echo $BASE_URL; ?>reviewer/reviewedpaper" class="dropdown-item"><i class="far fa-newspaper"></i>&nbsp Reviewed paper</a>

        <a href="<?php echo $BASE_URL; ?>reviewer/reviewerpaper" class="dropdown-item"><i class="fas fa-comments"></i>&nbsp As Reviewer</a>

        </div>
        <!--Author Logged In or Not  -->
        <?php }else{ ?>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownAbout">

        <a href="<?php echo $BASE_URL; ?>author/" class="dropdown-item" title="Author Dashboard"><i class="fas fa-tachometer-alt"></i>&nbsp Dashboard</a>
        <a href="<?php echo $BASE_URL; ?>author/uploadpaper"  class="dropdown-item" title="Upload paper here"><i class="fas fa-upload"></i>&nbsp Upload Paper</a>
        <a href="<?php echo $BASE_URL; ?>author/paperstatus"  class="dropdown-item" title="Chech your paper status"><i class="fas fa-exclamation-circle"></i>&nbsp Paper Status</a>
        <a href="<?php echo $BASE_URL; ?>author/updateprofile"  class="dropdown-item" title="Update your profile"><i class="fas fa-sync"></i>&nbsp Update profile</a>
        <a href="<?php echo $BASE_URL; ?>author/changepassword"  class="dropdown-item"title="Change your password"><i class="fas fa-unlock-alt"></i>&nbsp Change password</a>
        <a href="<?php echo $BASE_URL; ?>author/reviewerstatus"  class="dropdown-item" title="See your Reviewed paper"><i class="far fa-newspaper"></i>&nbsp Reviewed paper</a>

        </div>
        <?php } ?>
    </li>
      <?php  } ?>

    <li class="nav-item active mydropdowncss">
        <a class="nav-link" href="<?php echo $BASE_URL; ?>index/aim_and_scope">Aim and Scope<span class="sr-only">(current)</span></a>
    </li>

    <li class="nav-item active mydropdowncss">
        <a class="nav-link" href="<?php echo $BASE_URL; ?>index/guidelines">Guidelines<span class="sr-only">(current)</span></a>
    </li>

    <li class="nav-item active mydropdowncss">
        <a class="nav-link" href="<?php echo $BASE_URL; ?>index/journal_info">Journal Info<span class="sr-only">(current)</span></a>
    </li>

    <li class="nav-item active mydropdowncss">
        <a class="nav-link" href="<?php echo $BASE_URL; ?>index/editorial_board">Editorial Board<span class="sr-only">(current)</span></a>
    </li>

    <li class="nav-item active mydropdowncss">
        <a class="nav-link" href="<?php echo $BASE_URL; ?>index/archive">Archive<span class="sr-only">(current)</span></a>
    </li>

      <li class="nav-item active mydropdowncss">
        <a class="nav-link" href="<?php echo $BASE_URL;?>author">Submit an Article<span class="sr-only">(current)</span></a>
      </li>

      <?php if(empty($email)) {?>

      <li class="nav-item active mydropdowncss">
        <a class="nav-link donate" href="<?php echo $BASE_URL; ?>layout/login">Login<span class="sr-only">(current)</span></a>
      </li>

      <?php  } else { ?> 

      <li class="nav-item active mydropdowncss">
        <a class="nav-link donate" href="<?php echo $BASE_URL; ?>layout/logout" onclick="return confirm('Are you sure you want to log out to the system?')">Logout<span class="sr-only">(current)</span></a>
      </li>

      <?php  } ?>

    </ul>
  </div>
</nav>
