<?php 
       //  Remove as a Editor section starts Here 
       if(isset($_POST['editor-remove'])) {
        $paperid = $_POST['paperid'];
        $username = $_POST['username'];
  
        $action = 1;
        $actionz= 0;
        $sqlremovereview="update editortable set action=$action where paperid='$paperid' and username='$username'";
  
        if(mysqli_query($link, $sqlremovereview))
        {
        echo "<script>alert('Editor of this paper removed.');</script>";
        set_message('
        <div class="notification-div">
                  <p class="alert alert-success alert-dismissible" id="message">Editor of this paper removed.</p>
                  </div>
            </div>
        ');
        echo "<script type='text/javascript'> window.history.back(); </script>";
        }
        else {
          set_message('
          <div class="notification-div">
                    <p class="alert alert-warning alert-dismissible" id="message">Something went wrong</p>
                    </div>
              </div>
          ');
          echo "<script type='text/javascript'> window.history.back(); </script>";
        }
  
          }
           // Remove as  a Editor Section Ends Here 