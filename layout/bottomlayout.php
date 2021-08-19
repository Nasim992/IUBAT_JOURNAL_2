</body>
    <!-- Essential Links  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <!-- Essentials Links  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script> baguetteBox.run('.tz-gallery'); </script>
    <!-- Particle Js Script -->
    
 <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib --> 
    <script>
    particlesJS("particles-js", {"particles":{"number":{"value":80,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"repulse"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":5},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});var count_particles, stats, update; stats = new Stats; stats.setMode(0); stats.domElement.style.position = 'absolute'; stats.domElement.style.left = '0px'; stats.domElement.style.top = '0px'; document.body.appendChild(stats.domElement); count_particles = document.querySelector('.js-count-particles'); update = function() { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); }; requestAnimationFrame(update);
</script>

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

    </html>