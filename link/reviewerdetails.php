<?php 

    //  Remove as a Reviewer section starts Here 
    if(isset($_POST['reviewer-remove'])) {
      $paperid = $_POST['paperid'];
      $primaryemail = $_POST['primaryemail'];

      $query = "SELECT COUNT(*) as total_rows FROM reviewertable where  primaryemail='$primaryemail' and action IS  NULL";
      $stmt = $dbh->prepare($query);
                              
       // execute query
       $stmt->execute();
                              
       // get total rows
       $row = $stmt->fetch(PDO::FETCH_ASSOC);
       $total_re = $row['total_rows'];
      $action = 1;
      $actionz= 0;
      include '../link/linklocal.php';
      $sqlremovereview="update reviewertable set action=$action where paperid='$paperid' and primaryemail='$primaryemail'";

      if(mysqli_query($link, $sqlremovereview))
      {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-success alert-dismissible" id="message">Reviewer Removed Successfully for this paper</p>
                  </div>
            </div>
        ');
        echo "<script type='text/javascript'> window.history.back(); </script>";
      }
      else {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">Something went wrong</p>
                  </div>
            </div>
        ');
        echo "<script type='text/javascript'> window.history.back(); </script>";
      }

        if ($total_re-1==0) {
          include '../link/linklocal.php';
              $sqlremovereviewauthor="update author set reviewerselection=$actionz where username='$username'";
              mysqli_query($link,$sqlremovereviewauthor);
        }

        }
         // Remove as  a Reviewer Section Ends Here 
