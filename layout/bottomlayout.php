</body>
    <!-- Essential Links  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <!-- Essentials Links  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script src="<?php echo $JS_DIR; ?>login.js"></script>
    <script src="<?php echo $JS_DIR; ?>jquery.dataTables.min.js"></script>
    <!-- Particle Js Script -->
    
<script>
        $(document).ready(function() {
        $("#heading-input").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#heading-table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<script>
    function showpoint() {
        document.getElementById("vol1issue1").style.display = "block";
        document.getElementById("vol1issue2").style.display = "none";
        document.getElementById("vol2issue1").style.display = "none";

        document.getElementById("1stpoint").classList.add('colorbtn');
        document.getElementById("2ndpoint").classList.remove('colorbtn');
        document.getElementById("3rdpoint").classList.remove('colorbtn');
        document.getElementById("4thpoint").classList.remove('colorbtn');
    }

    function showpoint1() {
        document.getElementById("vol1issue1").style.display = "none";
        document.getElementById("vol1issue2").style.display = "block";
        document.getElementById("vol1issue3").style.display = "none";
        document.getElementById("vol2issue1").style.display = "none";

        document.getElementById("1stpoint").classList.remove('colorbtn');
        document.getElementById("2ndpoint").classList.add('colorbtn');
        document.getElementById("3rdpoint").classList.remove('colorbtn');
        document.getElementById("4thpoint").classList.remove('colorbtn');
    }

    function showpoint2() {
        document.getElementById("vol1issue1").style.display = "none";
        document.getElementById("vol1issue2").style.display = "none";
        document.getElementById("vol1issue3").style.display = "block";
        document.getElementById("vol2issue1").style.display = "none";

        document.getElementById("1stpoint").classList.remove('colorbtn');
        document.getElementById("2ndpoint").classList.remove('colorbtn');
        document.getElementById("3rdpoint").classList.add('colorbtn');
        document.getElementById("4thpoint").classList.remove('colorbtn');
    }
    function showpoint3() {
        document.getElementById("vol1issue1").style.display = "none";
        document.getElementById("vol1issue2").style.display = "none";
        document.getElementById("vol1issue3").style.display = "none";
        document.getElementById("vol2issue1").style.display = "block";

        document.getElementById("1stpoint").classList.remove('colorbtn');
        document.getElementById("2ndpoint").classList.remove('colorbtn');
        document.getElementById("3rdpoint").classList.remove('colorbtn');
        document.getElementById("4thpoint").classList.add('colorbtn');
    }
    </script>

    <!-- Check that the username is availavle on the database or not  -->



<script>
        // Hiding Messages
        $("#message").show();
        setTimeout(function() {
            $("#message").hide();
        }, 5000);


        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.getElementById("closesignof").style.display = "block";
            document.getElementById("closesign").style.display = "none";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            document.getElementById("closesign").style.display = "block";
            document.getElementById("closesignof").style.display = "none";

        }
</script>


<script>
$(document).ready(function() {
    $("#txt_username").keyup(function() {
        var username = $(this).val().trim();
        if (username != '') {
            $.ajax({
                url: '../link/ajaxfile.php',
                type: 'post',
                data: {
                    username: username
                },
                success: function(response) {
                    $('#uname_response').html(response);
                }
            });
        } else {
            $("#uname_response").html("");
        }
    });
});

//  Email is exists or not checking email

$(document).ready(function() {
    $("#pemail").keyup(function() {
        var primaryemail = $(this).val().trim();
        if (primaryemail != '') {
            $.ajax({
                url: '../link/ajaxfile.php',
                type: 'post',
                data: {
                    primaryemail: primaryemail
                },
                success: function(response) {
                    $('#pemail-text').html(response);
                }
            });
        } else {
            $("#pemail-text").html("");
        }
    });
});
// Check that the email address is exists or not in the database secion ends here 

// Checking Previous Email is matched or not starts here
function handlefocus() {
    $(document).ready(function() {
        var pemail = document.getElementById('pemail').value;
        $("#pemailAgain").keyup(function() {
            var pemailAgain = $(this).val().trim();
            if (pemailAgain != '') {
                $.ajax({
                    url: '../link/ajaxfile.php',
                    type: 'post',
                    data: {
                        pemailAgain: pemailAgain,
                        pemail: pemail
                    },
                    success: function(response) {
                        $('#pemailAgain-response').html(response);
                    }
                });
            } else {
                $("#pemailAgain-response").html("");
            }
        });
    });
}
// Checking previous Email is matched or not ends here

// Checking that the reapeat pass is matched or not section starts here 
function handlepasschange() {
    $(document).ready(function() {
        var userpassword = document.getElementById('user-pass').value;
        console.log(userpassword);
        $("#user-repeatpass").keyup(function() {
            var userrepeatpass = $(this).val().trim();
            if (userrepeatpass != '') {
                $.ajax({
                    url: '../link/ajaxfile.php',
                    type: 'post',
                    data: {
                        userrepeatpass: userrepeatpass,
                        userpassword: userpassword
                    },
                    success: function(response) {
                        $('#user-reapeatpass-response').html(response);
                    }
                });
            } else {
                $("#user-reapeatpass-response").html("");
            }
        });
    });
}
// Checking that the repeat pass is matched or not section ends here  section is ends here 

$(document).ready(function() {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });

    
    // Chiefeditor published paper

    $(document).ready(function() {
        $("#heading-input").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#heading-table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    // Aim and scope readmore section starts here 
    document.querySelector('#read-more').addEventListener('click', function() {
        document.querySelector('#content').style.height = 'auto';
        this.style.display = 'none';
    });

    $(function($) {
        $('#example').DataTable();

        $('#example2').DataTable({
            "scrollY": "300px",
            "scrollCollapse": true,
            "paging": false
        });

        $('#example3').DataTable();
    });
    $(document).ready(function() {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
    $(document).ready(function() {
        $('#dtBasicExample1').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });

    $(function($) {
        $('#example').DataTable();

        $('#example2').DataTable({
            "scrollY": "300px",
            "scrollCollapse": true,
            "paging": false
        });

        $('#example3').DataTable();
    });

    $(document).ready(function() {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });

    $(function($) {
        $('#example').DataTable();

        $('#example2').DataTable({
            "scrollY": "300px",
            "scrollCollapse": true,
            "paging": false
        });

        $('#example3').DataTable();
    });

    $(document).ready(function() {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });

    $(document).ready(function() {
        $('#dtBasicExample2').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });

</script>
     



    </html>