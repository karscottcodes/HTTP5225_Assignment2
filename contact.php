<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

?>
<!doctype html>
<html>


<?php
    include('reusable/head.php')
?>

    <main>
        <div class="container-fluid">
            <div class="container my-5">
                <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                        <h2 class="display-3 pb-5">Contact Us</h2>
                        <h4><i class="bi bi-building"></i> &nbsp;Address</h4>
                        <p>100 Random Street<br>
                            Toronto, Ontario<br>
                            M1M 2N2</p>
                        <h4><i class="bi bi-envelope-at"></i> &nbsp;Email:</h4>
                        <p><a href="#">info@torontogalleryguide.ca</a></p> 
                        <h4><i class="bi bi-telephone"></i> &nbsp;Phone Number:</h4> 
                        <h5>Local:</h5><p>(437) 678-6743</p>
                        <h5>Toll-Free:</h5><p>1 (888) 678-3476</p>
                </div>
                <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                    <img class="rounded-lg-3" src="admin/imgs/pexels-gashif-rheza-3276830.jpg" alt="" width="480">
                </div>
            </div>
        
        </div>

    </main>

    <?php
    include('reusable/foot.php')
    ?>
  </body>

</html>
