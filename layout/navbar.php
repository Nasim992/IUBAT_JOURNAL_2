<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-color">
  <a class="navbar-brand" href="<?php echo $BASE_URL; ?>"><img src="<?php echo $IMAGE_DIR; ?>iubat-logo.png" style="height: 50px; width: 70px" alt="navbar-brand"/></a>
  <a style="font-size:17px;text-decoration:none;"  href="<?php echo $BASE_URL; ?>">
  <span class="header_heading"><b><span style="color:#e90f2c;">IUBAT Review</span><br><small style="color:#fff63c;">A Multidisciplinary Academic Journal</small></b></span>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></a>
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">

    <li class="nav-item dropdown active mydropdowncss">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAbout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          About Journal
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownAbout">
          <a class="dropdown-item" href="<?php echo $BASE_URL; ?>index/aim_and_scope">Aim and Scope</a>
          <a class="dropdown-item" href="<?php echo $BASE_URL; ?>index/guidelines">Guidelines</a>
          <a class="dropdown-item" href="<?php echo $BASE_URL; ?>index/journal_info">Journal Info</a>
          <a class="dropdown-item" href="<?php echo $BASE_URL; ?>index/editorial_board">Editorial Board</a>
          <a class="dropdown-item" href="<?php echo $BASE_URL; ?>index/archive">Archive</a>
        </div>
      </li>

      <li class="nav-item active mydropdowncss">
        <a class="nav-link" href="<?php echo $BASE_URL;?>author">Submit an Article<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active mydropdowncss">
        <a class="nav-link donate" href="<?php echo $BASE_URL; ?>user/donation">Login<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
