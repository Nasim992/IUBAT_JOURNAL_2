<?php
    $paperid = $_GET['id'];

    //  Update Abstract section 

    if(isset($_POST['update_abstract']))
     { 
     $abstract = $_POST['abstract-update'];

     $sqlresubmit="update archive set abstract='".escape($abstract)."' where paperid='$paperid'"; 
     if(mysqli_query($link, $sqlresubmit))
     {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-success alert-dismissible" id="message">Update Success</p>
                  </div>
            </div>
        ');
        echo "<script type='text/javascript'> document.location = '../admin/archivepaper'; </script>";
     }
     else {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-danger alert-dismissible" id="message">Something went wrong</p>
                  </div>
            </div>
        ');
        echo "<script type='text/javascript'> document.location = '../admin/archivepaper'; </script>";
     }   
}
    // Update Abstract section

    // Update Authorname section 
    if(isset($_POST['update_authorname']))
    { 
    $authorname = $_POST['authorname-update'];

    $sqlresubmit="update archive set authorname='".escape($authorname)."' where paperid='$paperid'"; 
    if(mysqli_query($link, $sqlresubmit))
    {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-success alert-dismissible" id="message">Update Success</p>
                  </div>
            </div>
        ');
        echo "<script type='text/javascript'> document.location = '../admin/archivepaper'; </script>";
    }
    else {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-danger alert-dismissible" id="message">Something went wrong</p>
                  </div>
            </div>
        ');
        echo "<script type='text/javascript'> document.location = '../admin/archivepaper'; </script>";
    }   
}
    // Update Authorname section 

        // Update Versionissue section 
        if(isset($_POST['update_versionissue']))
        { 
        $versionissue = $_POST['versionissue-update'];
    
        $sqlresubmit="update archive set versionissue='".escape($versionissue)."' where paperid='$paperid'"; 
        if(mysqli_query($link, $sqlresubmit))
        {
            set_message('
            <div class="notification-div">
                      <div class="container" id="flash-message">
                      <p class="alert alert-success alert-dismissible" id="message">Update Success</p>
                      </div>
                </div>
            ');
            echo "<script type='text/javascript'> document.location = '../admin/archivepaper'; </script>";
        }
        else {
            set_message('
            <div class="notification-div">
                      <div class="container" id="flash-message">
                      <p class="alert alert-danger alert-dismissible" id="message">Something went wrong</p>
                      </div>
                </div>
            ');
            echo "<script type='text/javascript'> document.location = '../admin/archivepaper'; </script>";
        }   
    }
        // Update Versionissue section 

        // Update Versionissue section 
                if(isset($_POST['update_papername']))
                { 
                $papername = $_POST['papername-update'];
            
                $sqlresubmit="update archive set papername='".escape($papername)."' where paperid='$paperid'"; 
                if(mysqli_query($link, $sqlresubmit))
                {
                    set_message('
                    <div class="notification-div">
                              <div class="container" id="flash-message">
                              <p class="alert alert-success alert-dismissible" id="message">Update Success</p>
                              </div>
                        </div>
                    ');
                    echo "<script type='text/javascript'> document.location = '../admin/archivepaper'; </script>";
                }
                else {
                    set_message('
                    <div class="notification-div">
                              <div class="container" id="flash-message">
                              <p class="alert alert-danger alert-dismissible" id="message">Something went wrong</p>
                              </div>
                        </div>
                    ');
                    echo "<script type='text/javascript'> document.location = '../admin/archivepaper'; </script>";
                }   
            }
        // Update Versionissue section 