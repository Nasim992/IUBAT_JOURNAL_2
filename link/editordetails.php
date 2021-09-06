<?php 
    //  Remove as a Reviewer section starts Here 
    if(isset($_POST['editor-remove'])) {
        $paperid = $_POST['paperid'];
        $username = $_POST['username'];
  
        $query = "SELECT COUNT(*) as total_rows FROM reviewertable where  username='$username' and action IS  NULL";
        $stmt = $dbh->prepare($query);
                                
         // execute query
         $stmt->execute();
                                
         // get total rows
         $row = $stmt->fetch(PDO::FETCH_ASSOC);
         $total_re = $row['total_rows'];
        $action = 1;
        $actionz= 0;
        include '../link/linklocal.php';
        $sqlremovereview="update reviewertable set action=$action where paperid='$paperid' and username='$username'";
  
        if(mysqli_query($link, $sqlremovereview))
        {
        echo "<script>alert('Reviewer Removed Successfully for this paper.');</script>";
          // header("refresh:0;url=reviewerdetails");
        }
        else {
            echo "<script>alert('Something went wrong');</script>";
            // header("refresh:0;url=reviewerdetails");
        }
  
          if ($total_re-1==0) {
            include '../link/linklocal.php';
                $sqlremovereviewauthor="update author set reviewerselection=$actionz where username='$username'";
                mysqli_query($link,$sqlremovereviewauthor);
          }
  
          }
           // Remove as  a Reviewer Section Ends Here 